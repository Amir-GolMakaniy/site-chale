<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
	public $category = null;

	public function render()
	{
		$articles = $this->category
			? Category::query()->find($this->category)->articles()->latest()->paginate(8)
			: Article::query()->latest()->paginate(8);

		return view('livewire.articles.index', compact('articles'));
	}

}
