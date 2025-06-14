<style>
    .container-endereco {
        width: 50vw;

    }
</style>

<div class="container-endereco">
    <section class=" container d-flex flex-column  m-5">

        <!-- Campo CEP -->
        <div class="col-md-8 mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" placeholder="Digite o CEP"
                onblur="pesquisacep(this.value);">
        </div>

        <!-- Campo Rua -->
        <div class="col-md-12 mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" class="form-control" name="logradouro" id="rua" placeholder="Digite a rua">
        </div>

        <!-- Campos Bairro e Estado -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Digite o bairro">
            </div>
            <div class="col-md-6 mb-3">
                <label for="uf" class="form-label">Estado</label>
                <input type="text" class="form-control" name="uf" id="uf" placeholder="Digite o estado">
            </div>
        </div>

        <!-- Campos Cidade e Número -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" name="localidade" id="cidade"
                    placeholder="Digite a cidade">
            </div>
            <div class="col-md-6 mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" name="numero" id="numero" placeholder="Digite o número">
            </div>
        </div>

        <!-- Campo Complemento -->
        <div class="col-md-12 mb-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" name="complemento" id="complemento"
                placeholder="Digite o complemento">
        </div>

        <!-- Botão Finalizar Cadastro -->
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px;">
                Finalizar Cadastro
            </button>
        </div>
    </section>
</div>
