<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Contracts\TagsRepositoryInterface;
use App\Http\Requests\AddTagsRequest;
use App\Http\Requests\EditTagsRequest;

class TagsController extends Controller
{
    protected $tag;
    public function __construct(TagsRepositoryInterface $tag){
        $this->tag = $tag;
    }

    public function index()
    {
        $tags = $this->tag->pagination();
        return view('admin.tags.list',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTagsRequest $request)
    {
        $tags=$this->tag->create([
            'tag_name'   => $request->name,
            'tag_status' => $request->status
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
        $tag = $this->tag->find($id);
        return response()->json($tag,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTagsRequest $request, $id)
    {
       $tag = $this->tag->update($id,[
            'tag_name'   => $request->name,
            'tag_status' => $request->status,
       ]);
       return response()->json(['message' => 'Sửa thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tag->delete($id);
        return response()->json(['message' => 'Xóa thành công']);
    }
}
