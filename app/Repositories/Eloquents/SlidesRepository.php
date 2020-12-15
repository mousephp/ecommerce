<?php
namespace App\Repositories\Eloquents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SlidesRepositoryInterface;
use App\Models\Slide;
use Illuminate\Support\Facades\DB;

class SlidesRepository extends EloquentRepository implements SlidesRepositoryInterface
{
    protected $slide;

    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
        parent::__construct($slide);
    }

    public function pagination(){
        return $this->slide->paginate(5);
    }

 	public function findMessage($id){

    }
	
}

