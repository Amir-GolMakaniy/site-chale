<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/** @use HasFactory<TagFactory> */
	use HasFactory;

	protected $fillable = [
		'name',
	];

	public function articles()
	{
		return $this->morphedByMany(Article::class, 'taggable');
	}
}
