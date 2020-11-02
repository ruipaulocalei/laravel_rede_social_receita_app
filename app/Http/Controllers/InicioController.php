<?php

namespace App\Http\Controllers;

use App\CategoriaReceita;
use App\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InicioController extends Controller
{
    public function index()
    {
        $votadas = Receita::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        $maisRecentes = Receita::latest()->limit(5)->get();

        $categorias = CategoriaReceita::all();

        $receitas = [];

        foreach ($categorias as $categoria) {
            $receitas[Str::slug($categoria->name)][] = Receita::where('categoria_id', $categoria->id)->take(3)->get();
        }

        // return $receitas;
        return view('inicio.index', compact('maisRecentes', 'receitas', 'votadas'));
    }
}
