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
        <button id="backButton" type="button" class="btn btn-primary" onclick="setActive(0)">
            voltar
        </button>
        <button id="continueButtonDetalhes" type="button" class="btn btn-primary" onclick="setActive(2)">
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

        function checkFormCompletion() {
            const notEmpty = inputName.checkValidity() && inputEmail.checkValidity() && inputCelular
                .checkValidity();

            const validations = !inputName.classList.contains('is-invalid') &&
                !inputEmail.classList.contains('is-invalid') &&
                !inputCelular.classList.contains('is-invalid');

            const allValid = notEmpty && validations;

            continueButton.disabled = !allValid;
        }

        function validateInput(input, validationFn, errorMessage) {
            const errorMsg = input.nextElementSibling;

            if (!validationFn(input.value)) {
                input.classList.add('is-invalid');
                errorMsg.textContent = errorMessage;
                errorMsg.style.display = 'block';
            } else {
                input.classList.remove('is-invalid');
                errorMsg.textContent = '';
                errorMsg.style.display = 'none';
            }

            checkFormCompletion();
        }

        inputName.addEventListener('blur', function() {
            validateInput(inputName, value => value.trim() !== '', 'O campo Nome é obrigatório.');
        });

        inputEmail.addEventListener('blur', function() {
            validateInput(inputEmail, validateEmail, 'Por favor, insira um e-mail válido.');
        });

        inputCelular.addEventListener('blur', function() {
            validateInput(inputCelular, validateCelular,
                'O número de celular está incorreto.');
        });


        function validateEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }


        function validateCelular(celular) {

            return celular.length >= 14;
        }
    });
</script>
