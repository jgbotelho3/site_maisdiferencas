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
        return Inertia::render('Dashboard/NewCategory');
    }

    public function store(Request $request){

        if(!$request['category_name']){
            return Inertia::render('Dashboard/NewCategory', ['errors.category_name' => 'Campo obrigatório']);
        }

        Category::create($request->validate([
            'category_name' => ['required', 'max:20']
        ]));

        return to_route('category.index');

    }

    public function edit($id){

        $category = Category::find($id);

        return Inertia::render('Dashboard/EditCategory', ['category' => $category]);
    }

    public function update(Request $request, $id){

        dd($request .  '.... ' . $id);
    }
}
