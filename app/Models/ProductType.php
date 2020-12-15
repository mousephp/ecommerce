<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table 	= 'product_type';

	protected $fillable = [
        'prod_type_name', 'prod_type_slug', 'prod_type_status', 'cate_id',
    ];

    public function category(){
		return $this->belongSto('App\Models\Category','cate_id','id');
	}
	
	public function product(){
		return $this->belongSto('App\Models\Product','prod_type_id','id');
	}
	
}
