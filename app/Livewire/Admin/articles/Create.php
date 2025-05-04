<?php

namespace App\Livewire\Admin\articles;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
	use WithFileUploads;

	public ArticleForm $form;

	public function save()
	{
		$this->form->save();

		return $this->redirect(route('admin.home'));
	}

	public function render()
	{
		return view('livewire.admin.articles.create')->layout('components.layouts.admin');
	}
}
