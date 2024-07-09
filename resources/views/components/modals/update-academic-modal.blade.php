<div class="modal" id="updateAcademicModal" tabindex="-1" aria-labelledby="updateAcademicModalLabel" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="academicModalLabel">Atualizar Formação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profissionalPerfil.updateFormacao', ['formacao_id' => $formacao->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-campo-component inputType="text" inputName="instituicao_ensino"
                        value="{{ $formacao->instituicao_ensino ?? '' }}" :placeholder="'Digite a instituição de ensino'" class="max-col">
                        <x-slot name="labelSlot">
                            Instituição de ensino:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="text" inputName="curso" value="{{ $formacao->curso ?? '' }}"
                        :placeholder="'Digite o curso'" class="max-col">
                        <x-slot name="labelSlot">
                            Curso:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="select" inputName="formacao" id="tipoAtendimento" required
                        :options="[
                            ['value' => 'Selecione', 'label' => $formacao->formacao],
                            ['value' => 'Graduação', 'label' => 'Graduação'],
                            ['value' => 'Pós-Graduação', 'label' => 'Pós-Graduação'],
                            ['value' => 'Mestrado', 'label' => 'Mestrado'],
                            ['value' => 'Doutorado', 'label' => 'Doutorado'],
                            ['value' => 'Cursos de Extensão', 'label' => 'Cursos de Extensão'],
                            ['value' => 'Outros', 'label' => 'Outros'],
                        ]" class="max-col">
                        <x-slot name="labelSlot">
                            Formação:
                        </x-slot>
                    </x-campo-component>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="mesInicio">Início:</label>
                            <select name="inicio_mes" id="mesInicio" class="form-control">
                                <option value="{{ $formacao->inicio_mes }}">{{ $formacao->inicio_mes }}</option>
                                <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="anoInicio">Ano:</label>
                            <input type="text" name="inicio_ano" id="anoInicio" class="form-control"
                                value="{{ $formacao->inicio_ano ?? '' }}" placeholder="Digite o ano">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="fim_mes">Fim:</label>
                            <select name="fim_mes" id="fim_mes" class="form-control">
                                <option value="{{ $formacao->fim_mes }}">{{ $formacao->fim_mes }}</option>
                                <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="fim_ano">Ano:</label>
                            <input type="text" name="fim_ano" id="fim_ano" class="form-control"
                                value="{{ $formacao->fim_ano ?? '' }}" placeholder="Digite o ano">
                        </div>
                    </div>

                    <x-campo-component inputType="textarea" inputName="descricao_curso" :placeholder="'Digite a descrição do curso'"
                        value="{{ $formacao->descricao_curso ?? '' }}">
                        <x-slot name="labelSlot">
                            Descrição do curso:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="textarea" inputName="especialidades" :placeholder="'Ex: especialidade em nutrição funcional integrativa'"
                        value="{{ $formacao->especialidades ?? '' }}">
                        <x-slot name="labelSlot">
                            Especialidades/Informações complementares:
                        </x-slot>
                    </x-campo-component>
                    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
                        Atualizar
                    </x-submit-button>
                </form>
            </div>
        </div>
    </div>
</div>
