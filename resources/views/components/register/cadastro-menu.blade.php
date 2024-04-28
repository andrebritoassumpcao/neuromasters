<style>
    .container {
        display: flex;
        gap: 12px;
        padding: 8px 40px;
        cursor: pointer;
        margin: 45px 0;
        min-width: 25vw;
    }

    .container h1 {
        font-size: 22px;
        font-style: normal;
        font-weight: 600;
        line-height: 26.4px;
        /* 120% */
    }

    .container p {
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 26.4px;
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
        gap: 8px;
        align-items: flex-start;
    }

    .container-text button {
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtém a opção ativa da sessão e converte para número
        var activeMenuOption = parseInt("{{ session('active_menu', 0) }}");

        var tipoUsuario = "{{ $tipoUsuario }}";
        if (tipoUsuario === 'profissional') {
            activeMenuOption += 1;
        }

        setActive(activeMenuOption);
    });

    function setActive(index) {
        var containers = document.querySelectorAll('.container');

        containers.forEach(function(container, i) {
            if (i === index) {
                container.classList.add('active');
                container.classList.remove('inactive');
            } else {
                container.classList.remove('active');
                container.classList.add('inactive');
            }
        });


        if (index === 0) {
            if (tipoUsuario === 'profissional') {
                document.querySelector('.container-detalhes').style.display = 'flex';
                document.querySelector('.container-profissionais').style.display = 'none';
                document.querySelector('.container-senha').style.display = 'none';
                document.querySelector('.container-confirma').style.display = 'none';
            } else {
                document.querySelector('.container-detalhes').style.display = 'flex';
                document.querySelector('.container-senha').style.display = 'none';
                document.querySelector('.container-confirma').style.display = 'none';
            }
        } else if (index === 1) {
            if (tipoUsuario === 'profissional') {
                document.querySelector('.container-detalhes').style.display = 'none';
                document.querySelector('.container-profissionais').style.display = 'flex';
                document.querySelector('.container-senha').style.display = 'none';
                document.querySelector('.container-confirma').style.display = 'none';
            } else {
                document.querySelector('.container-detalhes').style.display = 'none';
                document.querySelector('.container-senha').style.display = 'flex';
                document.querySelector('.container-confirma').style.display = 'none';
            }
        } else if (index === 2) {
            if (tipoUsuario === 'profissional') {
                document.querySelector('.container-detalhes').style.display = 'none';
                document.querySelector('.container-profissionais').style.display = 'none';
                document.querySelector('.container-senha').style.display = 'flex';
                document.querySelector('.container-confirma').style.display = 'none';
            } else {
                document.querySelector('.container-detalhes').style.display = 'none';
                document.querySelector('.container-senha').style.display = 'none';
                document.querySelector('.container-confirma').style.display = 'flex';
            }
        } else if (index === 3 && tipoUsuario === 'profissional') {
            document.querySelector('.container-detalhes').style.display = 'none';
            document.querySelector('.container-profissionais').style.display = 'none';
            document.querySelector('.container-senha').style.display = 'none';
            document.querySelector('.container-confirma').style.display = 'flex';
        }
    }
</script>

<div class="container active" onclick="setActive(0)">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button onclick="setActive(0)">
            <h1>Seus Detalhes</h1>
            <p>Por favor, insira aqui seu nome e email</p>
        </button>
    </div>
</div>

@if ($tipoUsuario == 'profissional')
    <div class="container inactive" onclick="setActive(1)">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
            class="svg-inactive">
            <path
                d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
                stroke="#194AF1" stroke-width="1.5" />
            <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
        <div class="container-text">
            <button onclick="setActive(1)">
                <h1>Dados Profissionais</h1>
                <p>Insira aqui seus dados profissionais</p>
            </button>
        </div>
    </div>
@endif

<div class="container inactive" onclick="setActive({{ $tipoUsuario == 'profissional' ? 2 : 1 }})">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button onclick="setActive({{ $tipoUsuario == 'profissional' ? 2 : 1 }})">
            <h1>Definir Senha</h1>
            <p>A senha deve ter no mínimo 8 caracteres.</p>
        </button>
    </div>
</div>

<div class="container inactive" onclick="setActive({{ $tipoUsuario == 'profissional' ? 3 : 2 }})">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 27" fill="none"
        class="svg-inactive">
        <path
            d="M13 25.5C19.6274 25.5 25 20.1274 25 13.5C25 6.87258 19.6274 1.5 13 1.5C6.37258 1.5 1 6.87258 1 13.5C1 20.1274 6.37258 25.5 13 25.5Z"
            stroke="#194AF1" stroke-width="1.5" />
        <path d="M8.80005 14.1L11.2 16.5L17.2 10.5" stroke="#194AF1" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <div class="container-text">
        <button onclick="setActive({{ $tipoUsuario == 'profissional' ? 3 : 2 }})">
            <h1>Confirmar Cadastro</h1>
            <p>Insira o código que enviamos por email.</p>
        </button>
    </div>
</div>
