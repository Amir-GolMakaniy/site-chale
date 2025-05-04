<?php

namespace App\Livewire\Admin\articles;

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

		return $this->redirect(route('admin.home'));
	}

	public function render()
	{
		return view('livewire.admin.articles.edit')->layout('components.layouts.admin');
	}
}
