<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\PasswordRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
   
    protected $user;

    public function __construct(UserRepositoryInterface $user){
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->pagination();
        return view('admin.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $result = $this->user->create([
            'name'      =>     $request->name,
            'email'     =>    $request->email,
            'password'  => bcrypt($request->password)
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
        $user = $this->user->find($id);
        //return response()->json($user,200);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //lưu ý thự thực hiện update với ajax sẽ sảy ra lỗi không xác thực được pasword cũ nhập đúng hay sai
    public function update(EditUserRequest $request, $id)
    {
        $user = $this->user->find($id);
        $data = $request->all(); 
        if(!\Hash::check($data['user_password'], $user->password)){
            return response()->json(['error'=>'Bạn đã nhập sai mật khẩu cũ']);
       }else{
            $this->user->update($id,['password'=> bcrypt($request->user_password_new)]);
            return redirect()->back()->withInput($request->input())->with('message','Cập nhâp mật khẩu thành công'); 
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
        $this->user->delete($id);
        return response()->json(['message' => 'Xóa thành công']);
    }


    public function getUpdatePassword()
    { 
        return view('admin.users.password');;
    }

    public function postUpdatePassword(PasswordRequest $request)
    {
        $data = $request->all(); 
        $user = $this->user->find(auth()->user()->id);
        if(!\Hash::check($data['user_password'], $user->password)){
            return redirect()->back()->with('error','Bạn đã nhập sai mật khẩu');
        }else{          
            $this->user->updateId($user->id,[
                'password'=> bcrypt($request->user_password_new)
            ]);
            return redirect()->back()->with('message','Cập nhâp mật khẩu thành công'); 
        }
    }

}

