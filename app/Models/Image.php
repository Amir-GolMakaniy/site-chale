<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable=[
		'path',
		'imageable_id',
	];
	public function article()
	{
		return $this->belongsTo(Article::class);
    }
}
