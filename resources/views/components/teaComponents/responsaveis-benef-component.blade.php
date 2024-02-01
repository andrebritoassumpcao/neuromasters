<style>
    .container-responsaveis {

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin: 40px 40px;
        width: 600px;
    }
</style>
<div class="container-responsaveis">

    <div class="uma-col">
        <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputName="nome_mae" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Nome da Mãe
            </x-slot>

        </x-teaComponents.campo-formulario>

    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="cpf_mae" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                CPF
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="profissao_mae"
            :placeholder="''" inputId="">
            <x-slot name="labelSlot">
                Profissão
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="uma-col">
        <x-teaComponents.campo-formulario inputClass="item1" inputType="text" inputName="nome_pai" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                Nome do Pai
            </x-slot>

        </x-teaComponents.campo-formulario>

    </div>
    <div class="duas-col">
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="cpf_pai" :placeholder="''"
            inputId="">
            <x-slot name="labelSlot">
                CPF
            </x-slot>
        </x-teaComponents.campo-formulario>
        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="profissao_pai"
            :placeholder="''" inputId="">
            <x-slot name="labelSlot">
                Profissão
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>
    <div class="duas-col">

        <x-teaComponents.campo-formulario inputClass="item2" inputType="text" inputName="estado_civil_pais"
            :placeholder="''" inputId="">
            <x-slot name="labelSlot">
                Estado civil dos pais
            </x-slot>
        </x-teaComponents.campo-formulario>
    </div>

    <x-register.continue-register-button style="width: 323px; height: 48px; margin: 20px 0;" nextStep="setActive(3)">
        Continuar
    </x-register.continue-register-button>

</div>
