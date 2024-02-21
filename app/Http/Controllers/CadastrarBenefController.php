<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiarios;
use Illuminate\Support\Facades\Storage;


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

    public function uploadFoto(Request $request, $id_beneficiario)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beneficiario = Beneficiarios::find($id_beneficiario);

        if ($request->hasFile('foto')) {
            // Remova a imagem antiga se ela existir
            if ($beneficiario->foto) {
                Storage::delete($beneficiario->foto);
            }

            // Armazene a nova imagem
            $path = $request->file('foto')->storeAs('images/fotos', $beneficiario->id . '.png', 'public');

            // Atualize o caminho da imagem no banco de dados
            $beneficiario->update(['foto' => $path]);
        }

        return redirect()->back()->with('success', 'Foto enviada!');
    }
}
