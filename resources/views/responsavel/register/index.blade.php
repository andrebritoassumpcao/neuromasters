<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/mascaras.js') }}"></script>


    <title>Cadastro</title>
</head>

<body class="bg-body-secondary">
    @if ($tipoUsuario == 'profissional')
        <x-header-login :link="'/sou-profissional'" />
    @else
        <x-header-login :link="'/'" />
    @endif
    <section class="registro-container">
        @if (Session::has('alert.config'))
            <script>
                Swal.fire({!! Session::get('alert.config') !!});
            </script>
        @endif

        <div class="left-container">
            <x-register.cadastro-menu :tipoUsuario="$tipoUsuario">
            </x-register.cadastro-menu>
        </div>

        <form method="POST"
            action="{{ $tipoUsuario == 'profissional' ? route('registerProfissional') : route('register') }}"
            id="form" class="needs-validation" novalidate>
            @csrf
            <div class="right-container">

                <x-register.forma-registro />

                <x-register.detalhes-component />

                @if ($tipoUsuario == 'profissional')
                    <x-register.dadosProfissionais-component />
                @endif

                <x-register.senha-component :tipoUsuario="$tipoUsuario" />

                <x-register.confirma-component :tipoUsuario="$tipoUsuario" />


            </div>
        </form>
    </section>

</body>
<footer>
    <x-footer-login>
    </x-footer-login>

</footer>

</html>

<script>
    var tipoUsuario = "{{ $tipoUsuario }}";

    window.onload = function() {
        if (tipoUsuario === 'profissional') {
            var leftContainer = document.querySelector('.left-container');
            leftContainer.style.backgroundColor = '#DCD6FF';
        }
    };

    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')


        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
