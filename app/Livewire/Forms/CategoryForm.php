<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
	public ?Category $category = null;

	#[Validate('required|string')]
	public $name = '';

	public function set(Category $category)
	{
		$this->category = $category;
		$this->name = $category->name;
	}

	public function save(): Category
	{
		$this->validate();

		$category = $this->category
			? tap($this->category)->update([
				'name' => $this->name,
			])
			: Category::query()->create([
				'name' => $this->name,
			]);

		return $category;
	}
}