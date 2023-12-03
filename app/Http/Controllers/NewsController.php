<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $News = News::get();
        return view('newslist',compact('News'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
       {$news= new news;
        $news-> title="politican";
        $news-> content="the content with you now";
        $news-> author="Masa";
        $news-> published=true;
        $news-> save();
        return "News data added successfully";
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $News = News::findOrFail($id);
        return view('NewsDetails',compact('News'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('updateNew');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        News::where('id', $id)->update($request->only($this->columns));
        return 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        News::where('id', $id)->delete();
        return redirect('News');
    }
    public function trashed(){
        $News = News::onlyTrashed()->get();
        return view('trashedNews', compact('News'));
    }

    public function restore(string $id): RedirectResponse
    {
        News::where('id', $id)->restore();
        return redirect('newslist');
    }
}
