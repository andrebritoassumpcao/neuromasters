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
        <label for="validationConfirmarSenha" class="form-label">Senha</label>
        <input type="password" class="form-control {{ $errors->has('confirmaSenha') ? 'is-invalid' : '' }}"
            name="confirmaSenha" id="validationConfirmarSenha" value="{{ old('confirmaSenha') }}" required>
        <div class="invalid-feedback">
            @error('senha')
                {{ $message }}
            @else
                O campo é obrigatório.
            @enderror
        </div>
    </div>


    <div class="container-buttons">

        @if ($tipoUsuario == 'profissional')
            <button id="backButton" type="button" class="btn btn-primary" onclick="setActive(2)">
                voltar
            </button>
        @else
            <button id="backButton" type="button" class="btn btn-primary" onclick="setActive(1)">
                voltar
            </button>
        @endif
        <button id="continueButtonSenha" type="button" class="btn btn-primary" onclick="irProximo()">
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

        // Verifica a validade dos campos e habilita o botão
        function checkSenhaValidity() {
            const senhaValida = senhaInput.value;
            const confirmacaoValida = confirmarSenhaInput.value;


            console.log("entrou");

        }




        senhaInput.addEventListener('blur', function() {
            checkSenhaValidity(value => value.trim() !== '',
                'O campo Nome é obrigatório.');
        });
        confirmarSenhaInput.addEventListener('blur', function() {
            checkSenhaValidity(value => value.trim() !== '',
                'O campo Nome é obrigatório.');
        });
    });


    function irProximo() {
        if (tipoUsuario === 'profissional') {
            setActive(4);
        } else {
            setActive(3);
        }
    }
</script>
