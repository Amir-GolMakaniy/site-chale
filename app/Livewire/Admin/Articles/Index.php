<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
	public function delete(Article $article)
	{
		Storage::disk('public')->delete($article->image->path);
		$article->delete();
	}

	public function render()
	{
		$articles = Article::query()->orderByDesc('id')->get();
		return view('livewire.admin.articles.index', compact('articles'))->layout('components.layouts.admin');
	}
}