<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
		$articles = Article::query()->orderByDesc('id')->get();
        return view('livewire.admin.home',compact('articles'))->layout('components.layouts.admin');
    }
}
