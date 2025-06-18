<link rel="stylesheet" type="text/css" href="{{ asset('css/tea/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/tea/cadastro-beneficiario.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<title>Cadastro de Beneficiário - Neuromasters TEA</title>

<x-layouts.app>
    <x-main.header-app></x-main.header-app>
    <div class="container-pai">

        <x-menu-lateral></x-menu-lateral>
        <div class="page-layout">
            <main class="main-container">
                <div class="sidebar-form">
                    <div class="sidebar-content">
                        <h2>Cadastro de Beneficiário</h2>
                        <p>Preencha as informações do beneficiário seguindo as etapas abaixo.</p>

                        <div class="progress-bar">
                            <div class="progress-fill" id="progressFill"></div>
                        </div>

                        <ul class="stepper">
                            <li class="step active" data-step="0">
                                <div class="step-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Dados Pessoais</h3>
                                    <p>Informações básicas do beneficiário</p>
                                </div>
                            </li>

                            <li class="step" data-step="1">
                                <div class="step-icon">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Detalhes Médicos</h3>
                                    <p>Diagnóstico e informações clínicas</p>
                                </div>
                            </li>

                            <li class="step" data-step="2">
                                <div class="step-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Responsáveis</h3>
                                    <p>Dados dos pais ou responsáveis</p>
                                </div>
                            </li>

                            <li class="step" data-step="3">
                                <div class="step-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="step-content">
                                    <h3>Endereço</h3>
                                    <p>Localização e contato</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="main-content">
                    <form id="beneficiarioForm" action="{{ route('beneficiarios.register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="form-section active" data-section="0">
                            <div class="form-header">
                                <h1>Dados Pessoais</h1>
                                <p>Preencha as informações básicas do beneficiário</p>
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nome Completo *</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Digite o nome completo" value="{{ old('name') }}" required>
                                    <div class="error-message" id="name-error">Nome é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid two-cols">
                                <div class="form-group">
                                    <label class="form-label" for="nascimento">Data de Nascimento *</label>
                                    <input type="date" class="form-control" name="nascimento" id="nascimento"
                                        value="{{ old('nascimento') }}" required>
                                    <div class="error-message" id="nascimento-error">Data de nascimento é obrigatória
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="sexo">Sexo *</label>
                                    <select class="form-control" name="sexo" id="sexo" required>
                                        <option value="">Selecione</option>
                                        <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>
                                            Masculino</option>
                                        <option value="feminino" {{ old('sexo') == 'feminino' ? 'selected' : '' }}>
                                            Feminino
                                        </option>
                                        <option value="outros" {{ old('sexo') == 'outros' ? 'selected' : '' }}>Outros
                                        </option>
                                    </select>
                                    <div class="error-message" id="sexo-error">Sexo é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid two-cols">
                                <div class="form-group">
                                    <label class="form-label" for="peso">Peso de nascimento(kg)</label>
                                    <input type="text" class="form-control" name="peso" id="peso"
                                        placeholder="0.00" value="{{ old('peso') }}" maxlength="6"
                                        onfocus="if(this.value==='')this.value='0.0';"
                                        onkeypress="return formatPeso(this, ',', '.', event)">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="altura">Altura de nascimento (cm)</label>
                                    <input type="number" class="form-control" name="altura" id="altura"
                                        placeholder="Ex: 175" min="30" max="250" inputmode="numeric"
                                        pattern="[0-9]*" value="{{ old('altura') }}">
                                </div>
                            </div>

                        </div>

                        <div class="form-section" data-section="1">
                            <div class="form-header">
                                <h1>Detalhes Médicos</h1>
                                <p>Informações sobre diagnóstico e condições médicas</p>
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="diagnostico">Diagnóstico Principal *</label>
                                    <input type="text" class="form-control" name="diagnostico" id="diagnostico"
                                        placeholder="Ex: Transtorno do Espectro Autista"
                                        value="{{ old('diagnostico') }}" required>
                                    <div class="error-message" id="diagnostico-error">Diagnóstico é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="diagnostico_detalhes">Detalhes do Diagnóstico
                                        *</label>
                                    <textarea class="form-control" name="diagnostico_detalhes" id="diagnostico_detalhes" rows="4"
                                        placeholder="Descreva detalhes relevantes sobre o diagnóstico..." required>{{ old('diagnostico_detalhes') }}</textarea>
                                    <div class="error-message" id="diagnostico_detalhes-error">Detalhes do diagnóstico
                                        são
                                        obrigatórios</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Responsáveis -->
                        <div class="form-section" data-section="2">
                            <div class="form-header">
                                <h1>Dados dos Responsáveis</h1>
                                <p>Informações dos pais ou responsáveis legais</p>
                            </div>

                            <h3 style="color: #667eea; margin-bottom: 1rem;">👩 Dados da Mãe</h3>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="nome_mae">Nome Completo da Mãe *</label>
                                    <input type="text" class="form-control" name="nome_mae" id="nome_mae"
                                        placeholder="Digite o nome completo da mãe" value="{{ old('nome_mae') }}"
                                        required>
                                    <div class="error-message" id="nome_mae-error">Nome da mãe é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid two-cols">
                                <div class="form-group">
                                    <label class="form-label" for="cpf_mae">CPF da Mãe *</label>
                                    <input type="text" class="form-control" name="cpf_mae" id="cpf_mae"
                                        placeholder="000.000.000-00" value="{{ old('cpf_mae') }}" required>
                                    <div class="error-message" id="cpf_mae-error">CPF da mãe é obrigatório</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="profissao_mae">Profissão da Mãe *</label>
                                    <input type="text" class="form-control" name="profissao_mae"
                                        id="profissao_mae" placeholder="Digite a profissão"
                                        value="{{ old('profissao_mae') }}" required>
                                    <div class="error-message" id="profissao_mae-error">Profissão da mãe é obrigatória
                                    </div>
                                </div>
                            </div>

                            <h3 style="color: #667eea; margin: 2rem 0 1rem 0;">👨 Dados do Pai</h3>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="nome_pai">Nome Completo do Pai *</label>
                                    <input type="text" class="form-control" name="nome_pai" id="nome_pai"
                                        placeholder="Digite o nome completo do pai" value="{{ old('nome_pai') }}"
                                        required>
                                    <div class="error-message" id="nome_pai-error">Nome do pai é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid two-cols">
                                <div class="form-group">
                                    <label class="form-label" for="cpf_pai">CPF do Pai *</label>
                                    <input type="text" class="form-control" name="cpf_pai" id="cpf_pai"
                                        placeholder="000.000.000-00" value="{{ old('cpf_pai') }}" required>
                                    <div class="error-message" id="cpf_pai-error">CPF do pai é obrigatório</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="profissao_pai">Profissão do Pai *</label>
                                    <input type="text" class="form-control" name="profissao_pai"
                                        id="profissao_pai" placeholder="Digite a profissão"
                                        value="{{ old('profissao_pai') }}" required>
                                    <div class="error-message" id="profissao_pai-error">Profissão do pai é obrigatória
                                    </div>
                                </div>
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="estado_civil_pais">Estado Civil dos Pais *</label>
                                    <select class="form-control" name="estado_civil_pais" id="estado_civil_pais"
                                        required>
                                        <option value="">Selecione</option>
                                        <option value="casados"
                                            {{ old('estado_civil_pais') == 'casados' ? 'selected' : '' }}>Casados
                                        </option>
                                        <option value="divorciados"
                                            {{ old('estado_civil_pais') == 'divorciados' ? 'selected' : '' }}>
                                            Divorciados
                                        </option>
                                        <option value="separados"
                                            {{ old('estado_civil_pais') == 'separados' ? 'selected' : '' }}>Separados
                                        </option>
                                        <option value="solteiros"
                                            {{ old('estado_civil_pais') == 'solteiros' ? 'selected' : '' }}>Solteiros
                                        </option>
                                        <option value="viuvo"
                                            {{ old('estado_civil_pais') == 'viuvo' ? 'selected' : '' }}>Viúvo(a)
                                        </option>
                                    </select>
                                    <div class="error-message" id="estado_civil_pais-error">Estado civil é obrigatório
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section" data-section="3">
                            <div class="form-header">
                                <h1>Endereço</h1>
                                <p>Informações de localização e contato</p>
                            </div>

                            <div class="form-grid two-cols">
                                <div class="form-group">
                                    <label class="form-label" for="cep">CEP *</label>
                                    <input type="text" class="form-control" name="cep" id="cep"
                                        placeholder="00000-000" required>
                                    <div class="error-message" id="cep-error">CEP é obrigatório</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="numero">Número *</label>
                                    <input type="text" class="form-control" name="numero" id="numero"
                                        placeholder="123" required>
                                    <div class="error-message" id="numero-error">Número é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label" for="rua">Logradouro *</label>
                                    <input type="text" class="form-control" name="logradouro" id="rua"
                                        placeholder="Rua, Avenida, etc." required>
                                    <div class="error-message" id="rua-error">Logradouro é obrigatório</div>
                                </div>
                            </div>

                            <div class="form-grid two-cols">
                                <div class="form-group">
                                    <label class="form-label" for="bairro">Bairro *</label>
                                    <input type="text" class="form-control" name="bairro" id="bairro"
                                        placeholder="Nome do bairro" required>
                                    <div class="error-message" id="bairro-error">Bairro é obrigatório</div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="cidade">Cidade *</label>
                                    <input type="text" class="form-control" name="localidade" id="cidade"
                                        placeholder="Nome da cidade" required>
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
                    </form>
                </div>
            </main>
        </div>
    </div>


