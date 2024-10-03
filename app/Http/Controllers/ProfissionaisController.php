<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfissionalService;
use App\DTO\ProfissionalDTO;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Validation\ValidationException;

class ProfissionaisController extends Controller
{
    protected $profissionalService;

    public function __construct(ProfissionalService $profissionalService)
    {
        $this->profissionalService = $profissionalService;
    }

    public function index(Request $request)
    {

        try {
            $this->profissionalService->validateSearchData($request->all());


            $searchDTO = new ProfissionalDTO(
                $request->input('name'),
                $request->input('profissao'),
                $request->input('competencia')
            );

            $profissionais = $this->profissionalService->search($searchDTO);

            return view('profissionais.index', compact('profissionais'));
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            Alert::error('Erro de Validação', implode('<br>', $errors));

            return redirect()->route('profissionais')->withInput();
        } catch (Exception $e) {
            Alert::error('Erro', $e->getMessage());

            return redirect()->route('profissionais')->withInput();
        }
    }
}
