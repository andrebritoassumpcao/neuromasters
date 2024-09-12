<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profissional/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Profissionais</title>
</head>

<body>
    <header>
        <x-main.header-app></x-main.header-app>
    </header>
    <main>
        <section class="intro d-flex flex-row align-items-center justify-content-between p-3 m-0">
            <div class="texto">
                <h1>Conheça nossos <span class="palavra-destaque">Profissionais</span></h1>
                <h5>Encontre os melhores profissionais de saúde aqui. Filtre por tema ou por profissão e entre em
                    contato
                    diretamente com eles.</h5>
            </div>
            <div class="imagens p-2">
                <img src="{{ asset('images/Imagem profisisonais.png') }}" alt="">
            </div>
        </section>
        <section class="profissionais d-flex flex-column align-items-center">
            <h1>Encontre o Profissional ideal para você</h1>
            <div class="filtros d-flex flex-row justify-content-evenly align-items-end gap-4">
                <x-campo-component inputType="select" inputName="profissao" id="profissao" required :options="[
                    ['value' => 'Selecione', 'label' => 'Selecione'],
                    ['value' => 'Presencial', 'label' => 'Presencial'],
                    ['value' => 'Online e Presencial', 'label' => 'Online e Presencial'],
                ]"
                    class="max-col">
                    <x-slot name="labelSlot">
                        Procure por Profissão
                    </x-slot>
                </x-campo-component>
                <x-campo-component inputType="select" inputName="assunto" id="assunto" required :options="[
                    ['value' => 'Selecione', 'label' => 'Selecione'],
                    ['value' => 'Presencial', 'label' => 'Presencial'],
                    ['value' => 'Online e Presencial', 'label' => 'Online e Presencial'],
                ]"
                    class="max-col">
                    <x-slot name="labelSlot">
                        Procure por Assunto
                    </x-slot>
                </x-campo-component>
                <x-submit-button url="" class="" style="height:40px">
                    Pesquisar
                </x-submit-button>
            </div>
            <div class="cards-profissionais"></div>

        </section>
    </main>
</body>
<footer>
    <x-footer-login>
    </x-footer-login>

</footer>
