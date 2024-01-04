<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\tea-style.css') }}">
    <title>Neuromasters TEA</title>
</head>



<body>
    <style>
        #beneficiarios span {
            color: #6D25B9;
        }

        #beneficiarios svg circle,
        #beneficiarios svg path {
            stroke: #6D25B9;
        }
    </style>
    <x-header-app></x-header-app>
    <main>
        <x-menu-lateral>
        </x-menu-lateral>
        <section class="container">
            <h2>Meus Beneficiários</h2>
            <div class="beneficiarios-content">
                <x-card-create-beneficiario />
            </div>

        </section>
    </main>

</body>

</html>
