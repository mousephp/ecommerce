<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Contracts\ProductTypeRepositoryInterface;
use App\Repositories\Contracts\CateRepositoryInterface;
use App\Http\Requests\AddProductTypeRequest;
use App\Http\Requests\EditProductTypeRequest;

class ProductTypeController extends Controller
{
    protected $type;
    protected $cate;
    
    public function __construct(ProductTypeRepositoryInterface $type, CateRepositoryInterface $cate){
        $this->type = $type;
        $this->cate = $cate;
    }

    public function index()
    {
        $data['types']     = $this->type->all();
        return view('admin.brands.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->cate->all();
        return view('admin.brands.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductTypeRequest $request)
    {
        $slug = Str::slug($request->name);
        $productType = $this->type->create([
            'prod_type_name'   => $request->name,
            'prod_type_slug'   => $slug,
            'prod_type_status' => $request->status,
            'cate_id'          => $request->category
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
        $prodType = $this->type->find($id);
        $category = $this->cate->all();
        return response()->json(['category' => $category, 'prodType' => $prodType],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductTypeRequest $request, $id)
    {
        $slug = Str::slug($request->name);
        $prodType = $this->type->update($id,[
            'prod_type_name'   => $request->name,
            'prod_type_slug'   => $slug,
            'prod_type_status' => $request->status,
            'cate_id'          => $request->category
        ]);
        return response()->json(['message'=>'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->type->delete($id);
        return response()->json(['message'=>'Xóa thành công']);
    }
}
