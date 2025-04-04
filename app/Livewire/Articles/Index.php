<?php

namespace App\Livewire\Articles;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
		$articles = \App\Models\Article::query()->orderByDesc('id')->paginate(8);
        return view('livewire.articles.index',compact('articles'));
    }
}
