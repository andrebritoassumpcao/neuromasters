<style>
    .container {
        display: flex;
        gap: 12px;
        padding: 8px 40px;
        cursor: pointer;
        margin: 25px 0;
        min-width: 25vw;
    }

    .container h1 {
        font-size: 19px;
        font-style: normal;
        font-weight: 600;
        line-height: 20.4px;
        text-align: left;

        /* 120% */
    }

    .container p {
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: 16.4px;
        text-align: left;

        /* 120% */
    }

    .active .container-text h1 {
        color: #000000;
        /* Cor do texto ativo */
    }

    .active .container-text p {
        color: #525456;
        /* Cor do texto ativo */
    }

    .active .svg-active path {
        stroke: #194AF1;
        /* Cor do SVG ativo */
    }

    .inactive .container-text button {
        color: #AAAAAA;
        /* Cor do texto inativo */
    }

    .inactive .svg-inactive path {
        stroke: #AAAAAA;
        /* Cor do SVG inativo */
    }

    .container-text {
        display: flex;
        flex-direction: column;
        gap: 4px;
        align-items: flex-start;
        text-align: left;
    }

    .container-text button {
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }

    @media (max-width: 1200px) {
        .container {
            gap: 4px;
            /* Reduzindo o gap para telas menores */
            padding: 6px 20px;
            /* Reduzindo o padding */
            margin: 30px 0;
            /* Reduzindo a margem */
            min-width: 25vw;
            /* Ajustando a largura mínima para ocupar mais espaço em telas menores */
        }

        .container h1 {
            font-size: 2px;
            /* Reduzindo o tamanho da fonte do h1 */
            line-height: 21.6px;
            /* Ajustando o line-height */
        }

        .container p {
            font-size: 12px;
            line-height: 16.6px;
            text-align: left;
        }

        .container-text {
            gap: 3px;
            /* Reduzindo o gap entre os elementos de texto */
            text-align: left;
            /* Mantendo o texto alinhado à esquerda */
        }
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        let currentStep = parseInt("{{ session('active_menu', 0) }}");
        let completedSteps = 0;
        let valorSenha = (tipoUsuario === 'profissional') ? 4 : 3;

        setActive(currentStep);

        function setActive(index) {
            currentStep = index;

            let containers = document.querySelectorAll('.container');
            console.log("Step atual: ", currentStep);

            containers.forEach(function(container, i) {
                const button = container.querySelector('button');

                if (i === index) {
                    container.classList.add('active');
                    container.classList.remove('inactive');
                    button.disabled = false;
                } else {
                    container.classList.remove('active');
                    container.classList.add('inactive');
                    button.disabled = (i > completedSteps);
                }
            });

            if (index === 0) {
                if (tipoUsuario === 'profissional') {
                    showStep(['.container-forma'], ['.container-detalhes', '.container-profissionais',
                        '.container-senha', '.container-confirma'
                    ]);
                } else {
                    showStep(['.container-forma'], ['.container-detalhes', '.container-senha',
                        '.container-confirma'
                    ]);
                }
            } else if (index === 1) {
                if (tipoUsuario === 'profissional') {
                    showStep(['.container-detalhes'], ['.container-forma', '.container-profissionais',
                        '.container-senha', '.container-confirma'
                    ]);
                } else {
                    showStep(['.container-detalhes'], ['.container-forma', '.container-senha',
                        '.container-confirma'
                    ]);
                }
            } else if (index === 2) {
                if (tipoUsuario === 'profissional') {
                    showStep(['.container-profissionais'], ['.container-forma', '.container-detalhes',
                        '.container-senha', '.container-confirma'
                    ]);
                } else {
                    showStep(['.container-senha'], ['.container-forma', '.container-detalhes',
                        '.container-confirma'
                    ]);
                }
            } else if (index === 3) {
                if (tipoUsuario === 'profissional') {
                    showStep(['.container-senha'], ['.container-forma', '.container-detalhes',
                        '.container-profissionais', '.container-confirma'
                    ]);
                } else {
                    showStep(['.container-confirma'], ['.container-forma', '.container-detalhes',
                        '.container-senha'
                    ]);
                }
            } else if (index === 4 && tipoUsuario === 'profissional') {
                showStep(['.container-confirma'], ['.container-forma', '.container-detalhes',
                    '.container-profissionais', '.container-senha'
                ]);
            }
        }

        function showStep(showSelectors, hideSelectors) {
            showSelectors.forEach(selector => document.querySelector(selector).style.display = 'flex');
            hideSelectors.forEach(selector => document.querySelector(selector).style.display = 'none');
        }

        function goToNextStep(nextStepIndex) {
            if (nextStepIndex > completedSteps) {
                completedSteps = nextStepIndex; // Atualiza o step completado
            }
            setActive(nextStepIndex);
        }

        function goToPreviousStep(currentStep) {
            console.log("funcinou: ");

            if (currentStep > 0) {
                goToNextStep(currentStep - 1);
                console.log("valor: ", currentStep);

            }
        }

        document.querySelectorAll('.container button').forEach((button, index) => {
            button.addEventListener('click', function() {
                if (index <= completedSteps || index === completedSteps + 1) {
                    goToNextStep(index);
                }
            });
        });

        document.getElementById('entrarButton').addEventListener('click', function() {
            goToNextStep(1);
        });
        document.getElementById('continueButtonDetalhes').addEventListener('click', function() {
            goToNextStep(2);
        });
        document.getElementById('continueButtonSenha').addEventListener('click', function() {
            goToNextStep(valorSenha);
        });
        const continueButtonDadosProfissionais = document.getElementById('continueButtonDadosProfissionais');

        if (continueButtonDadosProfissionais) {
            continueButtonDadosProfissionais.addEventListener('click', function() {
                goToNextStep(3);
            });
        }

        document.querySelectorAll('.backButton').forEach((button) => {
            button.addEventListener('click', function() {
                goToPreviousStep(currentStep);
            });
        });

    });
</script>

<div class="container active">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button>
            <h1>Cadastrar</h1>
            <p>Por favor, selecione como quer entrar</p>
        </button>
    </div>
</div>
<div class="container active">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button>
            <h1>Seus Detalhes</h1>
            <p>Por favor, insira aqui seu nome e email</p>
        </button>
    </div>
</div>

@if ($tipoUsuario == 'profissional')
    <div class="container inactive">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
            class="svg-inactive">
            <path d=" M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1
        13.5C1 20.1274 6.37258 25.5 13 25.5Z" stroke="#194AF1" stroke-width="1.5" />
            <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <div class="container-text">
            <button>
                <h1>Dados Profissionais</h1>
                <p>Insira aqui seus dados profissionais</p>
            </button>
        </div>
    </div>
@endif

<div class="container inactive">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button>
            <h1>Definir Senha</h1>
            <p>A senha deve ter no mínimo 8 caracteres.</p>
        </button>
    </div>
</div>

<div class="container inactive">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button>
            <h1>Confirmar Cadastro</h1>
            <p>Insira o código que enviamos por email.</p>
        </button>
    </div>
</div>
