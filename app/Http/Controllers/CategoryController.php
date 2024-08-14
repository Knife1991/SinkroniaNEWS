<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    // Metodo index per tutte le categorie
    public function index()
    {
        $categories = Category::all(); // Aggiungi questa riga
        $news = News::orderBy('created_at', 'desc')->get();
        
        return view('welcome', compact('categories', 'news'));
    }
    
    
    // Metodo index per una specifica categoria (con ID)
    public function indexCategory($id)
    {
        $categories = Category::all(); // Recupera tutte le categorie
        $category = Category::findOrFail($id); // Recupera la categoria specifica tramite l'ID
        $news = $category->news; // Recupera tutte le news associate a quella categoria
        
        return view('category.category-index', compact('categories', 'category', 'news'));
    }
    
    
    
    
    
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('categories.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        Category::create([
            'name' => $request->name,
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Categoria creata con successo.');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Categoria aggiornata con successo.');
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('dashboard')->with('success', 'Categoria eliminata con successo.');
    }
}
