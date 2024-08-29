<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/registro-style.css') }}">
    <title>Cadastro</title>
</head>

<body>
    @if ($tipoUsuario == 'profissional')
        <x-header-login :link="'/sou-profissional'" />
    @else
        <x-header-login :link="'/'" />
    @endif
    <section class="registro-container">
        <div class="left-container">
            <x-register.cadastro-menu :tipoUsuario="$tipoUsuario">
            </x-register.cadastro-menu>
        </div>

        <form method="POST"
            action="{{ $tipoUsuario == 'profissional' ? route('registerProfissional') : route('register') }}"
            id="form">
            @csrf
            <div class="right-container">

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
</script>
