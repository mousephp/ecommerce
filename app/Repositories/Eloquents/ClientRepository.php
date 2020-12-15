<?php 

namespace App\Repositories\Eloquents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\ProductTypeRepositoryInterface;
use App\Repositories\Contracts\CateRepositoryInterface;
use App\Repositories\Contracts\TagsRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\SlidesRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Tags;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\User;

class ClientRepository implements ClientRepositoryInterface
{
	protected $cate;
	protected $tag;
	protected $product;
	protected $comment;
	protected $slide;
	protected $prodType;

	function __construct(Product $product, Comment $comment, Category $cate, ProductType $prodType, Tags $tag, Slide $slide)
	{
		$this->cate     = $cate;
		$this->tag      = $tag;
		$this->product  = $product;
		$this->comment  = $comment;
		$this->slide    = $slide;
		$this->prodType = $prodType;
	}

	public function prodPaginate($id){
		return $prodPaginate = DB::table('products')->where('cate_id',$id)->where('prod_status',1)->paginate(4);
	}

	//hiển thị tags giới hạn
	public function limitTag(){
        return $this->tag->limit(5)->get();
    }

	//chi tiết slides
 	public function detailSlide($id){
        return $this->slide->findOrFail($id);
    }

    //lấy ra những productType thuộc category
   	public function categoryProdType($id){
        return $this->prodType->where('prod_type_status',1)->where('cate_id',$id)->take(5)->get();
    }

	// lấy ra những sản phẩm thuộc ProductType
    public function productType($id){
        return $this->product->where('prod_status',1)->where('prod_type_id',$id)->paginate(4);
    }
   	
    //lấy ra sản phẩm nổi bật thuộc danh mục đó
	public function categoryFeatured($id){
		return $this->product->where('cate_id',$id)->where('prod_featured',1)->paginate(4);   
	}

	//lấy ra sản phẩm mới thuộc danh mục đó
	public function categoryNews($id){
		return $this->product->where('cate_id',$id)->orderBy('created_at','desc')->paginate(4);   
	}

	//lấy ra sản phẩm thuộc tags
	public function categoryTags($id){
		return $this->product->where('tag_id',$id)->orderBy('created_at','desc')->paginate(6);   
	}

	//lấy ra comment thuộc sản phẩm
	public function getCommentProduct($id){
		return $this->comment->where('prod_id',$id)->paginate(10);
	}

	//dếm comment
	public function countCommentProduct($id){
		return $this->comment->where('prod_id',$id)->count();
	}
	
	//hiển thị sản phẩm thuộc danh mục
	//-----------------------------------	
	public function getMobile(){
		return $this->cate->where('cate_name','điện thoại')->where('cate_status',1)->take(1)->get();
	}

	public function getLaptop(){
		return $this->cate->where('cate_name','laptop')->where('cate_status',1)->take(1)->get();
	}

	public function getAccessories(){
		return $this->cate->where('cate_name','phụ kiện')->where('cate_status',1)->take(1)->get();
	}

	public function getClock(){
		return $this->cate->where('cate_name','đồng hồ')->where('cate_status',1)->take(1)->get();
	}

	//tìm kiếm sảm phẩm
	public function search($result){
        $itemSearch = $this->product->where('prod_title','like','%'.$result.'%')->orWhere('prod_description','like','%'.$result.'%')->orWhere('prod_price','like','%'.$result.'%')->take(30)->paginate(5);
		return $itemSearch;
	}

}




