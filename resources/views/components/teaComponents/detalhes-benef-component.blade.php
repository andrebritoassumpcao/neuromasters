<style>
    .item1 {}

    .item2 {
        width: 200px;
    }

    .item3 {
        width: 260px;
    }

    .item4 {
        width: 200px;
    }

    .item5 {
        width: 200px;
    }

    .item6 {
        width: 100%;
        height: 140px;
    }

    .container-detalhes {

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

    textarea {
        border-radius: 8px;
        border: 1px solid #DBDCD6;
        color: #1b1b1b;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        padding: 8px;
        resize: none;
        margin-top: 8px;
    }
</style>
<div class="container-detalhes">



    <div class="uma-col">
        <x-teaComponents.campo-formulario inputClass="item3" inputType="text" inputName="orgao" :placeholder="'Ex: Espectro Autista'"
            inputId="">
            <x-slot name="labelSlot">
                Diagnóstico Principal
            </x-slot>

        </x-teaComponents.campo-formulario>

    </div>
    <div class="uma-col">
        <label for="detalhes">Detalhes do Diagnóstico</label>
        <textarea class="item6" name="detalhes" placeholder="Digite os detalhes do diagnóstico..."></textarea>

    </div>


    <x-register.continue-register-button style="width: 323px; height: 48px; margin: 20px 0;" nextStep="setActive(2)">
        Continuar
    </x-register.continue-register-button>

</div>
