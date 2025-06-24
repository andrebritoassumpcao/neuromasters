<style>
    .container-responsaveis {
        width: 50vw;
    }
</style>


<div class="container-responsaveis">
    <section class=" container d-flex flex-column  m-5">

        <div class="col-md-12 mb-3">
            <label for="nome_mae" class="form-label">Nome da Mãe</label>
            <input type="text" class="form-control" name="nome_mae" id="nome_mae" placeholder="Digite o nome da mãe"
                value="{{ old('nome_mae') }}" required>

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf_mae" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf_mae" id="cpf_mae" placeholder="Digite o CPF"
                    value="{{ old('cpf_mae') }}" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="profissao_mae" class="form-label">Profissão</label>
                <input type="text" class="form-control" name="profissao_mae" id="profissao_mae"
                    placeholder="Digite a profissão" value="{{ old('profissao_mae') }}" required>
                <div class="invalid-feedback">
                    @error('profissao_mae')
                        {{ $message }}
                    @else
                        O campo Profissão é obrigatório.
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <label for="nome_pai" class="form-label">Nome do Pai</label>
            <input type="text" class="form-control" name="nome_pai" id="nome_pai" placeholder="Digite o nome do pai"
                value="{{ old('nome_pai') }}" required>

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf_pai" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf_pai" id="cpf_pai" placeholder="Digite o CPF"
                    value="{{ old('cpf_pai') }}" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="profissao_pai" class="form-label">Profissão</label>
                <input type="text" class="form-control" name="profissao_pai" id="profissao_pai"
                    placeholder="Digite a profissão" value="{{ old('profissao_pai') }}" required>

            </div>
        </div>

        <!-- Campo Estado Civil dos Pais -->
        <div class="col-md-12 mb-3">
            <label for="estado_civil_pais" class="form-label">Estado Civil dos Pais</label>
            <input type="text" class="form-control" name="estado_civil_pais" id="estado_civil_pais"
                placeholder="Digite o estado civil" value="{{ old('estado_civil_pais') }}" required>

        </div>

        <!-- Botão Continuar -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px;">
                Continuar
            </button>
        </div>

    </section>
</div>
