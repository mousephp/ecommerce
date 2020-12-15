<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\CateRepositoryInterface;
use App\Repositories\Contracts\TagsRepositoryInterface;
use App\Repositories\Contracts\ProductTypeRepositoryInterface;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use File;

class ProductsController extends Controller
{    
    use UploadTrait;
    protected $product;    
    protected $type;
    protected $cate;
    protected $tags;

    public function __construct(ProductRepositoryInterface $product, CateRepositoryInterface $cate, TagsRepositoryInterface $tags, ProductTypeRepositoryInterface $type){
        $this->product = $product;
        $this->cate    = $cate;
        $this->type    = $type;
        $this->tags    = $tags;
    }

    public function index()
    {
        //$data['products'] = $this->product->all();
        $data['products'] = $this->product->pagination();
        return view('admin.products.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = $this->cate->all();
        $data['types']      = $this->type->all();
        $data['tags']       = $this->tags->all();
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile('layouts/uploads/products', $request->file('image'));
        } else {
            $fileName = null;
        }   

        $slug    = Str::slug($request->name);
        $product = $this->product->create([
            'prod_title'        => $request->name,
            'prod_slug'         => $slug,
            'prod_price'        => $request->price,
            'prod_img'          => $fileName,
            'prod_accessories'  => $request->accessories,
            'prod_warranty'     => $request->warranty,
            'prod_condition'    => $request->condition,
            'prod_promotion'    => $request->promotion,
            'prod_status'       => $request->status,
            'prod_quantity'     => $request->quantity,
            'prod_description'  => $request->description,
            'prod_featured'     => $request->featured,
            'cate_id'           => $request->cateId,
            'prod_type_id'      => $request->prodType,
            'tag_id'            => $request->tags
        ]);
        return redirect()->back()->withInput($request->input())->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->cate->all();
        $types    = $this->type->all();
        $tags     = $this->tags->all();
        $product  = $this->product->find($id);
        return response()->json(['product'=>$product,'category'=>$category, 'types'=>$types, 'tags'=>$tags],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        if (request()->hasFile('image') && request('image') != '') {          
            $imagePath = public_path('layouts/uploads/products/'.$this->product->find($id)->prod_img);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $fileName = $this->uploadFile('layouts/uploads/products', $request->file('image'));
        }else {
            $fileName = $this->product->find($id)->prod_img;
        }

        $slug    = Str::slug($request->name);
        $product = $this->product->update($id,[
            'prod_title'        => $request->name,
            'prod_slug'         => $slug,
            'prod_price'        => $request->price,
            'prod_img'          => $fileName,
            'prod_accessories'  => $request->accessories,
            'prod_warranty'     => $request->warranty,
            'prod_condition'    => $request->condition,
            'prod_promotion'    => $request->promotion,
            'prod_status'       => $request->status,
            'prod_quantity'     => $request->quantity,
            'prod_description'  => $request->description,
            'prod_featured'     => $request->featured,
            'cate_id'           => $request->cateId,
            'prod_type_id'      => $request->prodType,
            'tag_id'            => $request->tags
        ]);      
        return response()->json(['message' => 'Sửa thành công sản phảm có id là'.$id],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file    = $this->product->find($id)->prod_img;
        $destroy = $this->product->delete($id);
        $this->deleteFile('layouts/uploads/products',$file);
        return response()->json($destroy);
    }
}
