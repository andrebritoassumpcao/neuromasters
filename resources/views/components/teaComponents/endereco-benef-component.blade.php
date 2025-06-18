<div class="form-section" data-section="3">
    <div class="form-header">
        <h1>Endereço</h1>
        <p>Informações de localização e contato</p>
    </div>

    <div class="form-grid two-cols">
        <div class="form-group">
            <label class="form-label" for="cep">CEP *</label>
            <input type="text" class="form-control" name="cep" id="cep" placeholder="00000-000" required>
            <div class="error-message" id="cep-error">CEP é obrigatório</div>
        </div>

        <div class="form-group">
            <label class="form-label" for="numero">Número *</label>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="123" required>
            <div class="error-message" id="numero-error">Número é obrigatório</div>
        </div>
    </div>

    <div class="form-grid">
        <div class="form-group">
            <label class="form-label" for="rua">Logradouro *</label>
            <input type="text" class="form-control" name="logradouro" id="rua" placeholder="Rua, Avenida, etc."
                required>
            <div class="error-message" id="rua-error">Logradouro é obrigatório</div>
        </div>
    </div>

    <div class="form-grid two-cols">
        <div class="form-group">
            <label class="form-label" for="bairro">Bairro *</label>
            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Nome do bairro"
                required>
            <div class="error-message" id="bairro-error">Bairro é obrigatório</div>
        </div>

        <div class="form-group">
            <label class="form-label" for="cidade">Cidade *</label>
            <input type="text" class="form-control" name="localidade" id="cidade" placeholder="Nome da cidade"
                required>
            <div class="error-message" id="cidade-error">Cidade é obrigatória</div>
        </div>
    </div>

    <div class="form-grid two-cols">
        <div class="form-group">
            <label class="form-label" for="uf">Estado *</label>
            <select class="form-control" name="uf" id="uf" required>
                <option value="">Selecione</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <div class="error-message" id="uf-error">Estado é obrigatório</div>
        </div>

        <div class="form-group">
            <label class="form-label" for="complemento">Complemento</label>
            <input type="text" class="form-control" name="complemento" id="complemento"
                placeholder="Apto, Bloco, etc.">
        </div>
    </div>
</div>

<div class="form-navigation">
    <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">
        <i class="fas fa-arrow-left"></i> Anterior
    </button>

    <div style="flex: 1;"></div>

    <button type="button" class="btn btn-primary" id="nextBtn">
        Próximo <i class="fas fa-arrow-right"></i>
    </button>

    <button type="submit" class="btn btn-primary" id="submitBtn" style="display: none;">
        <i class="fas fa-check"></i> Finalizar Cadastro
    </button>
</div>
