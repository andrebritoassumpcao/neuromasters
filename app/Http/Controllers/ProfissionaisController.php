<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfissionalUser;


class ProfissionaisController extends Controller
{
    public function index(Request $request)
    {
        $nome = $request->input('name');
        $profissao = $request->input('profissao');
        $assunto = $request->input('assunto');

        $query = ProfissionalUser::query();

        if (!empty($nome)) {
            $query->where('name', 'like', '%' . $nome . '%');
        }

        if (!empty($profissao) && $profissao !== 'Selecione') {
            $query->where('especialidade', $profissao);
        }

        if (!empty($assunto) && $assunto !== 'Selecione') {
            $query->where('especialidade', 'like', '%' . $assunto . '%');
        }

        $profissionais = $query->get();

        return view('profissionais.index', compact('profissionais'));
    }
}
