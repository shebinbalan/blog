<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;

class HomeController extends Controller
{
   public function index()
   {
    if(Auth::id())
    {
        $usertype=Auth()->user()->usertype;
        if($usertype=='user')
        {
            return view('home.homepage');
        }
        else if($usertype=='admin')
        {
            return view('admin.adminhome');
        }
        else{
            return redirect()->back();
        }
    }

   }

   public function homepage()
   {
    $articles = Article::latest()->paginate(5);
        
    return view('home.homepage',compact('articles'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
  
   }

   public function home()
   {
       return view('home');
   }

   public function articles()
   {
    return view('home.articles');
   }
}
