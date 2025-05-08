<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
	public $articles;
	public $category = null;
	public $search = null;

	public function mount()
	{
		$this->search = request()->search;
	}

	public function render()
	{
		if ($this->category) {
			$this->articles = Category::query()->find($this->category)->articles()->latest()->get();
		} elseif ($this->search) {
			$this->articles = Article::query()->where('title', 'like', '%' . $this->search . '%')->latest()->get();
		} else {
			$this->articles = Article::query()->latest()->get();
		}

		return view('livewire.articles.index');
	}

}
