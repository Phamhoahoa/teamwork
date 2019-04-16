<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;

class HomeController extends Controller
{
    public function getHome(){
      
        // $status = Status::with(array('StatusUser'))->get();
        $status = Status::all();
        return view("client.layout.home",['status'=>$status]);
    }
   
}
