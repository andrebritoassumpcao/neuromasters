<?php

namespace App\Http\Controllers;

use App\DTO\BeneficiarioDTO;
use App\Services\BeneficiarioService;
use Illuminate\Http\Request;


class CadastrarBenefController extends Controller
{
    protected $beneficiarioService;

    public function __construct(BeneficiarioService $beneficiarioService)
    {
        $this->beneficiarioService = $beneficiarioService;
    }

    public function index()
    {
        $user = auth()->user();
        $beneficiarios = $user->beneficiarios;

        foreach ($beneficiarios as $beneficiario) {
            $beneficiario->nameInitials = $this->beneficiarioService->getNameInitials($beneficiario->nome_beneficiario);
        }

        return view('tea.beneficiarios.index', compact('beneficiarios'));
    }

    public function registerBeneficiario(Request $request)
    {
        $data = $request->only([
            'name',
            'cpf',
            'celular',
            'nascimento',
            'sexo',
            'peso',
            'altura',
            'identidade',
            'emissao',
            'orgao',
            'diagnostico',
            'diagnostico_detalhes',
            'nome_mae',
            'cpf_mae',
            'profissao_mae',
            'nome_pai',
            'cpf_pai',
            'profissao_pai',
            'estado_civil_pais',
            'cep',
            'logradouro',
            'bairro',
            'uf',
            'localidade',
            'numero',
            'complemento'
        ]);

        $data['user_id'] = $request->user_id ?: auth()->id();

        $beneficiarioDTO = new BeneficiarioDTO($data);
        $this->beneficiarioService->createBeneficiario($beneficiarioDTO);

        return redirect()->route('beneficiarios.index');
    }

    public function mostrarBeneficiario($id_beneficiario)
    {
        $beneficiario = $this->beneficiarioService->findBeneficiario($id_beneficiario);
        $beneficiario->nameInitials = $this->beneficiarioService->getNameInitials($beneficiario->nome_beneficiario);
        $idade = $this->beneficiarioService->calcularIdade($beneficiario->data_nascimento);

        return view('tea.beneficiario.index', compact('beneficiario', 'idade'));
    }

    public function uploadFoto(Request $request, $id_beneficiario)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beneficiario = $this->beneficiarioService->findBeneficiario($id_beneficiario);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->storeAs('images/fotos', $beneficiario->id . '.png', 'public');
            $this->beneficiarioService->updateFoto($beneficiario, $path);
        }

        return redirect()->back()->with('success', 'Foto enviada!');
    }
}
