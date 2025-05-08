<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ArticleForm extends Form
{
	use WithFileUploads;

	public ?Article $article = null;

	#[Validate('nullable|image')]
	public $image = null;

	public ?string $oldImagePath = null;

	#[Validate('required|string')]
	public $title = '';

	#[Validate('required|string')]
	public $content = '';

	public function set(Article $article)
	{
		$this->article = $article;
		$this->oldImagePath = $article->image->path ?? null;
		$this->title = $article->title;
		$this->content = $article->content;
	}

	public function save(): Article
	{
		$this->validate();

		$article = $this->article
			? tap($this->article)->update([
				'title' => $this->title,
				'content' => $this->content,
			])
			: auth()->user()->articles()->create([
				'title' => $this->title,
				'content' => $this->content,
			]);

		if ($this->image) {
			if ($this->oldImagePath) {
				Storage::disk('public')->delete($this->oldImagePath);
			}

			$path = $this->image->store('img', 'public');
			$article->image()->updateOrCreate([], ['path' => $path]);
		}

		return $article;
	}
}
