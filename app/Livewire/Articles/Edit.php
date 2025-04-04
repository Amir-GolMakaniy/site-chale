<?php

namespace App\Livewire\Articles;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;

class Edit extends Component
{
	public ArticleForm $form;

	public $article;

	public function mount()
	{
		$this->form->set($this->article);
	}

	public function save()
	{
		$this->form->save();

		return $this->redirect(route('admin-home'));
	}

	public function render()
	{
		return view('livewire.articles.edit');
	}
}
