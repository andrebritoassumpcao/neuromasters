    <link rel="stylesheet" type="text/css" href="{{ asset('css/profissional/style.css') }}">
    <title>Perfil do Profissional</title>
    <style>
        .badge {
            padding: 10px 15px;
            font-size: 14px;
            color: #fff;
        }
    </style>

    <x-layouts.app>

        <header>
            <x-main.header-app></x-main.header-app>
            <x-back-button backLink="{{ route('profissionais') }}" />

        </header>

        <main class="">
            <section class="perfil-content">
                <section id="detalhes">
                    <div class="perfil-prof">
                        <div class="profile-background"></div>
                    </div>
                    <div class="perfil-picture">
                        @if ($profissional->foto)
                            <img src="{{ asset('storage/' . $profissional->foto) }}" alt="Foto do Profissional"
                                class="rounded-circle">
                        @else
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="width: 160px;  height: 160px; font-size:40px;">
                                {{ substr($profissional->name, 0, 1) }}{{ substr(explode(' ', $profissional->name)[1] ?? '', 0, 1) }}
                            </div>
                        @endif
                    </div>

                    <div class="perfil-info">
                        <div class="detalhes-user">
                            <h3 class="text-dark fw-bold">{{ $profissional->name }} </h3>
                            <h4>{{ $profissional->especialidade }}</h4>
                            @if (!empty($profissional->estado))
                                <p>{{ $profissional->cidade }} - {{ $profissional->estado }}</p>
                            @endif
                        </div>
                        <div>
                            @if (!empty($profissional->atendimento))
                                <p>Atendimento: {{ $profissional->atendimento }}</p>
                            @endif
                        </div>
                    </div>
                </section>
            </section>

            <!-- Competências -->
            <section class="perfil-content">
                <div class="container-section">
                    <div class="titulo-container">

                        <h4>Competências</h4>
                    </div>

                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        @if (!empty($profissional->competencias))
                            @foreach ($profissional->competencias as $competencia)
                                <span class="badge bg-primary rounded-pill">{{ $competencia }}</span>
                            @endforeach
                        @else
                            <p>Nenhuma competência cadastrada.</p>
                        @endif
                    </div>

                </div>
            </section>
            </div>
            <section class="perfil-content" id="sobre">
                <div class="container-section">
                    <div class="titulo-container">
                        <h3 class="">Sobre</h3>

                    </div>
                    @if (strlen($profissional->resumo_profissional) > 500)
                        <!-- Texto resumido -->
                        <div id="resumoCurto">
                            <p>{{ substr($profissional->resumo_profissional, 0, 500) }}... </p>
                            <a class="text-primary" href="#" id="verMaisBtn" onclick="verMais()">Ver mais...</a>
                        </div>
                        <div id="resumoCompleto" style="display:none;">
                            <p>{{ $profissional->resumo_profissional }}</p>
                            <a class="text-primary" href="#" id="verMenosBtn" onclick="verMenos()">Ver menos</a>
                        </div>
                    @else
                        <p>{{ $profissional->resumo_profissional }}</p>
                    @endif
                </div>
            </section>
            <!-- Formação Acadêmica -->
            <section class="perfil-content" id="academico">
                <div class="container-section">
                    <div class="titulo-container">
                        <h4>Formação Acadêmica</h4>
                    </div>
                    <div class="d-flex gap-4">
                        @foreach ($formacoes as $formacao)
                            <div class="">
                                <x-profissionais-components.card-perfil-formacao :formacao="$formacao" :user="$profissional" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>

        <x-footer-login></x-footer-login>
    </x-layouts.app>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('verMaisBtn').addEventListener('click', function(event) {
                event.preventDefault();
            });


            document.getElementById('verMenosBtn').addEventListener('click', function(event) {
                event.preventDefault();
                verMenos();
            });
        });

        function verMais() {
            document.getElementById('resumoCurto').style.display = 'none';
            document.getElementById('resumoCompleto').style.display = 'block';

        }

        function verMenos() {
            document.getElementById('resumoCompleto').style.display = 'none';
            document.getElementById('resumoCurto').style.display = 'block';

        }
    </script>
