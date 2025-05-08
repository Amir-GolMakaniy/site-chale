<?php

namespace App\Livewire\Admin\Articles;

use App\Livewire\Forms\ArticleForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
	use WithFileUploads;

	public ArticleForm $form;

	public $article;

	public function mount()
	{
		if ($this->article) {
			$this->form->set($this->article);
		}
	}

	public function save()
	{
		$this->form->save();
		return to_route('admin.articles.index');
	}

	public function render()
	{
		return view('livewire.admin.articles.form')->layout('components.layouts.admin');
	}
}
