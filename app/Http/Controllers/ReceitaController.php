<?php

namespace App\Http\Controllers;

use App\CategoriaReceita;
use App\Http\Requests\ActualizarReceitaRequest;
use App\Http\Requests\CreateReceitaRequest;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReceitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        auth()->user()->receitas->dd();
        // $receitas = auth()->user()->receitas;
        $user = auth()->user();

        $receitas = Receita::where('user_id', $user->id)->paginate(6);
        // $user = auth()->user();
        return view('receitas.index', compact('receitas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        Categoria sem model
        //        $categorias = DB::table('categoria_receita')->get()->pluck('name', 'id');
        //        Categoria com model
        $categorias = CategoriaReceita::all(['id', 'name']);
        return view('receitas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReceitaRequest $request)
    {

        //        dd($request->imagem->store('upload-receitas', 'public'));
        $imagem = $request->imagem->store('upload-receitas', 'public');
        //        Guardar sem model
        //       DB::table('receitas')->insert([
        //           'name' => $request->name,
        //           'preparacao' => $request->preparacao,
        //           'ingredientes' => $request->ingrediente,
        //           'user_id' => Auth::user()->id,
        //           'categoria_id' => $request->categoria,
        //           'imagem' => $imagem,
        //       ]);
        //       Guardar com model
        auth()->user()->receitas()->create([
            'name' => $request->name,
            'preparacao' => $request->preparacao,
            'ingredientes' => $request->ingrediente,
            'user_id' => Auth::user()->id,
            'categoria_id' => $request->categoria,
            'imagem' => $imagem,
        ]);
        return redirect(route('receita.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show($receita)
    {
        $receita = Receita::findOrFail($receita);
        $receitaIsLiked = auth()->user() ? auth()->user()->gosto->contains($receita) : false;

        $likesNumber = $receita->likes->count();
        return view('receitas.show', compact('receita', 'receitaIsLiked', 'likesNumber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit($receita)
    {
        $receita = Receita::findOrFail($receita);
        $this->authorize('view', $receita);
        $categorias = CategoriaReceita::all(['id', 'name']);
        return view('receitas.edit', compact('categorias', 'receita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarReceitaRequest $request, $receita)
    {
        $receita = Receita::findOrFail($receita);
        $this->authorize('update', $receita);
        $receita->name = $request->name;
        $receita->preparacao = $request->preparacao;
        $receita->ingredientes = $request->ingrediente;
        $receita->categoria_id = $request->categoria;

        if ($request->hasFile('imagem')) {
            $imagem = $request->imagem->store('upload-receitas', 'public');
            Storage::delete($receita->imagem);
            $receita->imagem = $imagem;
        }

        $receita->save();

        return redirect(route('receita.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Receita::findOrFail($id);
        $this->authorize('delete', $receita);
        $receita->delete();
        $receita->deleteImage();
        return redirect(route('receitas.index'));
    }

    public function search(Request $request)
    {
        // $busca = $request['buscar'];
        $busca = $request->get('buscar');

        $receitas = Receita::where('name', 'like', '%' . $busca . '%')->paginate(1);
        $receitas->appends(['buscar' => $busca]);
        return view('buscas.show', compact('receitas', 'busca'));
    }
}
