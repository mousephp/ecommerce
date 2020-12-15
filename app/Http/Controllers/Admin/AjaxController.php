<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\ProductType;


class AjaxController extends Controller
{  

	public function getProductType(Request $request){
    	$producttype = ProductType::where('cate_id',$request->cateId)->get();
    	return response()->json($producttype,200);
    }

}
