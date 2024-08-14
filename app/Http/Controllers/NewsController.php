<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $categories = Category::all(); // Recupera tutte le categorie
        $news = News::orderBy('created_at', 'desc')->get(); // Recupera tutte le news
        
        return view('welcome', compact('categories', 'news')); // Passa le categorie e le news alla vista
    }
    
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $categories = Category::all(); // Aggiungi questa riga
        return view('news.create-news', compact('categories'));
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
            'category_id' => $request->category_id,
        ]);
        
        // Redirect con un messaggio di successo
        return redirect()->route('welcome')->with('success', 'Articolo creato con successo!');
    }
    
    
    /**
    * Display the specified resource.
    */
    public function show($id)
    {
        $categories = Category::all(); // Aggiungi questa riga
        $news = News::findOrFail($id);
        
        return view('news.show-news', compact('news', 'categories'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
        $categories = Category::all(); // Aggiungi questa riga
        $newsItem = News::findOrFail($id);
        
        return view('news.edit-news', compact('newsItem', 'categories'));
    }
    
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        // Trova la notizia tramite l'id
        $newsItem = News::findOrFail($id);
        
        
        $newsItem->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);
        
        
        // Se c'è un'immagine, gestisci il caricamento
        if ($request->hasFile('image')) {
            // Elimina l'immagine precedente se esiste
            if ($newsItem->image) {
                Storage::delete('public/img/' . $newsItem->image);
            }
            
            // Carica la nuova immagine
            $imagePath = $request->file('image')->store('public/img');
            $newsItem->image = basename($imagePath);
        }
        
        // Salva le modifiche nel database
        $newsItem->save();
        
        // Redirect alla lista delle news con un messaggio di successo
        return redirect()->route('dashboard')->with('success', 'La notizia è stata aggiornata con successo!');
    }
    
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $newsItem = News::findOrFail($id);
        
        $newsItem->delete();
        
        return redirect()->route('dashboard')->with('success', 'la notizia é stata eliminata con successo');
    }
}
