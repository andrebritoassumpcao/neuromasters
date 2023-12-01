<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\home-style.css') }}">
    <title>Neuromasters</title>
</head>

<body>
    <x-header-app></x-header-app>
    <section class="main-container">
        <div class="banner-1">
            <x-sign-button url="tea-app" style="width: 180px;  margin: 20px 20px;">
                Nossos Produtos
            </x-sign-button>
        </div>
        <x-main-product></x-main-product>
    </section>
    <x-footer-component></x-footer-component>
</body>

</html>
