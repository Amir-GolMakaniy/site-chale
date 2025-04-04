<?php

namespace App\Livewire\Articles;

use Livewire\Component;

class Show extends Component
{
	public $article;

	public function render()
	{
		return view('livewire.articles.show');
	}
}
