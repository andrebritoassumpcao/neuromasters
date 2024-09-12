<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProfissionalUser;
use App\Models\FormacaoProfissional;
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
        return redirect()->intended('profissional/loginProfissionais');
    }

    public function mostrarPerfil($id_profissional)
    {
        // Buscar o Beneficiário pelo ID
        $user = ProfissionalUser::findOrFail($id_profissional);

        $user->nameInitials = $this->getNameInitials($user->name);

        $formacoes = FormacaoProfissional::where('profissional_id', $id_profissional)->get();

        return view('profissional.meuPerfil', compact('user', 'formacoes'));
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

    public function updateSobreProfissional(Request $request, $id)
    {
        // Validar o campo resumo_profissional na requisição
        $request->validate([
            'resumo_profissional' => 'required|string',
        ]);

        // Buscar o usuário profissional pelo ID
        $user = ProfissionalUser::findOrFail($id);

        // Atualizar o campo resumo_profissional com o novo valor
        $user->update([
            'resumo_profissional' => $request->input('resumo_profissional'),
        ]);

        // Mensagem de sucesso
        Alert::alert('Sucesso!', 'Seu resumo profissional foi atualizado com sucesso.', 'success');

        // Redirecionar para a página de perfil do profissional
        return redirect()->route('profissionalPerfil.index', ['id_profissional' => $user->id]);
    }

    public function createFormacao(Request $request, $id)
    {
        $user = ProfissionalUser::findOrFail($id);
        $id_profissional = $user->id;


        FormacaoProfissional::create([
            'profissional_id' => $id_profissional,
            'instituicao_ensino' => $request->input('instituicao_ensino'),
            'curso' => $request->input('curso'),
            'formacao' => $request->input('formacao'),
            'inicio_mes' => $request->input('inicio_mes'),
            'inicio_ano' => $request->input('inicio_ano'),
            'fim_mes' => $request->input('fim_mes'),
            'fim_ano' => $request->input('fim_ano'),
            'descricao_curso' => $request->input('descricao_curso'),
            'especialidades' => $request->input('especialidades'),
        ]);

        return redirect()->route('profissionalPerfil.showFormacoes', ['id_profissional' => $id_profissional]);
    }
    public function updateFormacao(Request $request, $formacao_id)
    {
        $request->validate([
            'instituicao_ensino' => 'required|string',
            'curso' => 'required|string',
            'formacao' => 'required|string',
            'inicio_mes' => 'required|string',
            'inicio_ano' => 'required|integer',
            'fim_mes' => 'nullable|string',
            'fim_ano' => 'nullable|integer',
            'descricao_curso' => 'nullable|string',
            'especialidades' => 'nullable|string',
        ]);

        $formacao = FormacaoProfissional::findOrFail($formacao_id);
        $formacao->update($request->all());

        return redirect()->back()->with('success', 'Formação profissional atualizada com sucesso.');
    }

    public function showFormacoes($id_profissional)
    {
        $user = ProfissionalUser::findOrFail($id_profissional);

        $formacoes = FormacaoProfissional::where('profissional_id', $id_profissional)->get();

        // Envia os dados das formações para a view 'formacao-profissional'
        return view('profissional.formacao-profissional', ['formacoes' => $formacoes, 'user' => $user]);
    }

    // Função para deletar uma formação profissional
    public function deleteFormacao($formacao_id)
    {
        $formacao = FormacaoProfissional::findOrFail($formacao_id);
        $formacao->delete();

        return redirect()->back()->with('success', 'Formação profissional removida com sucesso.');
    }

    public function updateCompetencias(Request $request, $id_profissional)
    {
        // Validar a entrada
        $request->validate([
            'competencias' => 'array|max:10',
            'competencias.*' => 'string|max:255',
        ]);

        $profissional = ProfissionalUser::findOrFail($id_profissional);

        // Obter o array de competências do request
        $competenciasInput = $request->input('competencias', []);

        // Criar um array para armazenar todas as competências separadas
        $competenciasArray = [];

        // Iterar sobre cada item do array de competências
        foreach ($competenciasInput as $competencia) {
            // Se o item contém múltiplas competências separadas por vírgula, separar usando explode
            $partes = explode(',', $competencia);

            // Remover espaços extras ao redor de cada competência e adicionar ao array principal
            foreach ($partes as $parte) {
                $parte = trim($parte);
                if (!empty($parte) && !in_array($parte, $competenciasArray)) {
                    $competenciasArray[] = $parte;
                }
            }
        }

        // Limitar a quantidade de competências ao máximo permitido (10)
        $competenciasArray = array_slice($competenciasArray, 0, 10);

        // Atualizar as competências no modelo
        $profissional->competencias = $competenciasArray;

        // Salvar as competências
        $profissional->save();

        return redirect()->back()->with('success', 'Competências atualizadas com sucesso!');
    }

    public function deleteCompetencias(Request $request, $id_profissional)
    {
        $request->validate([
            'competencia' => 'string|max:255',
        ]);

        $profissional = ProfissionalUser::findOrFail($id_profissional);
        $competencias = $profissional->competencias ?? [];

        $competencias = array_filter($competencias, function ($competencia) use ($request) {
            return $competencia !== $request->input('competencia');
        });

        $profissional->competencias = array_values($competencias);
        $profissional->save();

        return redirect()->back()->with('success', 'Competência removida com sucesso!');
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
