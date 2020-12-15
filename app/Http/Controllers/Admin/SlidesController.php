<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\Contracts\SlidesRepositoryInterface;
use App\Http\Requests\AddSlideRequest;
use App\Http\Requests\EditSlideRequest;
use App\Traits\UploadTrait;
use File;

class SlidesController extends Controller
{
    use UploadTrait;
    protected $slide;

    public function __construct(SlidesRepositoryInterface $slide)
    {
        $this->slide = $slide;
    }
 
    public function index()
    {
        $data['slides'] = $this->slide->pagination();
        return view('admin.slides.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSlideRequest $request)
    {
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile('layouts/uploads/slides', $request->file('image'));
        } else {
            $fileName = null;
        }
        $slug = Str::slug($request->name);
        $this->slide->create([
            'slide_title'   => $request->name,
            'slide_slug'    => $slug,
            'slide_image'   => $fileName,
            'slide_content' => $request->description,
            'slide_status'  => $request->status
        ]);
        return redirect()->back()->with('message','Thêm thành công');
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
        $slide = $this->slide->find($id);
        //return view('admin.slides.edit',compact('slide'));
        return response()->json($slide,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSlideRequest $request, $id)
    {
        //dd(public_path('layouts/uploads/slides/'.$this->slide->find($id)->slide_image));
        $check = false;
        if (request()->hasFile('image') && request('image') != '') {          
            $fileName = $this->uploadFile('layouts/uploads/slides', $request->file('image'));
        }else {
            $check = true;
            $fileName = $this->slide->find($id)->slide_image;
        }
        if(!empty($request->image) && $check == false) {
            $this->deleteFile('layouts/uploads/slides',$this->slide->find($id)->slide_image);
        }

        $slug = Str::slug($request->name);
        $slide =  $this->slide->update($id,[
            'slide_title'   => $request->name,
            'slide_slug'    => $slug,
            'slide_image'   => $fileName,
            'slide_content' => $request->description,
            'slide_status'  => $request->status
        ]);
        return response()->json(['message' => 'Sửa thành công slides có id là'.$id],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file    = $this->slide->find($id)->slide_image;
        $destroy = $this->slide->delete($id);
        $this->deleteFile('layouts/uploads/slides', $file);
        return response()->json($destroy);
    }
}
