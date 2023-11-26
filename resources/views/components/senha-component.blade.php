<style>
    .container-senha {
        min-width: 55vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin: 40px auto;

    }



    .senha-header {
        text-align: center;
    }

    .senha-header h1 {
        margin: 8px auto;
        font-size: 34px;
    }

    .container-buttons {
        display: flex;
        gap: 20px;

    }
</style>
<div class="container-senha">
    <img src="{{ asset('images/senha.svg') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="senha-header">
        <h1>Definir Senha</h1>
        <p>A senha deve ter no mnínimo 8 caracteres</p>
    </div>
    <x-campo-component inputType="password" inputName="password" :placeholder="'Digite sua senha'">
        <x-slot name="labelSlot">
            Senha*:
        </x-slot>
    </x-campo-component>
    <x-campo-component inputType="password" inputName="confirmaSenha" :placeholder="'Confirme sua senha'">
        <x-slot name="labelSlot">
            Confirmar Senha*:
        </x-slot>
    </x-campo-component>
    <div class="container-buttons">

        <x-back-register-button style="width: 180px; height: 48px; margin: 20px 0;" previousStep="setActive(0)">
            Voltar
        </x-back-register-button>
        <x-continue-register-button style="width: 180px; height: 48px; margin: 20px 0;" nextStep="validarSenha()">
            Continuar
        </x-continue-register-button>
    </div>
</div>

<script>
    function validarSenha() {

        var senha = document.getElementsByName('password')[0].value;
        var confirmaSenha = document.getElementsByName('confirmaSenha')[0].value;


        if (senha !== confirmaSenha) {
            alert('As senhas não coincidem. Por favor, digite novamente.');
            return;
        }


        setActive(2);
    }
</script>
