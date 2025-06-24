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
        <h3>Definir Senha</h3>
        <p>A senha deve ter no mnínimo 8 caracteres</p>
    </div>
    <div class="uma-coluna">

    </div>


    <div class="col-md-6 mb-3">
        <label for="validationSenha" class="form-label">Senha</label>
        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
            id="validationSenha" value="{{ old('password') }}" required>
        <div class="invalid-feedback">
            @error('senha')
                {{ $message }}
            @else
                O campo é obrigatório.
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationConfirmarSenha" class="form-label">Confirmar senha</label>
        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
            name="password_confirmation" id="validationConfirmarSenha" value="{{ old('password_confirmation') }}"
            required>
        <div class="invalid-feedback">
            @error('password_confirmation')
                {{ $message }}
            @else
                O campo é obrigatório.
            @enderror
        </div>
    </div>


    <div class="container-buttons">

        @if ($tipoUsuario == 'profissional')
            <button id="backButton" type="button" class="btn btn-primary">
                Voltar
            </button>
        @else
            <button id="" type="button" class="btn btn-primary backButton">
                Voltar
            </button>
        @endif
        <button id="continueButtonSenha" type="button" class="btn btn-primary">
            Continuar
        </button>
    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const senhaInput = document.getElementById('validationSenha');
        const confirmarSenhaInput = document.getElementById('validationConfirmarSenha');
        const continueButtonSenha = document.getElementById('continueButtonSenha');
        continueButtonSenha.disabled = true;

        // Função para validar o campo de senha (mínimo 8 caracteres e campo obrigatório)
        function validateSenha() {
            const senhaValida = senhaInput.value;
            const senhaErrorMsg = senhaInput.nextElementSibling;

            if (senhaValida === '') {
                senhaInput.classList.add('is-invalid');
                senhaErrorMsg.textContent = 'A senha é obrigatória.';
                senhaErrorMsg.style.display = 'block';
                return false;
            } else if (senhaValida.length < 8) {
                senhaInput.classList.add('is-invalid');
                senhaErrorMsg.textContent = 'A senha deve ter pelo menos 8 caracteres.';
                senhaErrorMsg.style.display = 'block';
                return false;
            } else {
                senhaInput.classList.remove('is-invalid');
                senhaErrorMsg.textContent = '';
                senhaErrorMsg.style.display = 'none';
                return true; // Retorna true se a senha estiver válida
            }
        }

        // Função para validar o campo de confirmação de senha (comparação e campo obrigatório)
        function validateConfirmacaoSenha() {
            const senhaValida = senhaInput.value;
            const confirmacaoValida = confirmarSenhaInput.value;
            const confirmacaoErrorMsg = confirmarSenhaInput.nextElementSibling;

            if (confirmacaoValida === '') {
                confirmarSenhaInput.classList.add('is-invalid');
                confirmacaoErrorMsg.textContent = 'A confirmação da senha é obrigatória.';
                confirmacaoErrorMsg.style.display = 'block';
                return false;
            } else if (senhaValida !== confirmacaoValida) {
                confirmarSenhaInput.classList.add('is-invalid');
                confirmacaoErrorMsg.textContent = 'As senhas não correspondem.';
                confirmacaoErrorMsg.style.display = 'block';
                return false;
            } else {
                confirmarSenhaInput.classList.remove('is-invalid');
                confirmacaoErrorMsg.textContent = '';
                confirmacaoErrorMsg.style.display = 'none';
                return true; // Retorna true se as senhas coincidirem
            }
        }

        // Função para verificar se os dois campos estão válidos e habilitar o botão
        function checkBothFields() {
            const isSenhaValid = validateSenha(); // Valida a senha
            const isConfirmacaoValid = validateConfirmacaoSenha(); // Valida a confirmação de senha

            // Habilita o botão apenas se ambos os campos estiverem válidos
            continueButtonSenha.disabled = !(isSenhaValid && isConfirmacaoValid);
        }

        // Eventos 'blur' para validar individualmente cada campo
        senhaInput.addEventListener('blur', function() {
            validateSenha();
        });

        confirmarSenhaInput.addEventListener('blur', function() {
            validateConfirmacaoSenha();
            checkBothFields(); // Verifica se ambos os campos estão válidos
        });


    });
</script>
