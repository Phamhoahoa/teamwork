<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;


class CourseController extends Controller
{
    public function getList(){
        $course = Course::all();
        return view('admin.course.list',['course'=>$course]);
    }
    public function getAdd(){
        return view('admin.course.add');
    }
    public function getUpdate($id){
        $course = Course::find($id);
        return view('admin.course.update',['course'=>$course]);
    }
    public function postUpdate(Request $request,$id){
        $course = Course::find($id);
        $this->validate($request,
        [   
            'code'=>'unique:course,code',
            'name'=>'required|min:6|max:40',
        ],
        [   
            'code.unique'=>'code is unique',
            'name.required'=>'Name is not null!',
            'name.min' => 'Name min is = 6',
            'name.max' => 'Name max is = 40',
        ]);
        $course = new Course ;
        $course -> code = $request-> code;
        $course -> name = $request -> name;
       
        $course->save();
        return redirect('admin/course/update/'.$id)->with('Noti','Successful');
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [   
            'code'=>'unique:course,code',
            'name'=>'required|min:6|max:40',
        ],
        [   
            'code.unique'=>'code is unique',
            'name.required'=>'Name is not null!',
            'name.min' => 'Name min is = 6',
            'name.max' => 'Name max is = 40',
        ]);
        $course = new Course ;
        $course -> code = $request-> code;
        $course -> name = $request -> name;
       
        $course->save();
        return redirect('admin/course/add')->with('Noti','Successful');

    }
    public function getDelete($id){
        $course = Course::find($id);
        $course->delete();
        return redirect('admin/course/list')->with('noti','course is deleted!');
    }
}
