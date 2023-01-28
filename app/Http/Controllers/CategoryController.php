<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CategoryController extends Controller
{
    public function index()
    {
         return Inertia::render('Dashboard/Categories', ['categories' => Category::all(), 'message' => 'Usuário cadastrado com sucesso']);
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

        $is_valid = Category::where('id', $id)->first();
        if(!$is_valid) {
            return Inertia::render('Dashboard/EditCategory', ['errors.category_name' => 'Categoria Inválida!']);
        }

        if(!$request['category_name']){
            return Inertia::render('Dashboard/EditCategory', ['errors.category_name' => 'Campo obrigatório!']);
        }

        $category = Category::find($id);

        $category->category_name = $request['category_name'];
        $category->save();

        return to_route('category.index');
    }

    public function destroy($id){
        $is_valid = Category::where('id', $id)->first();
        if(!$is_valid) {
            return Inertia::render('Dashboard/Categories', ['message' => 'Categoria Inválida!']);
        }
        $is_valid->delete();
        return to_route('category.index');
    }

}
