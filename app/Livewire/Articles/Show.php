<?php

namespace App\Livewire\Articles;

use Livewire\Component;

class Show extends Component
{
	public $article;

	public function render()
	{
//		$this->article->comments()->create([
//			'user_id' => auth()->id(),
//			'comment' => 'sadsad',
//		]);
		return view('livewire.articles.show');
	}
}
