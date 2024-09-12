<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfissionalUser;


class ProfissionaisController extends Controller
{
    public function index()
    {
        // Busca todos os profissionais
        $profissionais = ProfissionalUser::all();

        // Retorna a view com os dados dos profissionais
        return view('profissionais.index', compact('profissionais'));
    }
}
