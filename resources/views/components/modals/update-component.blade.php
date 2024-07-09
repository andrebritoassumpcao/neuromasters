<div class="modal" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Atualizar Dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-6">
                <form action="{{ route('profissionalPerfil.update', ['id_profissional' => $user->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <x-campo-component inputType="text" inputName="name" value="{{ $user->name }}" :placeholder="'Digite seu email'"
                        class="max-col">
                        <x-slot name="labelSlot">
                            Nome:
                        </x-slot>
                    </x-campo-component>
                    <x-campo-component inputType="select" inputName="atendimento" id="tipoAtendimento" required
                        :options="[
                            !$user->atendimento
                                ? ['value' => '', 'label' => 'Selecione']
                                : ['value' => $user->atendimento, 'label' => $user->atendimento],
                            ['value' => 'Online', 'label' => 'Online'],
                            ['value' => 'Presencial', 'label' => 'Presencial'],
                            ['value' => 'Online e Presencial', 'label' => 'Online e Presencial'],
                        ]" class="max-col">
                        <x-slot name="labelSlot">
                            Tipo de Atendimento
                        </x-slot>
                    </x-campo-component>

                    @if (!is_null($user->atendimento) && ($user->atendimento == 'Presencial' || $user->atendimento == 'Online e Presencial'))
                        <div id="enderecoSection">
                        @else
                            <div id="enderecoSection" style="display: none;">
                    @endif
                    <div id="enderecoSection">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button
                                        class="accordion-button collapsed border border-primary-subtle rounded-2 mt-3 p-2 fs-6"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#enderecoCollapse"
                                        aria-expanded="false" aria-controls="enderecoCollapse">
                                        Local do atendimento
                                    </button>
                                </h2>
                                <div id="enderecoCollapse" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="card card-body">
                                        <div class="campo-container">
                                            <label for="CEP">CEP</label>
                                            <input type="text" value="{{ $user->cep }}" class="item3"
                                                name="cep" placeholder="Digite o Cep" id="cep"
                                                onblur="pesquisacep(this.value);">
                                        </div>
                                        <x-teaComponents.campo-formulario inputClass="item1" inputType="text"
                                            inputId="rua" inputName="logradouro" :placeholder="''"
                                            value="{{ $user->rua }}">
                                            <x-slot name="labelSlot">Rua</x-slot>
                                        </x-teaComponents.campo-formulario>
                                        <x-teaComponents.campo-formulario inputClass="item2" inputType="text"
                                            inputId="bairro" inputName="bairro" :placeholder="''"
                                            value="{{ $user->bairro }}">
                                            <x-slot name="labelSlot">Bairro</x-slot>
                                        </x-teaComponents.campo-formulario>
                                        <x-teaComponents.campo-formulario inputClass="item2" inputType="text"
                                            inputId="uf" inputName="uf" :placeholder="''" value="{{ $user->estado }}">
                                            <x-slot name="labelSlot">Estado</x-slot>
                                        </x-teaComponents.campo-formulario>
                                        <x-teaComponents.campo-formulario inputClass="item2" inputType="text"
                                            inputId="cidade" inputName="localidade" :placeholder="''"
                                            value="{{ $user->cidade }}">
                                            <x-slot name="labelSlot">
                                                Cidade
                                            </x-slot>
                                        </x-teaComponents.campo-formulario>
                                        <x-teaComponents.campo-formulario inputClass="item2" inputType="text"
                                            inputName="numero" :placeholder="''" inputId=""
                                            value="{{ $user->numero }}">
                                            <x-slot name="labelSlot">
                                                Número
                                            </x-slot>
                                        </x-teaComponents.campo-formulario>
                                        <x-teaComponents.campo-formulario inputClass="item1" inputType="text"
                                            inputName="complemento" :placeholder="''" inputId=""
                                            value="{{ $user->complemento }}">
                                            <x-slot name="labelSlot">
                                                Complemento
                                            </x-slot>
                                        </x-teaComponents.campo-formulario>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
                        Salvar
                    </x-submit-button>

                </form>

            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('tipoAtendimento').addEventListener('change', function() {
        var atendimento = this.value;
        var enderecoSection = document.getElementById('enderecoSection');
        if (atendimento === 'Presencial' || atendimento === 'Online e Presencial') {
            enderecoSection.style.display = '';
        } else {
            enderecoSection.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var enderecoCollapse = document.getElementById('enderecoCollapse');
        var collapseButton = document.querySelector('[data-bs-toggle="collapse"]');

        collapseButton.addEventListener('click', function() {
            var arrow = this.querySelector('.arrow');
            if (enderecoCollapse.classList.contains('show')) {
                arrow.classList.remove('up');
                arrow.classList.add('down');
            } else {
                arrow.classList.remove('down');
                arrow.classList.add('up');
            }
        });
    });
</script>
<script src="{{ asset('js/cep.js') }}"></script>
