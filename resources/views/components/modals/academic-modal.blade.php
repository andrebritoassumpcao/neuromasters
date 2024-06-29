<div class="modal" id="academicModal" tabindex="-1" aria-labelledby="academicModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="academicModalLabel">Formação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profissionalPerfil.update', ['id_profissional' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-campo-component inputType="text" inputName="name" value="" :placeholder="'Digite a insituição de ensino'"
                        class="max-col">
                        <x-slot name="labelSlot">
                            Instituição de ensino:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="text" inputName="name" value="" :placeholder="'Digite o curso'"
                        class="max-col">
                        <x-slot name="labelSlot">
                            Curso:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="select" inputName="atendimento" id="tipoAtendimento" required
                        :options="[
                            ['value' => 'Selecione', 'label' => 'Selecione'],
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
                            <select name="mesInicio" id="mesInicio" class="form-control">
                                <option value="Selecione">Selecione</option>
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
                            <input type="text" name="anoInicio" id="anoInicio" class="form-control"
                                placeholder="Digite o ano">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="mesInicio">Fim:</label>
                            <select name="mesInicio" id="mesInicio" class="form-control">
                                <option value="Selecione">Selecione</option>
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
                            <input type="text" name="anoInicio" id="anoInicio" class="form-control"
                                placeholder="Digite o ano">
                        </div>
                    </div>

                    <x-campo-component inputType="textarea" inputName="descricao-curso" :placeholder="'Digite a descrição do curso'"
                        value="">
                        <x-slot name="labelSlot">
                            Descrição do curso:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="textarea" inputName="descricao-curso" :placeholder="'Ex: especialidade em nutrição funcional integrativa'"
                        value="">
                        <x-slot name="labelSlot">
                            Especialidades/Informações complementares:
                        </x-slot>
                    </x-campo-component>
                    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
                        Salvar
                    </x-submit-button>
                </form>
            </div>
        </div>
    </div>
</div>
