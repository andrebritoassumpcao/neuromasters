<style>
    .container-endereco {

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin: 40px 40px;
        width: 600px;
    }
</style>

<div class="container-endereco">


    <div class="duas-col">
        <div class="campo-container">
            <label for="CEP">
                CEP
            </label>
            <input type="text" class="item3" name="cep" placeholder="Digite o Cep" id="cep"
                onblur="pesquisacep(this.value);">
        </div>

    </div>

    <div class="uma-col">
        <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputId="rua" inputName="logradouro"
            :placeholder="''">
            <x-slot name="labelSlot">
                Rua
            </x-slot>
        </x-teaComponents.campo-formulario>

    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputId="bairro" inputName="bairro"
            :placeholder="''">
            <x-slot name="labelSlot">
                Bairro
            </x-slot>
        </x-teaComponents.campo-formulario>

        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputId="uf" inputName="uf"
            :placeholder="''">
            <x-slot name="labelSlot">
                Estado
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputId="cidade" inputName="localidade"
            :placeholder="''">
            <x-slot name="labelSlot">
                Cidade
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="numero" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Número
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="uma-col">
        <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputName="complemento" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Complemento
            </x-slot>

        </x-teaComponents.campo-formulario>

    </div>
    <x-submit-button nextStep="" style="width: 240px; height: 48px; margin: 20px 0;">
        Finalizar Cadastro
    </x-submit-button>
</div>
