<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css\style.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <x-header-component>
        <h1>Header</h1>
    </x-header-component>
    <div class="content">
        <h3>Portal Terapiame</h3>
        <h1>Uma Revolução no tratamento de transtorno de espectro autista</h1>
        <h2>Um método inovador e eficiente para o tratamento do autismo</h2>
        <div class="content-buttons">
            <x-sign-button url="">
                Assine Já
            </x-sign-button>
            <x-sign-button url="">
                Assine Já
            </x-sign-button>
        </div>
    </div>
</body>
<footer>

    <x-footer-component>
        <h1>footer</h1>
    </x-footer-component>
</footer>
</html>

