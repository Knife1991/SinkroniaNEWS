<?php

namespace App\Http\Controllers;

use App\Models\Category;

abstract class Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }
}
