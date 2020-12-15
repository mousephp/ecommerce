<?php 

namespace App\Repositories\Eloquents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductTypeRepositoryInterface;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;

class ProductTypeRepository extends EloquentRepository implements ProductTypeRepositoryInterface
{
	protected $productType;

	function __construct(ProductType $productType)
	{
		parent::__construct($productType);
		$this->productType = $productType;
	}

    public function pagination(){
        return $this->productType->paginate(5);
    }

}




