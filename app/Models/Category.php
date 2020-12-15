<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table 	= 'categories';
 
	protected $fillable = [
        'cate_name', 'cate_slug', 'cate_status',
    ];

    public function product(){
		return $this->hasMany('App\Models\Product','id');
	}

	public function productType(){
		return $this->hasMany('App\Models\productType','id');
	}

}
