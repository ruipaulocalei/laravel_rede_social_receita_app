<?php

namespace App\Http\Controllers;

use App\Receita;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(Request $request, $receita)
    {
        $receita = Receita::findOrFail($receita);
        return auth()->user()->gosto()->toggle($receita);
    }
}
