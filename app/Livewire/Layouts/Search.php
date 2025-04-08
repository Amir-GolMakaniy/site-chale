<?php

namespace App\Livewire\Layouts;

use App\Models\Article;
use Livewire\Component;

class Search extends Component
{
	public $search;

	public function render()
	{
		$articles = $this->search
			? Article::query()->where('title', 'like', '%' . $this->search . '%')->paginate(8)
			: null;

		return view('livewire.layouts.search',compact('articles'));
	}
}
