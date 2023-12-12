<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10); // Adjust the query based on your application
    
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View

    {

        return view('tags.create');

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

        

        Tag::create($request->all());

         

        return redirect()->route('tags.index')

                        ->with('success','tags created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tags): View

    {

        return view('tags.show',compact('tags'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag): View
    {
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        
        $tag->update($request->all());
        
        return redirect()->route('tags.index')
                        ->with('success','tags updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
         
        return redirect()->route('tags.index')
                        ->with('success','tags deleted successfully');
    }
}
