<style>
    .container-detalhes {
        min-width: 55vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        margin: 16px auto;
        height: auto;

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

    .btn-disabled {
        background-color: #ccc;
        cursor: not-allowed;
        border-color: #ccc;
    }

    @media (max-width: 1200px) {
        .container-detalhes {
            min-width: 55vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin: 12px auto;
            height: auto;
        }

        .detalhe-header h1 {
            margin: 8px auto;
            font-size: 24px;
        }

    }
</style>
<div class="container-detalhes">
    <img src="{{ asset('images/detalhes.svg') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="detalhe-header">
        <h3>Seus Detalhes</h3>
        <p>Por favor, insira aqui seu nome, email e celular</p>
    </div>

    <div class="col-md-6 mb-3">
        <label for="validationName" class="form-label">Nome completo</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} detalhes" name="name"
            id="validationName" value="{{ old('name') }}" required>
        <div class="invalid-feedback">
            @error('name')
                {{ $message }}
            @else
                O campo é obrigatório.
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationEmail" class="form-label">Email</label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} detalhes"
            name="email" id="validationEmail" value="{{ old('email') }}" required>
        <div class="invalid-feedback">
            @error('email')
                {{ $message }}
            @else
                O campo é obrigatório.
            @enderror
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="celular" class="form-label">Número de Celular</label>
        <input type="text" name="celular" onkeydown="return mascaraTelefone(event)" class="form-control detalhes"
            id="validationCelular" placeholder="" maxlength="15" required>
        <div class="invalid-feedback">
            @error('celular')
                {{ $message }}
            @else
                O campo é obrigatório.
            @enderror
        </div>
    </div>



    <div class="container-buttons">
        <button id="" type="button" class="btn btn-primary backButton">
            Voltar
        </button>
        <button id="continueButtonDetalhes" type="button" class="btn btn-primary">
            Continuar
        </button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const continueButton = document.getElementById('continueButtonDetalhes');

        const inputName = document.getElementById('validationName');
        const inputEmail = document.getElementById('validationEmail');
        const inputCelular = document.getElementById('validationCelular');
        continueButton.disabled = true;

        // Valida o campo de nome para aceitar apenas letras, acentos e aspas simples
        function validateName() {
            const namePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ' ]+$/;
            const nameValue = inputName.value.trim();
            const errorMsg = inputName.nextElementSibling;

            if (nameValue === '') {
                inputName.classList.add('is-invalid');
                errorMsg.textContent = 'O campo Nome é obrigatório.';
                errorMsg.style.display = 'block';
                return false;
            }

            if (!namePattern.test(nameValue)) {
                inputName.classList.add('is-invalid');
                errorMsg.textContent = 'O nome deve conter apenas letras e acentos.';
                errorMsg.style.display = 'block';
                return false;
            }

            inputName.classList.remove('is-invalid');
            errorMsg.textContent = '';
            errorMsg.style.display = 'none';
            return true;
        }

        // Valida o campo de e-mail
        function validateEmail() {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailValue = inputEmail.value.trim();
            const errorMsg = inputEmail.nextElementSibling;

            if (emailValue === '') {
                inputEmail.classList.add('is-invalid');
                errorMsg.textContent = 'O campo E-mail é obrigatório.';
                errorMsg.style.display = 'block';
                return false;
            }

            if (!emailPattern.test(emailValue)) {
                inputEmail.classList.add('is-invalid');
                errorMsg.textContent = 'Por favor, insira um e-mail válido.';
                errorMsg.style.display = 'block';
                return false;
            }

            inputEmail.classList.remove('is-invalid');
            errorMsg.textContent = '';
            errorMsg.style.display = 'none';
            return true;
        }

        function validateCelular() {
            const celularValue = inputCelular.value.trim();
            const errorMsg = inputCelular.nextElementSibling;

            if (celularValue === '') {
                inputCelular.classList.add('is-invalid');
                errorMsg.textContent = 'O campo Celular é obrigatório.';
                errorMsg.style.display = 'block';
                return false;
            }

            if (celularValue.length < 14) {
                inputCelular.classList.add('is-invalid');
                errorMsg.textContent = 'O número de celular está incorreto.';
                errorMsg.style.display = 'block';
                return false;
            }

            inputCelular.classList.remove('is-invalid');
            errorMsg.textContent = '';
            errorMsg.style.display = 'none';
            return true;
        }


        function checkFormCompletion() {
            const isNameValid = validateName();
            const isEmailValid = validateEmail();
            const isCelularValid = validateCelular();
            console.log((isNameValid && isEmailValid && isCelularValid));
            continueButton.disabled = !(isNameValid && isEmailValid && isCelularValid);
        }


        inputName.addEventListener('blur', function() {
            validateName();

        });
        inputEmail.addEventListener('blur', function() {
            validateEmail();
        });
        inputCelular.addEventListener('blur', function() {
            validateCelular();
            checkFormCompletion();
        });


    });
</script>
