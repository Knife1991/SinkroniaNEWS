<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
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

        $categories = Category::all();

        return view('index', compact('totalNews', 'totalUser', 'news', 'categories'));
    }
    
    public function profilo(){

        return view('profile');

    }

    public function settings(){

        return view('settings');

    }
}
