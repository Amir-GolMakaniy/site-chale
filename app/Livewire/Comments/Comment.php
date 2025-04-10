<?php

namespace App\Livewire\Comments;

use Livewire\Component;

class Comment extends Component
{
	public $comment;
	public $commentableType;
	public $commentableId;

	public function save()
	{
		$this->validate([
			'comment' => 'required'
		]);

		$commentable = $this->commentableType::find($this->commentableId);

		$commentable->comments()->create([
			'comment' => $this->comment,
			'user_id' => auth()->id()
		]);

		$this->reset('comment');
	}

	public function render()
	{
		$comments = \App\Models\Comment::query()
			->where('commentable_type', $this->commentableType)
			->where('commentable_id', $this->commentableId)
			->latest()->get();

		return view('livewire.comments.comment', compact('comments'));
	}
}
