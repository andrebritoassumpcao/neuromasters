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

        .left-container {
            background-color: #EBF1FF;
            border-radius: 8px 0 0 8px;
            height: auto;
            padding-top: 20px;
            min-width: 260px;
        }

        .registro-container {
            display: flex;
            margin: 0;
            flex-direction: row;
            justify-content: flex-start;
            border-radius: 14px;
            background: #FFF;
            height: 100%;

        }


        .right-container {}
    </style>
    <x-main.header-app></x-main.header-app>
    <main>
        <x-menu-lateral>
        </x-menu-lateral>

        <section class="tea-container">
            <div class="registro-container">

                <div class="left-container">

                    <x-back-button backLink="{{ route('beneficiarios.index') }}" />
                    <x-teaComponents.menubenef-component />
                </div>
                <div class="right-container">
                    <form action="{{ route('beneficiarios.register') }}" method="POST">
                        @csrf


                        <x-teaComponents.dadospessoais-component />
                        <x-teaComponents.detalhes-benef-component />
                        <x-teaComponents.responsaveis-benef-component />
                        <x-teaComponents.endereco-benef-component />


                    </form>
                </div>

            </div>
            </div>

        </section>
    </main>

</body>
<script src="{{ asset('js/cep.js') }}"></script>

</html>
