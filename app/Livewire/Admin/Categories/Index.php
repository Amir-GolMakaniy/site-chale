<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
	public function render()
	{
		$categories = Category::query()->orderByDesc('id')->get();
		return view('livewire.admin.categories.index', compact('categories'));
	}
}
