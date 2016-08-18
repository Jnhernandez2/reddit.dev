<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
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

}