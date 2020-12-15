<?php 

namespace App\Repositories\Eloquents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
	protected $product;
	protected $cate;

	function __construct(Product $product, Category $cate)
	{
		$this->cate    = $cate;
		$this->product = $product;
		parent::__construct($product);
	}

	public function pagination(){
        return $this->product->paginate(20);
    }

}




