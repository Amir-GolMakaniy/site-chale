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

	public ?Article $article;

	#[Validate('required|image')]
	public $image = "";

	#[Validate('required|string')]
	public $title = "";

	#[Validate('required|string')]
	public $content = "";

	public function set(Article $article)
	{
		$this->article = $article;

		$this->title = $article->title;

		$this->content = $article->content;
	}

	public function save()
	{
		$this->validate();

		$article = auth()->user()->articles()->updateOrCreate($this->all());

		$image = Storage::url($this->image->store('img', 'public'));

		$article->image()->create(['path' => $image]);
	}
}
