<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
         return Inertia::render('Dashboard/Categories', ['categories' => Category::all()]);
    }

    public function create(){
        return Inertia::render('Dashboard/NewCategorie');
    }
}
