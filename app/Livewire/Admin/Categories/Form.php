<?php

namespace App\Livewire\Admin\Categories;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;

class Form extends Component
{
	public CategoryForm $form;

	public $category;

	public function mount()
	{
		if ($this->category) {
			$this->form->set($this->category);
		}
	}

	public function save()
	{
		$this->form->save();
		return to_route('admin.categories.index');
	}

	public function render()
	{
		return view('livewire.admin.categories.form');
	}
}
