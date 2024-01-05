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
    <x-header-login>
        <h1>Header</h1>
    </x-header-login>
    <section class="registro-container">
        <div class="left-container">
            <x-register.cadastro-menu>
            </x-register.cadastro-menu>
        </div>
        <form method="POST" action="{{ route('register') }}" id="form">
            @csrf
            <div class="right-container">

                <x-register.detalhes-component />

                <x-register.senha-component />

                <x-register.confirma-component />

            </div>
        </form>
    </section>

</body>
<footer>
    <x-footer-login>
    </x-footer-login>

</footer>

</html>
