<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualizarPerfilRequest;
use App\Perfil;
use App\Receita;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        $receitas = Receita::where('user_id', $perfil->user_id)->paginate(3);
        return view('perfil.show', compact('perfil', 'receitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view', $perfil);
        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->authorize('update', $perfil);
        $data = request()->validate([
            'name' => 'required',
            'biografia' => 'required',
        ]);

        if ($request['imagem']) {
            $imagem = $request['imagem']->store('upload-perfis', 'public');
            $perfil->imagem = $imagem;
            $perfil->save();
            $array_imagem = ['imagem' => $imagem];
        }

        // Actualizar Nome
        auth()->user()->name = $data['name'];
        auth()->user()->save();

        // Eliminar url e name da variável $data
        unset($data['name']);

        // Actualizar biografia e imagem
        auth()->user()->perfil()->update(
            array_merge(
                $data,
                $array_imagem ?? []
            )
        );

        return redirect(route('receita.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
