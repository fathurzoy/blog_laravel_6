<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(Posts $posts){
        $data = $posts->orderBy('created_at','desc')->get();
        
        return view('blog',compact('data'));
    }
}
