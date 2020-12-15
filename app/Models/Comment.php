<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table 	= 'comments';

	protected $fillable = [
        'com_name', 'com_email', 'com_content','com_status', 'prod_id', 'slide_id'
    ];

    public function product(){
		return $this->belongsTo('App\Models\Product','prod_id','id');
	}
	
}
