<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        
        return view('welcome', compact('news'));      
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('news/create-news');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        
        // Gestione del caricamento dell'immagine
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }
        
        // Creazione dell'articolo
        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'img' => $imagePath,
        ]);
        
        // Redirect con un messaggio di successo
        return redirect()->route('welcome')->with('success', 'Articolo creato con successo!');
    }
    
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        
        return view('news/show-news', compact('news'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        
        $newsItem = News::findOrFail($id);
        
        return view('news.edit-news', compact('newsItem'));
    }
    
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        //
    }
}
