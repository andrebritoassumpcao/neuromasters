<style>
    .container-senha {
        min-width: 55vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin: 40px auto;

    }

    .uma-coluna {
        width: 500px;
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
    <div class="uma-coluna">

    </div>
    <x-campo-component inputType="password" inputName="password" :placeholder="'Digite sua senha'" inputId="senha" class="doze-col"
        inputOnBlur="validarSenha()">
        <x-slot name="labelSlot">
            Senha:
        </x-slot>
    </x-campo-component>
    <x-campo-component inputType="password" inputName="confirmaSenha" :placeholder="'Confirme sua senha'" inputId="confirmar-senha"
        class="doze-col" inputOnBlur="validarConfirmacaoSenha()">
        <x-slot name="labelSlot">
            Confirmar Senha:
        </x-slot>
    </x-campo-component>
    <div class="container-buttons">

        @if ($tipoUsuario == 'profissional')
            <x-register.back-register-button style="width: 180px; height: 48px; margin: 20px 0;"
                previousStep="setActive(1)">
                Voltar
            </x-register.back-register-button>
        @else
            <x-register.back-register-button style="width: 180px; height: 48px; margin: 20px 0;"
                previousStep="setActive(0)">
                Voltar
            </x-register.back-register-button>
        @endif
        <x-register.continue-register-button style="width: 180px; height: 48px; margin: 20px 0;" nextStep="irProximo()">
            Continuar
        </x-register.continue-register-button>
    </div>
</div>
</div>

<script>
    function validarSenha() {
        var senha = document.getElementById('senha').value;

        // Verificar se o campo de senha está vazio
        if (senha === '') {
            return true; // Não fazer a validação se o campo estiver vazio
        }

        // Verificar o tamanho da senha
        if (senha.length < 8) {
            alert('A senha deve ter pelo menos 8 caracteres.');
            return false;
        }

        // Verificar a presença de pelo menos um caractere especial
        var caractereEspecial = /[@!#$%^&*()/\\]/;
        if (!caractereEspecial.test(senha)) {
            alert('A senha deve incluir pelo menos um caractere especial.');
            return false;
        }

        return true;
    }

    function validarConfirmacaoSenha() {
        var senha = document.getElementById('senha').value;
        var confirmaSenha = document.getElementById('confirmar-senha').value;

        // Verificar se ambos os campos de senha estão vazios
        if (senha === '' && confirmaSenha === '') {
            return true; // Não fazer a validação se ambos os campos estiverem vazios
        }

        // Verificar se as senhas coincidem
        if (senha !== confirmaSenha) {
            alert('As senhas não são iguais.');
            document.getElementById('confirmar-senha').value = '';
            return false;
        }

        return true;
    }

    function irProximo() {
        if (tipoUsuario === 'profissional') {
            setActive(3);
        } else {
            setActive(2);
        }
    }
</script>
