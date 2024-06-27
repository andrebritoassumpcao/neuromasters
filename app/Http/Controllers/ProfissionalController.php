<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProfissionalUser;
use Illuminate\Support\Facades\Storage;


class ProfissionalController extends Controller
{
      public function registerProfissional(Request $request)
    {
        // Obter o número total de usuários profissionais já registrados
        $totalUsers = ProfissionalUser::count();

        // Gerar o codigo_profissional
        $codigo_profissional = date('Y') . date('m') . str_pad($totalUsers + 1, 3, '0', STR_PAD_LEFT);

        // Criação do novo usuário profissional
        $user = ProfissionalUser::create([
            'codigo_profissional' => $codigo_profissional,
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'celular' => $request->input('celular'),
            'conselho_regional' => $request->input('conselho_regional'),
            'numero_conselho' => $request->input('numero_conselho'),
            'especialidade' => $request->input('especialidade'),
            'resumo_profissional' => $request->input('resumo_profissional'),
        ]);




        // Autenticação do novo usuário
        Auth::login($user);

        Alert::alert('Parabéns!', 'Seu registro foi concluído com sucesso. Faça o login para começar', 'Type');
        return redirect()->intended('profissionais-views/loginProfissionais');
    }

    public function mostrarPerfil($id_profissional)
    {
        // Buscar o Beneficiário pelo ID
        $user = ProfissionalUser::findOrFail($id_profissional);

        $user->nameInitials = $this->getNameInitials($user->name);

        return view('profissionais-views.meuPerfil', compact('user'));
    }
    public function updateProfissional(Request $request, $id)
    {
        // Buscar o usuário profissional pelo ID
        $user = ProfissionalUser::findOrFail($id);

        // Atualizar os dados do usuário profissional
        $user->update([
            'name' => $request->input('name'),
            'telefone' => $request->input('telefone', $user->telefone),
            'cpf' => $request->input('cpf', $user->cpf),
            'cep' => $request->input('cep', $user->cep),
            'rua' => $request->input('logradouro', $user->rua),
            'bairro' => $request->input('bairro', $user->bairro),
            'estado' => $request->input('uf', $user->estado),
            'cidade' => $request->input('localidade', $user->cidade),
            'numero' => $request->input('numero', $user->numero),
            'complemento' => $request->input('complemento', $user->complemento),
            'atendimento' => $request->input('atendimento', $user->atendimento),

        ]);

        // Mensagem de sucesso
        Alert::alert('Sucesso!', 'Seu perfil foi atualizado com sucesso.', 'success');

        // Redirecionar para a página de perfil do profissional
        return redirect()->route('profissionalPerfil.index', ['id_profissional' => $user->id]);
    }
    public function uploadFotoPerfil(Request $request, $id_profissional)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $profissional = ProfissionalUser::find($id_profissional);
        if ($request->hasFile('foto')) {
            // Remove the old image if it exists
            if ($profissional->foto) {
                Storage::delete($profissional->foto);
            }
            // Store the new image
            $path = $request->file('foto')->storeAs('images/fotos', $profissional->id . '.png', 'public');
            // Update the image path in the database
            $profissional->update(['foto' => $path]);
        }
        return redirect()->back()->with('success', 'Foto enviada!');
    }

     public function getNameInitials($name)
    {
        $initials = '';
        $words = explode(' ', $name);

        // Pegar as duas primeiras letras do primeiro nome
        if (isset($words[0])) {
            $initials .= strtoupper(substr($words[0], 0, 1));
        }

        // Pegar as duas primeiras letras do último nome
        if (count($words) > 1 && isset($words[count($words) - 1])) {
            $initials .= strtoupper(substr($words[count($words) - 1], 0, 1));
        }

        return $initials;
    }
}
