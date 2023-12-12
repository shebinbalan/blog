<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = Article::latest()->paginate(5);
        
        return view('articles.index',compact('articles'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $tags=Tag::all();
        return view('articles.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => '',
            'category_id' => 'required',
            'tag_id' => 'required|array',
            
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
      
        $article = Article::create($input);

        $article->tags()->attach($request->input('tag_id'));
       
        return redirect()->route('articles.index')
                        ->with('success','articles created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        $tags=Tag::all();
        $categories = Category::all();
        return view('articles.edit',compact('article','categories','tags'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => '',
            'category_id' => 'required',
            'tag_id' => 'required|array',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $article->tags()->sync($request->input('tag_id'));  
        $article->update($input);
       
        return redirect()->route('articles.index')
                        ->with('success','article updated successfully');
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
         
        return redirect()->route('articles.index')
                        ->with('success','article deleted successfully');
    }
}
