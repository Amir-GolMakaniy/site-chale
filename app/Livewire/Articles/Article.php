<?php

namespace App\Livewire\Articles;

use Livewire\Component;

class Article extends Component
{
	public $article;

	public function render()
	{
		return view('livewire.articles.article');
	}
}
