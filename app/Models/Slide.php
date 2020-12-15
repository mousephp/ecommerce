<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table 	= 'slides';

    protected $fillable = [
        'slide_title','slide_slug', 'slide_image', 'slide_content','slide_status',
    ];

    public function comment(){
        return $this->hasMany('App\Models\Comment','slide_id','id');
    }
				
}
