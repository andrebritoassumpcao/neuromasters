    <link rel="stylesheet" type="text/css" href="{{ asset('css/register/style.css') }}">
    <script src="{{ asset('js/mascaras.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Cadastro</title>

    <x-layouts.app>

        @if ($tipoUsuario == 'profissional')
            <x-header-login :link="'/sou-profissional'" />
        @else
            <x-header-login :link="'/'" />
        @endif
        <section class="registro-container">
            @if (Session::has('alert.config'))
                <script>
                    Swal.fire({!! Session::get('alert.config') !!});
                </script>
            @endif

            <div class="left-container">
                <x-register.cadastro-menu :tipoUsuario="$tipoUsuario">
                </x-register.cadastro-menu>
            </div>

            <form method="POST"
                action="{{ $tipoUsuario == 'profissional' ? route('registerProfissional') : route('register') }}"
                id="form" class="needs-validation" novalidate>
                @csrf
                <div class="right-container">

                    <x-register.forma-registro />

                    <x-register.detalhes-component />

                    @if ($tipoUsuario == 'profissional')
                        <x-register.dadosProfissionais-component />
                    @endif

                    <x-register.senha-component :tipoUsuario="$tipoUsuario" />

                    <x-register.confirma-component :tipoUsuario="$tipoUsuario" />


                </div>
            </form>
        </section>

        </body>
        <footer>
            <x-footer-login>
            </x-footer-login>

        </footer>

        </html>

        <script>
            var tipoUsuario = "{{ $tipoUsuario }}";

            window.onload = function() {
                if (tipoUsuario === 'profissional') {
                    var leftContainer = document.querySelector('.left-container');
                    leftContainer.style.backgroundColor = '#DCD6FF';
                }
            };

            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')


                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    </x-layouts.app>
