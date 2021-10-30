<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
  
    public function index(Posts $posts){
        // $data = $posts->orderBy('created_at','desc')->take(8)->get();
        $category_widget = Category::all();

    	$data = $posts->latest()->take(8)->get();
    	return view('blog', compact('data','category_widget'));
    }

    public function isi_blog($slug){
        $category_widget = Category::all();
        $data = Posts::where('slug', $slug)->get();
        return view('blog.isi_post', compact('data', 'category_widget'));
    }

    public function list_blog(){
        $category_widget = Category::all();
        $data = Posts::latest()->paginate(6);
        return view('blog.list_post', compact('data', 'category_widget'));
    }

    public function list_category(Category $category){
        $category_widget = Category::all();

        $data = $category->posts()->paginate();
        return view('blog.list_post', compact('data', 'category_widget'));
    }

    public function cari(Request $request){
        $category_widget = Category::all();

        $data = Posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog.list_post', compact('data', 'category_widget'));
    }
}
