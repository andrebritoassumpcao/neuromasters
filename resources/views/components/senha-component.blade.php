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
</style>
<script>
    function validarSenha() {
        // Adicione suas lógicas de validação aqui
        // Certifique-se de definir os valores corretamente nas variáveis $name, $email, $telefone, $senha e $confirmaSenha

        // Exemplo de validação simples (substitua por suas próprias regras):
        var senha = document.getElementById('senha').value;
        var confirmaSenha = document.getElementById('confirmaSenha').value;

        if (senha.length < 8) {
            alert('A senha deve ter pelo menos 8 caracteres.');
            return false;
        }

        if (senha !== confirmaSenha) {
            alert('As senhas não coincidem.');
            return false;
        }

        // Adicione os dados ao formulário e submeta o formulário
        document.getElementById('senha_hidden').value = senha;
        document.getElementById('confirmaSenha_hidden').value = confirmaSenha;

        document.getElementById('form').submit();
    }
</script>

<div class="container-senha">
    <img src="{{ asset('images/senha.svg') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="senha-header">
        <h1>Definir Senha</h1>
        <p>A senha deve ter no mnínimo 8 caracteres</p>
    </div>
    <x-campo-component inputType="password" id="senha" inputName="senha" :placeholder="'Digite sua senha'">
        <x-slot name="labelSlot">
            Senha*:
        </x-slot>
    </x-campo-component>
    <x-campo-component inputType="password" id="confirmaSenha" inputName="confirmaSenha" :placeholder="'Confirme sua senha'">
        <x-slot name="labelSlot">
            Confirmar Senha*:
        </x-slot>
    </x-campo-component>
    <x-sign-button url="{{ route('set_menu_option', ['option' => 2]) }}"
        style="width: 323px; height: 38px; margin: 20px 0;" onclick="validarSenha()">

        Continuar
    </x-sign-button>
</div>
