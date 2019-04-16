<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function getList(){
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }
    public function getAdd(){
        return view('admin.user.add');
    }
    public function getUpdate($id){
        $user = User::find($id);
        return view('admin.user.update',['user'=>$user]);
    }
    public function postUpdate(Request $request,$id){
        $user = User::find($id);
        $this->validate($request,
        [   
            'mssv'=>'unique:user,mssv',
            'name'=>'required|min:6|max:40',
            'password'=>'required|min:6|max:40',
        ],
        [   
            'mssv.unique'=>'Mssv is unique',
            'name.required'=>'Name is not null!',
            'name.min' => 'Name min is = 6',
            'name.max' => 'Name max is = 40',
            'password.required'=>'Pass is not null',
            'password.min'=>'Pass min is = 6',
            'password.min'=>'Pass max is = 40',
        ]);
        $user = new User ;
        $user -> name = $request-> name;
        $user -> password = $request -> password;
        $user -> mssv = $request -> mssv;
        $user -> is_admin = $request -> is_admin;
        $user -> birth = $request -> birth;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user->save();
        return redirect('admin/user/update/'.$id)->with('noti','Successful');
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [
            'name'=>'required|min:6|max:40',
            'password'=>'required|min:6|max:40',
        ],
        [
            'name.required'=>'Name is not null!',
            'name.min' => 'Name min is = 6',
            'name.max' => 'Name max is = 40',
            'password.required'=>'Pass is not null',
            'password.min'=>'Pass min is = 6',
            'password.min'=>'Pass max is = 40',
        ]);
        $user = new User ;
        $user -> name = $request-> name;
        $user -> password = $request -> password;
        $user -> mssv = $request -> mssv;
        $user -> is_admin = $request -> is_admin;
        $user -> birth = $request -> birth;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user->save();
        return redirect('admin/user/add')->with('noti','Successful');

    }
    public function getDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('noti','User is deleted!');
    }
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request){
        $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required',
        ],
        [
            'email->required'=>'Email is not null',
            'password->required'=>'Password is not null',
        ]);
        
         $email = $request['email'];
         $password = $request['password'];
        // $_SESSION['email']= $email;
        // $_SESSION['password']= $password;

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('admin/user/list');
        }
        else{
            return redirect('admin/login')->with('noti','Login Fail');
        }
    }
}
