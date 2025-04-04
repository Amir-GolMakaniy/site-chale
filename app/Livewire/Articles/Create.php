<?php

namespace App\Livewire\Articles;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;

class Create extends Component
{
	public ArticleForm $form;

	public function save()
	{
		$this->form->save();

		return $this->redirect(route('admin-home'));
	}

	public function render()
	{
		return view('livewire.articles.create');
	}
}