</x-layouts.app>
<script src="{{ asset('js/cep.js') }}"></script>
<script>
    function formatPeso(a, e, r, t) {
        let n = "",
            h = j = 0,
            u = tamanho2 = 0,
            l = ajd2 = "",
            o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++);
        for (l = ""; h < u; h++) - 1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n, 0 == (u = l.length) && (a.value = ""), 1 == u && (a.value = "0" + r + "0" + l), 2 == u && (a
                .value = "0" + r + l), u > 2) {
            for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                    j = 0),
                ajd2 += l.charAt(h),
                j++;
            for (a.value = "",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }
    class BeneficiarioForm {
        constructor() {
            this.currentStep = 0;
            this.totalSteps = 4;
            this.init();
        }

        init() {
            this.setupEventListeners();
            this.setupMasks();
            this.updateUI();
        }

        setupEventListeners() {
            document.getElementById('nextBtn').addEventListener('click', () => this.nextStep());
            document.getElementById('prevBtn').addEventListener('click', () => this.prevStep());

            document.querySelectorAll('.step').forEach((step, index) => {
                step.addEventListener('click', () => this.goToStep(index));
            });

            document.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('blur', () => this.validateField(input));
                input.addEventListener('input', () => this.clearError(input));
            });

            document.getElementById('cep').addEventListener('blur', (e) => {
                this.lookupCEP(e.target.value);
            });
        }


        setupMasks() {
            this.addMask('#cpf, #cpf_mae, #cpf_pai', '000.000.000-00');

            this.addMask('#celular', '(00) 00000-0000');

            this.addMask('#cep', '00000-000');
        }

        addMask(selector, pattern) {
            document.querySelectorAll(selector).forEach(input => {
                input.addEventListener('input', (e) => {
                    let value = e.target.value.replace(/\D/g, '');
                    let masked = '';
                    let patternIndex = 0;

                    for (let i = 0; i < pattern.length && patternIndex < value.length; i++) {
                        if (pattern[i] === '0') {
                            masked += value[patternIndex];
                            patternIndex++;
                        } else {
                            masked += pattern[i];
                        }
                    }

                    e.target.value = masked;
                });
            });
        }

        nextStep() {
            if (this.validateCurrentStep()) {
                if (this.currentStep < this.totalSteps - 1) {
                    this.currentStep++;
                    this.updateUI();
                }
            }
        }

        prevStep() {
            if (this.currentStep > 0) {
                this.currentStep--;
                this.updateUI();
            }
        }

        goToStep(step) {
            // Only allow going to completed steps or next step
            if (step <= this.currentStep || step === this.currentStep + 1) {
                if (step > this.currentStep && !this.validateCurrentStep()) {
                    return;
                }
                this.currentStep = step;
                this.updateUI();
            }
        }

        updateUI() {
            // Update sections
            document.querySelectorAll('.form-section').forEach((section, index) => {
                section.classList.toggle('active', index === this.currentStep);
            });

            // Update stepper
            document.querySelectorAll('.step').forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index === this.currentStep) {
                    step.classList.add('active');
                } else if (index < this.currentStep) {
                    step.classList.add('completed');
                    step.querySelector('.step-icon').innerHTML = '<i class="fas fa-check"></i>';
                } else {
                    // Reset icon for future steps
                    const icons = ['fas fa-user', 'fas fa-clipboard-list', 'fas fa-users',
                        'fas fa-map-marker-alt'
                    ];
                    step.querySelector('.step-icon').innerHTML = `<i class="${icons[index]}"></i>`;
                }
            });

            // Update progress bar
            const progress = ((this.currentStep + 1) / this.totalSteps) * 100;
            document.getElementById('progressFill').style.width = `${progress}%`;

            // Update navigation buttons
            document.getElementById('prevBtn').style.display = this.currentStep === 0 ? 'none' : 'block';
            document.getElementById('nextBtn').style.display = this.currentStep === this.totalSteps - 1 ? 'none' :
                'block';
            document.getElementById('submitBtn').style.display = this.currentStep === this.totalSteps - 1 ?
                'block' : 'none';
        }

        validateCurrentStep() {
            const currentSection = document.querySelector(`.form-section[data-section="${this.currentStep}"]`);
            const requiredFields = currentSection.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!this.validateField(field)) {
                    isValid = false;
                }
            });

            return isValid;
        }

        validateField(field) {
            const value = field.value.trim();
            const fieldName = field.name;
            let isValid = true;
            let errorMessage = '';

            // Required validation
            if (field.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'Este campo é obrigatório';
            }

            // Specific validations
            if (value && fieldName === 'email') {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    isValid = false;
                    errorMessage = 'Email inválido';
                }
            }

            if (value && (fieldName === 'cpf' || fieldName === 'cpf_mae' || fieldName === 'cpf_pai')) {
                if (!this.validateCPF(value)) {
                    isValid = false;
                    errorMessage = 'CPF inválido';
                }
            }

            // Show/hide error
            const errorElement = document.getElementById(`${fieldName}-error`);
            if (errorElement) {
                errorElement.textContent = errorMessage;
                errorElement.classList.toggle('show', !isValid);
            }

            field.classList.toggle('error', !isValid);

            return isValid;
        }

        clearError(field) {
            const errorElement = document.getElementById(`${field.name}-error`);
            if (errorElement) {
                errorElement.classList.remove('show');
            }
            field.classList.remove('error');
        }

        validateCPF(cpf) {
            cpf = cpf.replace(/\D/g, '');
            if (cpf.length !== 11) return false;

            // Check for repeated digits
            if (/^(\d)\1{10}$/.test(cpf)) return false;

            // Validate check digits
            let sum = 0;
            for (let i = 0; i < 9; i++) {
                sum += parseInt(cpf[i]) * (10 - i);
            }
            let digit1 = 11 - (sum % 11);
            if (digit1 > 9) digit1 = 0;

            sum = 0;
            for (let i = 0; i < 10; i++) {
                sum += parseInt(cpf[i]) * (11 - i);
            }
            let digit2 = 11 - (sum % 11);
            if (digit2 > 9) digit2 = 0;

            return digit1 === parseInt(cpf[9]) && digit2 === parseInt(cpf[10]);
        }

        async lookupCEP(cep) {
            cep = cep.replace(/\D/g, '');
            if (cep.length === 8) {
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const data = await response.json();

                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('uf').value = data.uf;
                    }
                } catch (error) {
                    console.error('Erro ao buscar CEP:', error);
                }
            }
        }
    }

    // Initialize form when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new BeneficiarioForm();
    });
</script>
