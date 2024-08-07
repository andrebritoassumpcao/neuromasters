<style>
    .item1 {}

    .item2 {
        width: 200px;
    }

    .item3 {
        width: 200px;
    }

    .item4 {
        width: 200px;
    }

    .item5 {
        width: 200px;
    }

    .container-dadospessoais {

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin: 40px 40px;
        width: 600px;
    }

    .duas-col {
        display: flex;
        gap: 20px;
        width: 500px;
        justify-content: space-between;
    }

    .uma-col {
        width: 500px;
    }
</style>
@php
    $optionsSexo = [
        ['value' => '', 'text' => 'Selecione'],
        ['value' => 'masculino', 'text' => 'Masculino'],
        ['value' => 'feminino', 'text' => 'Feminino'],
        ['value' => 'outros', 'text' => 'Outros'],
    ];
@endphp
<div class="container-dadospessoais">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">



    <div class="uma-col">
        <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputName="name" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Nome Completo*:
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>

    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="date" inputName="nascimento" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Data de nascimento*:
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.select-component inputClass="item2" inputName="sexo" :placeholder="'Selecione'" inputId="sexo"
            :options="$optionsSexo">
            <x-slot name="labelSlot">
                Sexo*:
            </x-slot>

        </x-teaComponents.select-component>
    </div>


    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="peso" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Peso
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="altura" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Altura
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="cpf" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                CPF*:
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="celular" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Celular*:
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="identidade" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Identidade*:
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.campo-formulario inputClass="item2" inputType="date" inputName="emissao" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Data de emissão*:
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="orgao" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Orgão emissor*:
            </x-slot>
        </x-teaComponents.campo-formulario>

    </div>
    <x-register.continue-register-button style="width: 323px; height: 48px; margin: 20px 0;" nextStep="setActive(1)">
        Continuar
    </x-register.continue-register-button>

</div>
