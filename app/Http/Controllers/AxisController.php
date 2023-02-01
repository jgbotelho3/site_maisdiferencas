<?php

namespace App\Http\Controllers;

use App\Models\Axis;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AxisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard/Axis/Axis', ['axis' => Axis::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Dashboard/Axis/NewAxis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request['word']){

            return redirect()->route('axis.create')
            ->with("error", 'Campo obrigatório');

        }

        Axis::create($request->validate([
            'word' => ['required', 'max:100']
        ]));

        return redirect()->route('axis.index')
        ->with("success", 'Eixo de trabalho cadastrado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Dashboard/Axis/EditAxis', ['axis' => Axis::find($id)]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $is_valid = Axis::where('id', $id)->first();
        if(!$is_valid) {
            return redirect()->route('axis.index')
            ->with("error", 'Eixo de trabalho inválido!!!');
        }

        if(!$request['word']){
            return redirect()->route('axis.update.show', $id)
            ->with("error", 'Campo obrigatório!!!');
        }

        $eixo = Axis::find($id);

        $eixo->word = $request['word'];
        $eixo->save();

        return redirect()->route('axis.index')
        ->with("success", 'Eixo de Trabalho editado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_valid = Axis::where('id', $id)->first();
        if(!$is_valid) {
            return redirect()->route('axis.index')
            ->with("error", 'Eixo de trabalho inválido!!!');
        }
        $is_valid->delete();
        return redirect()->route('axis.index')
        ->with("success", 'Eixo de trabalho excluído com sucesso!!!');
    }
}
