<?php

namespace App\Http\Controllers;

use App\CategoriaReceita;
use App\Receita;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(CategoriaReceita $categoriaReceita)
    {
        $receitas = Receita::where('categoria_id', $categoriaReceita->id)->paginate(2);
        return view('categorias.show', compact('receitas', 'categoriaReceita'));
    }
}
