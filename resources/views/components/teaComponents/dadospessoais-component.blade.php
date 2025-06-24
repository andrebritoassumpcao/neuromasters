<style>
    .container-dadospessoais {}
</style>
<div class="container-dadospessoais">

    <section class="container d-flex flex-column m-5">

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="col-md-12 mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" name="name" id="name"
                placeholder="Digite seu nome completo" value="{{ old('name') }}" required>

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" name="nascimento" id="nascimento"
                    value="{{ old('nascimento') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" name="sexo" id="sexo" required>
                    <option value="">Selecione</option>
                    <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="feminino" {{ old('sexo') == 'feminino' ? 'selected' : '' }}>Feminino</option>
                    <option value="outros" {{ old('sexo') == 'outros' ? 'selected' : '' }}>Outros</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="peso" class="form-label">Peso</label>
                <input type="text" class="form-control " name="peso" id="peso" placeholder="Digite seu peso"
                    value="{{ old('peso') }}">

            </div>
            <div class="col-md-6 mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" class="form-control" name="altura" id="altura" placeholder="Digite sua altura"
                    value="{{ old('altura') }}">

            </div>
        </div>



        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF"
                    value="{{ old('cpf') }}" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" name="celular" id="celular"
                    placeholder="Digite seu celular" value="{{ old('celular') }}" required>

            </div>
        </div>


        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="identidade" class="form-label">Identidade</label>
                <input type="text" class="form-control " name="identidade" id="identidade"
                    placeholder="Digite sua identidade" value="{{ old('identidade') }}" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="emissao" class="form-label">Data de Emissão</label>
                <input type="date" class="form-control " name="emissao" id="emissao" value="{{ old('emissao') }}"
                    required>

            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="orgao" class="form-label">Órgão Emissor</label>
            <input type="text" class="form-control" name="orgao" id="orgao"
                placeholder="Digite o órgão emissor" value="{{ old('orgao') }}" required>

        </div>

        <!-- Botão Continuar -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px;">
                Continuar
            </button>
        </div>
    </section>

</div>
