<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	/** @use HasFactory<CategoryFactory> */
	use HasFactory, Sluggable;

	protected $fillable = [
		'title',
		'slug',
		'content',
		'user_id',
	];

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id');
	}

	public function comments()
	{
		return $this->morphMany(Comment::class, 'commentable');
	}

	public function tags()
	{
		return $this->morphToMany(Tag::class, 'taggable');
	}
}
