<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10); // Adjust the query based on your application
    
        return view('categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View

    {

        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse

    {

        $request->validate([

            'name' => 'required',

            'slug' => 'required',

        ]);

        

        Category::create($request->all());

         

        return redirect()->route('categories.index')

                        ->with('success','categories created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories): View

    {

        return view('categories.show',compact('categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        
        $category->update($request->all());
        
        return redirect()->route('categories.index')
                        ->with('success','categories updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
         
        return redirect()->route('categories.index')
                        ->with('success','categories deleted successfully');
    }
}
