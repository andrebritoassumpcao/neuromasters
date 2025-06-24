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

    .badge {
        padding: 10px 15px;
        font-size: 14px;
        color: #fff;
    }
</style>

<x-layouts.app>

    <x-header-pro-app></x-header-pro-app>
    <main>
        <section class="perfil-content">
            <section id="detalhes">
                <div class="perfil-prof">
                    <div class="profile-background"></div>
                </div>

                <form action="{{ route('profissionalPerfil.upload', ['id_profissional' => $user->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="input-foto" class="label-foto" title="Editar Imagem"
                        style="background-image:  url('{{ asset('storage/images/fotos/' . $user->id . '.png') }}?v={{ time() }}');">
                        <input type="file" name="foto" accept="image/*" id="input-foto">

                        @if (!$user->foto || Storage::missing('public/' . $user->foto))
                            <div class="profile-initials">
                                {{ $user->nameInitials }}
                            </div>
                        @endif

                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#f2f2f2">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 21C12 20.4477 12.4477 20 13 20H21C21.5523 20 22 20.4477 22 21C22 21.5523 21.5523 22 21 22H13C12.4477 22 12 21.5523 12 21Z"
                                    fill="#ededed"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.7736 8.09994C22.3834 6.48381 22.315 4.36152 21.113 3.06183C20.5268 2.4281 19.6926 2.0233 18.7477 2.00098C17.7993 1.97858 16.8167 2.34127 15.91 3.09985C15.8868 3.11925 15.8645 3.13969 15.8432 3.16111L2.87446 16.1816C2.31443 16.7438 2 17.5051 2 18.2987V19.9922C2 21.0937 2.89197 22 4.00383 22H5.68265C6.48037 22 7.24524 21.6823 7.80819 21.1171L20.7736 8.09994ZM17.2071 5.79295C16.8166 5.40243 16.1834 5.40243 15.7929 5.79295C15.4024 6.18348 15.4024 6.81664 15.7929 7.20717L16.7929 8.20717C17.1834 8.59769 17.8166 8.59769 18.2071 8.20717C18.5976 7.81664 18.5976 7.18348 18.2071 6.79295L17.2071 5.79295Z"
                                    fill="#ededed"></path>
                            </g>
                        </svg>

                    </label>
                </form>
                <div class="perfil-info">
                    <div class="detalhes-user">
                        <h3 class="text-dark fw-bold">{{ $user->name }}</h3>
                        <h4>{{ $user->especialidade }}</h4>
                        @if ($user->estado)
                            <h4>{{ $user->cidade }} - {{ $user->estado }}</h5>
                        @endif
                    </div>
                    <div class="outros-user">
                        <a class="btn-atualizar-dados btn-detalhes" href="#" data-bs-toggle="modal"
                            data-bs-target="#updateModal">
                            <img src="../images/icon-edit.svg" alt="">
                        </a>

                        <h4>Atendimento: {{ $user->atendimento }}</h4>
                    </div>
                </div>

            </section>

        </section>
        <section class="perfil-content" id="competencias">
            <div class="container-section">
                <div class="titulo-container">
                    <h3 class="fw-bold">Competências</h3>
                    <a class="btn-atualizar-dados" href="#" data-bs-toggle="modal"
                        data-bs-target="#competenciasModal">
                        <img src="../images/icon-edit.svg" alt="">
                    </a>
                    @include('../components/modals/update-competencias')
                </div>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    @if (!empty($user->competencias))
                        @foreach ($user->competencias as $competencia)
                            <span class="badge bg-primary rounded-pill">{{ $competencia }}</span>
                        @endforeach
                    @else
                        <p>Nenhuma competência cadastrada.</p>
                    @endif
                </div>
            </div>
        </section>
        <section class="perfil-content" id="sobre">
            <div class="container-section">
                <div class="titulo-container">
                    <h3 class="fw-bold">Sobre</h3 class="fw-bold">
                    <a class="btn-atualizar-dados" href="#" data-bs-toggle="modal" data-bs-target="#sobreModal">
                        <img src="../images/icon-edit.svg" alt="">
                    </a>
                    @include('../components/modals/sobre-modal')
                </div>
                @if (strlen($user->resumo_profissional) > 500)
                    <!-- Texto resumido -->
                    <div id="resumoCurto">
                        <p>{{ substr($user->resumo_profissional, 0, 500) }}... </p>
                        <a class="text-primary" href="#" id="verMaisBtn" onclick="verMais()">Ver mais...</a>
                    </div>
                    <div id="resumoCompleto" style="display:none;">
                        <p>{{ $user->resumo_profissional }}</p>
                        <a class="text-primary" href="#" id="verMenosBtn" onclick="verMenos()">Ver menos</a>
                    </div>
                @else
                    <p>{{ $user->resumo_profissional }}</p>
                @endif
            </div>
        </section>
        <section class="perfil-content" id="academico">
            <div class="container-section">
                <div class="titulo-container">
                    <h3 class="fw-bold">Formação academica</h3 class="fw-bold">
                    <div class="d-flex align-items-center gap-3">
                        <a class="btn-atualizar-dados" href="#" data-bs-toggle="modal"
                            data-bs-target="#academicModal">
                            <img src="../images/icon-create.svg" alt="" style="width: 24px; height: 24px;">
                        </a>
                        <a class="btn-atualizar-dados"
                            href="{{ route('profissionalPerfil.showFormacoes', ['id_profissional' => $user->id]) }}">
                            <img src="../images/icon-edit.svg" alt="">
                        </a>
                        @include('../components/modals/academic-modal')


                    </div>
                </div>
                <div class="d-flex gap-4">
                    @foreach ($formacoes as $formacao)
                        <div class="">
                            <x-profissionais-components.card-perfil-formacao :formacao="$formacao" :user="$user" />
                        </div>
                    @endforeach
                </div>
            </div>
            </div>

        </section>



    </main>
    <x-footer-login>
    </x-footer-login>
</x-layouts.app>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputFoto = document.getElementById("input-foto");

        inputFoto.addEventListener("change", function() {
            document.querySelector("form").submit();
        });
    });

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

@include('../components/modals/update-component')
