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
        <h3>Dados Profissionais</h3>
        <p>Por favor, seus dados profissionais</p>
    </div>

    <div class="row col-md-8">
        <!-- Campo Conselho Regional -->
        <div class="col-md-4 mb-3">
            <label for="conselhoRegional" class="form-label">Conselho Regional</label>
            <input type="text" class="form-control {{ $errors->has('conselho_regional') ? 'is-invalid' : '' }}"
                name="conselho_regional" id="conselhoRegional" placeholder="Ex: CRP"
                value="{{ old('conselho_regional') }}" required>
            <div class="invalid-feedback">
                @error('conselho_regional')
                    {{ $message }}
                @else
                    O campo Conselho Regional é obrigatório.
                @enderror
            </div>
        </div>

        <!-- Campo Número de Registro -->
        <div class="col-md-8 mb-3">
            <label for="numeroConselho" class="form-label">Número de Registro Profissional</label>
            <input type="text" class="form-control {{ $errors->has('numero_conselho') ? 'is-invalid' : '' }}"
                name="numero_conselho" id="numeroConselho" placeholder="Número de Registro"
                value="{{ old('numero_conselho') }}" required>
            <div class="invalid-feedback">
                @error('numero_conselho')
                    {{ $message }}
                @else
                    O campo Número de Registro é obrigatório.
                @enderror
            </div>
        </div>
    </div>

    <!-- Campo Especialidade -->
    <div class="row col-md-8">
        <div class="col-md-12 mb-3">
            <label for="especialidade" class="form-label">Especialidade</label>
            <select class="form-select {{ $errors->has('especialidade') ? 'is-invalid' : '' }}" name="especialidade"
                id="especialidade" required>
                <option value="">Selecione</option>
                <option value="Médico Pediatra" {{ old('especialidade') == 'Médico Pediatra' ? 'selected' : '' }}>Médico
                    Pediatra</option>
                <option value="Psicólogo" {{ old('especialidade') == 'Psicólogo' ? 'selected' : '' }}>Psicólogo</option>
                <option value="Psiquiatra" {{ old('especialidade') == 'Psiquiatra' ? 'selected' : '' }}>Psiquiatra
                </option>
                <option value="Terapeuta Ocupacional"
                    {{ old('especialidade') == 'Terapeuta Ocupacional' ? 'selected' : '' }}>Terapeuta Ocupacional
                </option>
                <option value="Terapeuta Sensorial"
                    {{ old('especialidade') == 'Terapeuta Sensorial' ? 'selected' : '' }}>
                    Terapeuta Sensorial</option>
                <option value="Nutricionista / Nutrólogo"
                    {{ old('especialidade') == 'Nutricionista / Nutrólogo' ? 'selected' : '' }}>Nutricionista /
                    Nutrólogo
                </option>
            </select>
            <div class="invalid-feedback">
                @error('especialidade')
                    {{ $message }}
                @else
                    O campo Especialidade é obrigatório.
                @enderror
            </div>
        </div>
    </div>

    <!-- Campo Resumo Profissional -->
    <div class="row col-md-8">
        <div class="col-md-12 mb-3">
            <label for="resumoProfissional" class="form-label">Resumo Profissional</label>
            <textarea class="form-control {{ $errors->has('resumo_profissional') ? 'is-invalid' : '' }}" name="resumo_profissional"
                id="resumoProfissional" rows="4" placeholder="Digite um resumo profissional" required>{{ old('resumo_profissional') }}</textarea>
            <div class="invalid-feedback">
                @error('resumo_profissional')
                    {{ $message }}
                @else
                    O campo Resumo Profissional é obrigatório.
                @enderror
            </div>
        </div>
    </div>




    <div class="container-buttons">

        <button id="" type="button" class="btn btn-primary backButton">
            voltar
        </button>
        <button id="continueButtonDadosProfissionais" type="button" class="btn btn-primary">
            Continuar
        </button>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const conselhoRegionalInput = document.getElementById('conselhoRegional');
        const numeroConselhoInput = document.getElementById('numeroConselho');
        const especialidadeSelect = document.getElementById('especialidade');
        const resumoProfissionalTextarea = document.getElementById('resumoProfissional');
        const continueButton = document.getElementById('continueButtonDadosProfissionais');

        continueButton.disabled = true;

        function checkFormCompletion() {
            const notEmpty = conselhoRegionalInput.value.trim() !== '' &&
                numeroConselhoInput.value.trim() !== '' &&
                especialidadeSelect.value.trim() !== '' &&
                resumoProfissionalTextarea.value.trim() !== '';

            const noInvalidClass = !conselhoRegionalInput.classList.contains('is-invalid') &&
                !numeroConselhoInput.classList.contains('is-invalid') &&
                !especialidadeSelect.classList.contains('is-invalid') &&
                !resumoProfissionalTextarea.classList.contains('is-invalid');

            continueButton.disabled = !(notEmpty && noInvalidClass);
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

        // Funções de validação
        function validateText(text) {
            return text.trim() !== '';
        }

        // Validações para cada campo
        conselhoRegionalInput.addEventListener('blur', function() {
            validateInput(conselhoRegionalInput, validateText,
                'O campo Conselho Regional é obrigatório.');
        });

        numeroConselhoInput.addEventListener('blur', function() {
            validateInput(numeroConselhoInput, validateText,
                'O campo Número de Registro é obrigatório.');
        });

        especialidadeSelect.addEventListener('blur', function() {
            validateInput(especialidadeSelect, validateText, 'O campo Especialidade é obrigatório.');
        });

        resumoProfissionalTextarea.addEventListener('blur', function() {
            validateInput(resumoProfissionalTextarea, validateText,
                'O campo Resumo Profissional é obrigatório.');
        });
    });
</script>
