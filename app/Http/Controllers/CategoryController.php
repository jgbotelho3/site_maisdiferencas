<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(){
         return Inertia::render('Dashboard/Categories', ['categories' => Category::all(), 'message' => 'Usuário cadastrado com sucesso']);
    }

    public function create(){
        return Inertia::render('Dashboard/NewCategory');
    }

    public function store(Request $request){

        if(!$request['category_name']){

            return redirect()->route('category.create')
            ->with("error", 'Campo obrigatório');

        }

        Category::create($request->validate([
            'category_name' => ['required', 'max:20']
        ]));

        return redirect()->route('category.index')
        ->with("success", 'Categoria cadastrada com sucesso!!!');

    }

    public function edit($id){

        return Inertia::render('Dashboard/EditCategory', ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id){

        $is_valid = Category::where('id', $id)->first();
        if(!$is_valid) {
            return redirect()->route('category.index')
            ->with("error", 'Categoria inválida!!!');
        }

        if(!$request['category_name']){
            return redirect()->route('category.update.show', $id)
            ->with("error", 'Campo obrigatório!!!');
        }

        $category = Category::find($id);

        $category->category_name = $request['category_name'];
        $category->save();

        return redirect()->route('category.index')
        ->with("success", 'Categoria editada com sucesso!!!');
    }

    public function destroy($id){
        $is_valid = Category::where('id', $id)->first();
        if(!$is_valid) {
            return redirect()->route('category.index')
            ->with("error", 'Categoria inválida!!!');
        }
        $is_valid->delete();
        return redirect()->route('category.index')
        ->with("success", 'Categoria Excluída com sucesso!!!');

    }

}
