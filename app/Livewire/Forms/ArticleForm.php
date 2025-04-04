<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArticleForm extends Form
{
	public ?Article $article;

	#[Validate('required|string')]
    public $title = "";

	#[Validate('required|string')]
    public $content = "";

	#[Validate('required|string')]
    public $author = "";

	public function set(Article $article)
	{
		$this->article = $article;

		$this->title = $article->title;

		$this->content = $article->content;

		$this->author = $article->author;
	}

	public function save()
	{
		$this->validate();

		Article::query()->updateOrCreate($this->all());
	}
}
