<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css\profissionais\welcome-style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

<body>
    <main class="profissional-main">

        <x-profissionais-components.header-component :tipoUsuario="$tipoUsuario">
            <h1>Header</h1>
        </x-profissionais-components.header-component>

        <div class="content">
            <h3>Portal Terapiame - Profissionais</h3>
            <h1>Profissionais dedicados como você estão transformando vidas.</h1>
            <h2>Entre agora para fazer parte dessa comunidade e oferecer seu apoio especializado a quem mais precisa.
            </h2>
            <div class="content-buttons">
                @if ($tipoUsuario == 'profissional')
                    <p>Você é um profissional</p>
                @else
                    <p>Você é um cliente</p>
                @endif
                <x-sign-button url="" style="">
                    Assine Já
                </x-sign-button>
                <x-sign-button url="" style="">
                    Saiba Mais
                </x-sign-button>
            </div>
        </div>
    </main>
</body>
<footer>

    <x-footer-component>
        <h1>footer</h1>
    </x-footer-component>
</footer>

</html>
