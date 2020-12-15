<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = 'products';

    protected $fillable = [
        'prod_title', 'prod_slug', 'prod_quantity','prod_price',
        'prod_img', 'prod_accessories', 'prod_warranty','prod_condition',    
        'prod_promotion', 'prod_status', 'prod_description','prod_featured',       
        'cate_id', 'prod_type_id', 'tag_id'       
    ];

    public function category(){
		return $this->belongSto('App\Models\Category','cate_id','id');
    }

    public function productType(){
        return $this->belongsTo('App\Models\ProductType','prod_type_id','id');
    }

	public function tags(){
		return $this->belongSto('App\Models\Tags','tag_id','id');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment','prod_id','id');
    }
        										
}
