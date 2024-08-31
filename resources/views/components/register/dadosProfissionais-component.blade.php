<style>
    .item5 {
        width: 200px;
    }

    .container-profissionais {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin: 40px 20px;
        min-width: 55vw;
    }

    .container-profissionais {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;

    }

    .duas-colunas {
        display: flex;
        gap: 20px;
        width: 500px;
        justify-content: space-between;
    }

    .uma-coluna {
        width: 500px;
    }

    .ou {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-top: 20px;
    }

    .linha {
        width: 152px;
        height: 2px;
        background: #DBDCD6;
        margin: 0 auto;
    }

    .profissional-header {
        text-align: center;
    }

    .profissional-header h1 {
        margin: 8px auto;
        font-size: 34px;
    }

    .container-buttons {
        display: flex;
        gap: 20px;
        margin: 0 auto;

    }
</style>


<div class="container-profissionais">
    <img src="{{ asset('images/detalhes.svg') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="profissional-header">
        <h1>Dados Profissionais</h1>
        <p>Por favor, seus dados profissionais</p>
    </div>

    <div class="duas-colunas">
        <x-campo-component inputType="text" inputName="conselho_regional" :placeholder="'Ex: CRP'" class="quatro-col">
            <x-slot name="labelSlot">
                Conselho Regional:
            </x-slot>
        </x-campo-component>

        <x-campo-component inputType="text" inputName="numero_conselho" :placeholder="'Número de Registro'" class="oito-col">
            <x-slot name="labelSlot">
                Número de Registro Profissional:
            </x-slot>
        </x-campo-component>
    </div>
    <div class="uma-coluna">
        <x-campo-component inputType="select" inputName="especialidade" required :options="[
            ['value' => '', 'label' => 'Selecione'],
            ['value' => 'Médico Pediatra', 'label' => 'Médico Pediatra'],
            ['value' => 'Psicólogo', 'label' => 'Psicólogo'],
            ['value' => 'Psiquiatra', 'label' => 'Psiquiatra'],
            ['value' => 'Terapeuta Ocupacional', 'label' => 'Terapeuta Ocupacional'],
            ['value' => 'Terapeuta Sensorial', 'label' => 'Terapeuta Sensorial'],
            ['value' => 'Nutricionista / Nutrólogo', 'label' => 'Nutricionista / Nutrólogo'],
        ]">
            <x-slot name="labelSlot">
                Especialidade:
            </x-slot>
        </x-campo-component>

        <x-campo-component inputType="textarea" inputName="resumo_profissional" :placeholder="'Digite um resumo profissional'">
            <x-slot name="labelSlot">
                Resumo Profissional:
            </x-slot>
        </x-campo-component>



    </div>
    <div class="container-buttons">

        <x-register.back-register-button style="width: 180px; height: 48px; margin: 20px 0;"
            previousStep="setActive(0)">
            Voltar
        </x-register.back-register-button>
        <x-register.continue-register-button style="width: 180px; height: 48px; margin: 20px 0;"
            nextStep="setActive(2)">
            Continuar
        </x-register.continue-register-button>
    </div>
</div>
