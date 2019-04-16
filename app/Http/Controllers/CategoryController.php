<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getList(){
        $category = Category::all();
        
        return view('admin.category.list',['category'=>$category]);
    }
    public function getAdd(){
        return view('admin.category.add');
    }
    public function getUpdate($id){
       
        $category = Category::find($id);
        return view('admin.category.update',['category'=>$category]);
    }
    public function postUpdate(Request $request,$id){
        $category = Category::find($id);
        $this->validate($request,
        [   

            'name'=>'required|min:2|max:40',
        ],
        [   
            'name.min' => 'Name min is = 2',
            'name.max' => 'Name max is = 40',
        ]);
        $category = new Category ;
     
        $category -> name = $request -> name;
       
        $category->save();
        return redirect('admin/category/update/'.$id)->with('Noti','Successful');
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [   
           
            'name'=>'required|min:2|max:40',
        ],
        [   
           
            'name.required'=>'Name is not null!',
            'name.min' => 'Name min is = 2',
            'name.max' => 'Name max is = 40',
        ]);
        $category = new Category ;
        $category -> name = $request -> name;
       
        $category->save();
        return redirect('admin/category/add')->with('Noti','Successful');

    }
    public function getDelete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('noti','category is deleted!');
    }
   
}
