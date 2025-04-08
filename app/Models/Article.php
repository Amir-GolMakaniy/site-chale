<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	/** @use HasFactory<ArticleFactory> */
	use HasFactory, Sluggable;

	protected $fillable = [
		'title',
		'slug',
		'content',
		'author',
	];

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	public function author()
	{
		return $this->belongsTo(User::class, 'author');
	}

	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
