<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiarios;


class CadastrarBenefController extends Controller
{
    public function index()
    {
        $beneficiarios = Beneficiarios::all();
        return view('tea.meus-beneficiarios', compact('beneficiarios'));
    }
    public function registerBeneficiario(Request $request){

        $beneficiarios = Beneficiarios::create([
            'nome_beneficiario' =>$request->input('name'),
            'cpf_beneficiario' =>$request->input('cpf'),
            'telefone' =>$request->input('telefone'),
            'data_nascimento' =>$request->input('nascimento'),
            'sexo' =>$request->input('sexo'),
            'peso' => str_replace(',', '.', $request->input('peso')),
            'altura' => str_replace(',', '.', $request->input('altura')),
            'identidade' =>$request->input('identidade'),
            'data_emissao_identidade' =>$request->input('emissao'),
            'orgao_emissor_identidade' =>$request->input('orgao'),
            'diagnostico_principal' =>$request->input('diagnostico'),
            'detalhes_diagnostico' =>$request->input('diagnostico_detalhes'),
            'nome_mae' =>$request->input('nome_mae'),
            'cpf_mae' =>$request->input('cpf_mae'),
            'profissao_mae' =>$request->input('profissao_mae'),
            'nome_pai' =>$request->input('nome_pai'),
            'cpf_pai' =>$request->input('cpf_pai'),
            'profissao_pai' =>$request->input('profissao_pai'),
            'estado_civil_pais' =>$request->input('estado_civil_pais'),
            'cep' =>$request->input('cep'),
            'rua' =>$request->input('logradouro'),
            'bairro' =>$request->input('bairro'),
            'estado' =>$request->input('uf'),
            'cidade' =>$request->input('localidade'),
            'numero' =>$request->input('numero'),
            'complemento' =>$request->input('complemento'),
        ]);

        return redirect()->intended('beneficiarios.index');


    }

    public function mostrarBeneficiario($id_beneficiario){
          // Buscar o Beneficiário pelo ID
    $beneficiario = Beneficiarios::findorFail($id_beneficiario);



    return view('tea.meu-beneficiario', compact('beneficiario'));
    }

}
