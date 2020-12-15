<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Http\Requests\AddCommentRequest;
use App\Http\Requests\EditCommentRequest;

class CommentsController extends Controller
{
 	protected $comment;
    
    public function __construct(CommentRepositoryInterface $comment){
        $this->comment = $comment;
    }

    public function index(){
        $comments = $this->comment->all();
    	return view('admin.comments.list', compact('comments'));
    }

 	public function create(){

    }

 	public function store(AddCommentRequest $request, $id){
    
    }

    public function show($id){
    
    }

    public function edit($id){
        $com = $this->comment->find($id);
        return view('admin.comments.edit', compact('com'));
    }

    public function update(EditCommentRequest $request, $id){
        $com = $this->comment->update($id, [
            'com_name'    => $request->name,
            'com_email'   => $request->email,
            'com_content' => $request->message,
            'prod_id'     => $id,
            'com_status'  => 1,
            'slide_id'    => null
        ]);
        return redirect('admin/comments')->with('message','Sửa comment thành công');
    }

    public function destroy($id){
        $this->comment->delete($id);
        return redirect()->back()->with('message','Xóa thành công');
    }

}
