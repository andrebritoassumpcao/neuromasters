<link rel="stylesheet" type="text/css" href="{{ asset('css/welcome/style.css') }}">
<title>Welcome</title>
<x-layouts.app>

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
    <footer>

        <x-footer-component>
            <h1>footer</h1>
        </x-footer-component>
    </footer>

</x-layouts.app>
