<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Category;
use App\User;

class StatusController extends Controller
{
    public function getList(){
        $status = Status::all();
        return view('admin.status.list',['status'=>$status]);
    }
    public function getAdd(){
        return view('admin.status.add');
    }
    public function getUpdate($id){
        $status = Status::find($id);
        return view('admin.status.update',['status'=>$status]);
    }
    public function postUpdate(Request $request,$id){
        $status = Status::find($id);
        $this->validate($request,
        [   
            
            'tittel'=>'required|min:6|max:100',
            
        ],
        [   
           
            'tittel.required'=>'Name is not null!',
            'tittel.min' => 'Name min is = 6',
            'tittel.max' => 'Name max is = 100',
            
        ]);
        $status = new Status ;
        $status -> tittel = $request-> tittel;
        $status -> start = $request -> start;
        $status -> end = $request -> end;
        $status -> content = $request -> content;
        $status -> id_user = $request -> id_user;
        $status -> id_category = $request -> id_category;
        
        $status->save();
        return redirect('admin/status/update/'.$id)->with('Noti','Successful');
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [   
            
            'tittel'=>'required|min:6|max:100',
            
        ],
        [   
           
            'titltittele.required'=>'Name is not null!',
            'tittel.min' => 'Name min is = 6',
            'tittel.max' => 'Name max is = 100',
            
        ]);
        $status = new Status ;
        $status -> tittel = $request-> tittel;
        $status -> start = $request -> start;
        $status -> end = $request -> end;
        $status -> content = $request -> content;
        $status -> id_user = $request -> id_user;
        $status -> id_category = $request -> id_category;
        $status->save();
        return redirect('admin/status/add')->with('Noti','Successful');

    }
    public function getDelete($id){
        $status = Status::find($id);
        $status->delete();
        return redirect('admin/status/list')->with('noti','Status is deleted!');
    }
}
