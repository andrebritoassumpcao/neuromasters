<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-style.css') }}">
    <link rel="stylesheet" href="path/to/sweetalert2.min.css">


    <title>Login</title>
</head>

<body>

    <x-header-login :link="'/'" />

    @include('sweetalert::alert')

    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif

    @error('error')
        <span>{{ $message }}</span>
    @enderror


    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <section class="login-container">
            <div class="left-container">
                <span>Fazer Login</span>

                <x-google-button url="">
                    Entrar com Google
                </x-google-button>
                <div class="ou">
                    <div class="linha"></div>
                    <h2>OU</h2>
                    <div class="linha"></div>
                </div>

                <x-campo-component inputType="text" inputName="email" :placeholder="'Digite seu email'">
                    <x-slot name="labelSlot">
                        Email*:
                    </x-slot>
                </x-campo-component>
                @error('email')
                    <span>${{ $message }}</span>
                @enderror
                <x-campo-component inputType="password" inputName="password" :placeholder="'Digite sua senha'">
                    <x-slot name="labelSlot">
                        Senha*:
                    </x-slot>
                </x-campo-component>
                @error('password')
                    <span>${{ $message }}</span>
                @enderror
                <a id="esqueceu" href="">Esqueceu a senha?</a>
                <x-submit-button url="" style="width: 323px; height: 48px; margin: 20px 0;">
                    Login
                </x-submit-button>
                <p href="">Ainda não tem uma conta? <a id="esqueceu" href="/cadastro">Cadastre-se</a></p>
            </div>
            <div class="right-container">
                <img src="" alt="">
                <h2>Junte-se a nós para promover a saúde mental, acesse nossa plataforma hoje e embarque em uma jornada
                    de
                    apoio e transformação.</h2>

            </div>


        </section>
    </form>
</body>
<footer>
    <x-footer-login>
    </x-footer-login>

</footer>

</html>
