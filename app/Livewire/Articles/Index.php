<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
	public $category = null;
	public $search = null;

	public function mount()
	{
		$this->search = request()->search;
	}

	public function render()
	{
		if ($this->category) {
			$articles = Category::query()->find($this->category)->articles()->latest()->paginate(8);
		} elseif ($this->search) {
			$articles = Article::query()->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(8);
		} else {
			$articles = Article::query()->latest()->paginate(8);
		}

		return view('livewire.articles.index', compact('articles'));
	}

}
