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

<!-- x-detalhes-component.blade.php -->

<script>
    function validarDetalhes() {
        var nome = document.getElementById('nome').value;
        var email = document.getElementById('email').value;
        var telefone = document.getElementById('telefone').value;

        if (nome !== '' && email !== '' && telefone !== '') {
            // Adicione os dados ao formulário e submeta o formulário
            document.getElementById('nome_hidden').value = nome;
            document.getElementById('email_hidden').value = email;
            document.getElementById('telefone_hidden').value = telefone;

            document.getElementById('form').submit();
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    }
</script>

<!-- Restante do componente como está -->


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
    <x-campo-component inputType="text" inputName="name" id="nome" :placeholder="'Digite seu nome completo'">
        <x-slot name="labelSlot">
            Nome Completo*:
        </x-slot>
    </x-campo-component>

    <x-campo-component inputType="text" inputName="email" id="email" :placeholder="'Digite seu email'">
        <x-slot name="labelSlot">
            Email*:
        </x-slot>
    </x-campo-component>

    <x-campo-component inputType="text" inputName="telefone" id="telefone" :placeholder="'Digite seu número de telefone'">
        <x-slot name="labelSlot">
            Telefone*:
        </x-slot>
    </x-campo-component>

    <x-sign-button url="{{ route('set_menu_option', ['option' => 1]) }}"
        style="width: 323px; height: 38px; margin: 20px 0;" onclick="validarDetalhes()">
        Continuar
    </x-sign-button>
</div>
