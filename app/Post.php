<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SoftDeletes;

class Post extends BaseModel
{
    protected $table = 'posts';


	public static function rules() {

		$rules = array(
	        'title' => 'required|max:100',
	        'url'   => "required|url",
	        'content' => 'required'
	    );

	    return $rules;

	}

	public function user() {

		return $this->belongsTo('App\User', 'created_by', 'id');
	}

	public static function search($searchItem) {

		return static::select(
			'*',
			'posts.id as id'
			)
		->join('users', 'users.id', '=', 'posts.created_by')
		->where('title', 'LIKE', "%{$searchItem}%")
		->orWhere('content', 'LIKE', "%{$searchItem}%")
		->orWhere('users.name', 'LIKE', "%{$searchItem}%");

	}
}