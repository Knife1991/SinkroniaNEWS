<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
        return view('welcome');
    }
    
    public function dashboard(){

        $totalNews = News::count();

        $totalUser = User::count();

        $news = News::all();

        return view('index', compact('totalNews', 'totalUser', 'news'));
    }
    
    
}
