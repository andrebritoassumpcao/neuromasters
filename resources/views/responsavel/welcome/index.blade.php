<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome/style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <main class="profissional-main">

        <x-header-component>
            <h1>Header</h1>
        </x-header-component>
        <div class="content">
            <h4>Portal Terapiame</h4>
            <h2>Uma Revolução no tratamento de transtorno de espectro autista</h2>
            <h3>Um método inovador e eficiente para o tratamento do autismo</h3>
            <div class="content-buttons">
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
