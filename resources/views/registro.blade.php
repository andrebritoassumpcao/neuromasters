
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
                <x-cadastro-menu>
                </x-cadastro-menu>
         </div>
         <div class="right-container">
            @if($activeMenu === 0)
                <x-detalhes-component />
            @elseif($activeMenu === 1)
                <x-senha-component />
            @elseif($activeMenu === 2)
                <x-confirma-component />
            @endif
        </div>
    </section>

</body>
<footer>
    <x-footer-login>
    </x-footer-login>

    </footer>
</html>


