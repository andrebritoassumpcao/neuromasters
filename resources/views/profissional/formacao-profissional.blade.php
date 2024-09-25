<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profissionail/perfil.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Neuromasters TEA</title>
</head>
<style>
    #meu-painel span {
        color: #6D25B9;
    }

    #meu-painel svg circle,
    #meu-painel svg path {
        stroke: #6D25B9;
    }
</style>

<body>

    <x-header-pro-app></x-header-pro-app>
    <main class="mx-5">
        <div class="d-flex justify-content-between m-4">
            <div class="d-flex justify-content-around align-items-center gap-3">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-5 my-auto">
                    <img src="{{ asset('images/back.svg') }}" alt="Back">
                </a>
                <h2 class="m-0">Formação acadêmica</h2>
            </div>
            <a class="btn-atualizar-dados" href="#" data-bs-toggle="modal" data-bs-target="#academicModal">
                <img src="../images/icon-create.svg" alt="" style="width: 35px; height: 35px;">
            </a>
        </div>
        {{-- @dd($formacoes) --}}
        @foreach ($formacoes as $formacao)
            <div>
                <x-profissionais-components.card-detalhes-formacao :formacao="$formacao" :user="$user" />
            </div>
        @endforeach

        @include('../components/modals/update-academic-modal')
    </main>

    <x-footer-login>
    </x-footer-login>
    @include('../components/modals/academic-modal')

</body>

</html>
