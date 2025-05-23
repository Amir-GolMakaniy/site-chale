<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/** @use HasFactory<CategoryFactory> */
	use HasFactory;

	protected $fillable = ['name'];

	public function articles()
	{
		return $this->hasOne(Article::class);
	}
}
