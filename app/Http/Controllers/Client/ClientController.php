<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\ProductTypeRepositoryInterface;
use App\Repositories\Contracts\CateRepositoryInterface;
use App\Repositories\Contracts\TagsRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\SlidesRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\EditCommentRequest;

class ClientController extends Controller
{
    protected $client;
	protected $tag;
	protected $cate;
    protected $product;
    protected $comment;
    protected $prodType;

    public function __construct(ClientRepositoryInterface $client, TagsRepositoryInterface $tag,  CateRepositoryInterface $cate, ProductTypeRepositoryInterface $prodType, ProductRepositoryInterface $product, CommentRepositoryInterface $comment)
    {
        $this->client   = $client;
        $this->cate     = $cate;
        $this->tag 	    = $tag;
        $this->product  = $product;
        $this->comment  = $comment;
        $this->prodType = $prodType;
    }

    //show những sảm thẩm thuộc danh mục Mobile-Laptop-Accessories-Clock lên trang chủ
    public function home(){
        $data['cateMobile']      = $this->client->getMobile();
        $data['cateLaptop']      = $this->client->getLaptop();
        $data['cateAccessories'] = $this->client->getAccessories();
        $data['cateClock']       = $this->client->getClock();
        $data['product']         = $this->product->all();
    	return view('client.index',$data);
    }

    // chi tiết slides
    public function detailSlide($id){
        $data['slide'] = $this->client->detailSlide($id);
        $data['tags']  = $this->client->limitTag();
        return view('client.slide-detail',$data);
    }

    // lấy ra những sản phẩm thuộc category
	public function getCategory($id){
		$data['category']          = $this->cate->find($id);
    	$data['categoryFeatured']  = $this->client->categoryFeatured($id);
    	$data['categoryNews']      = $this->client->categoryNews($id);
        $data['categoryProdType']  = $this->client->categoryProdType($id);
        $data['prodPaginate']      = $this->client->prodPaginate($id);
        return view('client.category',$data);
    }

    // lấy ra những sản phẩm thuộc ProductType
    public function getProductType($id){
        $data['prodTypeName'] = $this->prodType->find($id);
        $data['productType']  = $this->client->productType($id);
        return view('client.poduct-type',$data);
    }

    //lấy ra sản phẩm thuộc tags
	public function getCategoryTags($id){
		$data['tags']         = $this->tag->find($id);
    	$data['categoryTags'] = $this->client->categoryTags($id);
        return view('client.cate-tags',$data);
    }
	
    // chi tiết product
    public function detailProduct($id){      
        $data['tag']                 = $this->tag->find($id);
        $data['product']             = $this->product->find($id);
        $data['CommentProduct']      = $this->client->getCommentProduct($id);
        $data['countCommentProduct'] = $this->client->countCommentProduct($id);
        return view('client.detail',$data);
    }

    //comment-bình luận
    public function createCommentProduct(AddCommentRequest $request, $id){      
        $com = $this->comment->create([
            'com_name'    => $request->name,
            'com_email'   => $request->email,
            'com_content' => $request->message,
            'prod_id'     => $id,            
            'slide_id'    => null,
            'com_status'  => 1,
        ]);
        return back()->with('message','Bạn đã comment');
    }

    //tìm kiếm sảm phẩm
    public function search(Request $request){
        if (empty($request->search)) {
             return back()->with('error','Bạn vui lòng nhập từ khóa tìm kiếm');
        }       
        $result             = $request->search;
        $data['keyword']    = $request->search;
        $result             = str_replace('', '%',$result);
        $data['itemSearch'] = $this->client->search($result);
        return view('client.search',$data);
    }

}
