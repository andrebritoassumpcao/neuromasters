<style>
    .container-detalhes {
        width: 50vw;
    }
</style>
<div class="container-detalhes">
    <section class=" container d-flex flex-column  m-5">
        <div class="col-md-12 mb-3">
            <label for="diagnostico" class="form-label">Diagnóstico Principal</label>
            <input type="text" class="form-control" name="diagnostico" id="diagnostico" placeholder="Ex: Espectro Autista"
                value="{{ old('diagnostico') }}" required>
            <div class="invalid-feedback">
                @error('diagnostico')
                    {{ $message }}
                @else
                    O campo de diagnóstico é obrigatório.
                @enderror
            </div>
        </div>

        <!-- Detalhes do Diagnóstico -->
        <div class="col-md-12 mb-3">
            <label for="diagnostico_detalhes" class="form-label">Detalhes do Diagnóstico</label>
            <textarea class="form-control" name="diagnostico_detalhes" id="diagnostico_detalhes" rows="4"
                placeholder="Digite os detalhes do diagnóstico..." required>{{ old('diagnostico_detalhes') }}</textarea>
            <div class="invalid-feedback">
                @error('diagnostico_detalhes')
                    {{ $message }}
                @else
                    O campo de detalhes do diagnóstico é obrigatório.
                @enderror
            </div>
        </div>

        <!-- Botão Continuar -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px;">
                Continuar
            </button>
        </div>
    </section>
</div>
