<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable = [
		'name','cat_id','uri'
	];
	//protected $table = 'photos';

}
