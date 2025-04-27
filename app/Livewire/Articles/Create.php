<?php

namespace App\Livewire\Articles;

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
		return view('livewire.articles.create');
	}
}
