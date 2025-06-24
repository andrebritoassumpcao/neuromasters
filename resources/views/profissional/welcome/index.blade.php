<link rel="stylesheet" type="text/css" href="{{ asset('css/welcome-profissional/style.css') }}">
<title>Welcome</title>

<x-layouts.app>
    <main class="profissional-main">

        <x-profissionais-components.header-component :tipoUsuario="$tipoUsuario">
            <h1>Header</h1>
        </x-profissionais-components.header-component>

        <div class="content">
            <h4>Portal Terapiame - Profissionais</h4>
            <h2>Profissionais dedicados como você estão transformando vidas.</h2>
            <h3>Entre agora para fazer parte dessa comunidade e oferecer seu apoio especializado a quem mais precisa.
            </h3>
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
    <footer>

        <x-footer-component>
            <h1>footer</h1>
        </x-footer-component>
    </footer>

</x-layouts.app>
