<link rel="stylesheet" href="{{ asset('css/modal/modal.css') }}">
<div class="modal" id="updateModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Atualizar Dados</h2>
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
            <div class="separador">
                <h3>Endereço</h3>
            </div>
            <div class="campo-container">
                <label for="CEP">
                    CEP
                </label>
                <input type="text" value="{{ $user->cep }}" class="item3" name="cep"
                    placeholder="Digite o Cep" id="cep" onblur="pesquisacep(this.value);">
            </div>

            <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputId="rua" inputName="logradouro"
                :placeholder="''" value="{{ $user->rua }}">
                <x-slot name="labelSlot">
                    Rua
                </x-slot>
            </x-teaComponents.campo-formulario>

            <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputId="bairro" inputName="bairro"
                :placeholder="''" value="{{ $user->bairro }}">
                <x-slot name="labelSlot">
                    Bairro
                </x-slot>
            </x-teaComponents.campo-formulario>

            <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputId="uf" inputName="uf"
                :placeholder="''" value="{{ $user->estado }}">
                <x-slot name="labelSlot">
                    Estado
                </x-slot>
            </x-teaComponents.campo-formulario>

            <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputId="cidade"
                inputName="localidade" :placeholder="''" value="{{ $user->cidade }}">
                <x-slot name="labelSlot">
                    Cidade
                </x-slot>
            </x-teaComponents.campo-formulario>
            <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="numero" :placeholder="''"
                inputId="" value="{{ $user->numero }}">
                <x-slot name="labelSlot">
                    Número
                </x-slot>
            </x-teaComponents.campo-formulario>
            <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputName="complemento"
                :placeholder="''" inputId="" value="{{ $user->complemento }}">
                <x-slot name="labelSlot">
                    Complemento
                </x-slot>
            </x-teaComponents.campo-formulario>
        </form>
    </div>
    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
        Salvar
    </x-submit-button>

    <script>
        var modal = document.getElementById('updateModal');

        var btn = document.querySelector('.btn-atualizar-dados');

        var span = document.getElementsByClassName('close')[0];

        btn.onclick = function() {
            modal.style.display = 'block';
        }

        span.onclick = function() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
        document.getElementById('tipoAtendimento').addEventListener('change', function() {
            var atendimento = this.value;
            var enderecoSection = document.getElementById('enderecoSection');
            if (atendimento === 'Presencial' || atendimento === 'Online e Presencial') {
                enderecoSection.style.display = '';
            } else {
                enderecoSection.style.display = 'none';
            }
        });
    </script>
    <script src="{{ asset('js/cep.js') }}"></script>
