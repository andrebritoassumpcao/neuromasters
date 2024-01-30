<style>
    .container-detalhes {
        min-width: 55vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin: 40px auto;

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

    .detalhe-header {
        text-align: center;
    }

    .detalhe-header h1 {
        margin: 8px auto;
        font-size: 34px;
    }
</style>
<div class="container-detalhes">
    <img src="{{ asset('images/detalhes.svg') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="detalhe-header">
        <h1>Seus Detalhes</h1>
        <p>Por favor, insira aqui seu nome, email e telefone</p>
    </div>
    <x-google-button url="">
        Entrar com o Google
    </x-google-button>
    <div class="ou">
        <div class="linha"></div>
        <h2>OU</h2>
        <div class="linha"></div>
    </div>
    <x-campo-component inputType="text" inputName="name" :placeholder="'Digite seu nome completo'">
        <x-slot name="labelSlot">
            Nome Completo*:
        </x-slot>
    </x-campo-component>

    <x-campo-component inputType="text" inputName="email" :placeholder="'Digite seu email'">
        <x-slot name="labelSlot">
            Email*:
        </x-slot>
    </x-campo-component>
    <x-campo-component inputType="text" inputName="telefone" :placeholder="'Digite seu número de telefone'">
        <x-slot name="labelSlot">
            Telefone*:
        </x-slot>
    </x-campo-component>

    <x-register.continue-register-button style="width: 323px; height: 48px; margin: 20px 0;" nextStep="setActive(2)">
        Continuar
    </x-register.continue-register-button>

</div>
