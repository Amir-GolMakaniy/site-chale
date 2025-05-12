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
	public $title = null;

	#[Validate('required|string')]
	public $content = null;

	#[Validate('nullable')]
	public $category = null;

	public function set(Article $article)
	{
		$this->article = $article;
		$this->oldImagePath = $article->image->path ?? null;
		$this->title = $article->title;
		$this->content = $article->content;
		$this->category = $article->category_id;
	}

	public function save(): Article
	{
		$this->validate();

		$article = $this->article
			? tap($this->article)->update([
				'title' => $this->title,
				'content' => $this->content,
				'category_id' => $this->category,
			])
			: auth()->user()->articles()->create([
				'title' => $this->title,
				'content' => $this->content,
				'category_id' => $this->category,
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
