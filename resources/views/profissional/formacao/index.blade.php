<link rel="stylesheet" type="text/css" href="{{ asset('css/profissional/style.css') }}">
<title>Neuromasters TEA</title>
<style>
    #meu-painel span {
        color: #6D25B9;
    }

    #meu-painel svg circle,
    #meu-painel svg path {
        stroke: #6D25B9;
    }
</style>

<x-layouts.app>

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

</x-layouts.app>
