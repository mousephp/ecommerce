<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CateRepositoryInterface;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Support\Str;
use Log;
use Exception;

class CateController extends Controller
{
    protected $category;

    public function __construct(CateRepositoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->pagination();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCateRequest $request)
    {   
        try {
            $cate = $this->category->create([
                'cate_name'   => $request->name,
                'cate_slug'   => !empty($request->name) ? $request->name : Str::slug($request->name, '-'),
                'cate_status' => $request->status
            ]);
            return redirect()->back()->with('message','Thêm thành công');   
        } catch (Exception $exception) {
            Log::error('error-->:'.$exception->getMessage() .$exception->getLine());
        } 
       
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
        $cate = $this->category->find($id);
        return response()->json($cate,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCateRequest $request, $id)
    {
        try {
            $cate_slug = Str::slug($request->name, '-');
            $category = $this->category->update($id,[
                'cate_name'   => $request->name,
                'cate_slug'   => $cate_slug,
                'cate_status' => $request->status
            ]);
            return response()->json(['message' => 'Sửa thành công']);
        } catch (Exception $exception) {
            Log::error('error-->:'.$exception->getMessage() .$exception->getLine());
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->category->delete($id);
            return response()->json(['message' => 'Xóa thành công']);
        } catch (Exception $exception) {
            Log::error('error-->:'.$exception->getMessage() .$exception->getLine());
        }      
    }

    public function deleteMultiple(Request $request){
        if(empty($request->checked)){
             return redirect()->back()->with('error','Không có bản ghi nào được chọn');
        }
        $multiple = $this->category->deleteMultiple($request->checked);
        if($multiple){
            return redirect()->back()->with('message','Xóa multiple thành công');
        }else{
            return redirect()->back()->with('error','Xóa multiple thất bại');
        } 
    }
}
