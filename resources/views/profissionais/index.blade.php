<link rel="stylesheet" type="text/css" href="{{ asset('css/profissionais/style.css') }}">
<title>Profissionais</title>

<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .competencia {
        padding: 5px 10px;
        color: #fff;
    }

    .competencia.bg-primary {
        background-color: #007bff;

    }
</style>

<x-layouts.app>

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
            <h1>Encontre o profissional ideal para você</h1>
            <form action="{{ route('profissionais') }}#filtros" method="GET" id="filtros"
                class="profissionais filtros d-flex flex-row justify-content-evenly align-items-end gap-4">


                <div class="col-md-3 ">
                    <label for="name" class="form-label">Procure pelo nome</label>
                    <input type="text" class="form-control" name="name">

                </div>

                <div class="d-grid col-3 mx-auto">
                    <label for="profissao" class="form-label">Procure pela profissão</label>

                    <select class=" form-select  " aria-label="Default select example" name="profissao">
                        <option selected>Selecione</option>
                        <option value="Psicólogo">Psicólogo</option>
                        <option value="Psiquiatra">Psiquiatra</option>
                        <option value="erapeuta Ocupacional">Terapeuta Ocupacional</option>
                    </select>
                </div>
                <div class="d-grid col-3 mx-auto">
                    <label for="profissao" class="form-label">Procure pela competência</label>

                    <select class=" form-select  " aria-label="Default select example" name="competencia">
                        <option selected>Selecione</option>
                        <option value="Casais">Casais</option>
                        <option value="Autoestima">Autoestima</option>
                        <option value="Adolescência">Adolescência</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
            </form>



            <div class="cards-profissionais col mt-4">
                @foreach ($profissionais as $profissional)
                    <div class="row-md-6">
                        <div class="card shadow-sm p-3 mb-4 bg-white rounded-4">
                            <a href="{{ route('profissionalVerPerfil.index', $profissional->id) }}">
                                <div class="card-body d-flex align-items-start">

                                    @if ($profissional->foto && Storage::exists('public/' . $profissional->foto))
                                        <img src="{{ asset('storage/' . $profissional->foto) }}"
                                            alt="Foto do Profissional" class="rounded-circle"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                            style="width: 80px; height: 80px; font-size: 24px;">
                                            {{ substr($profissional->name, 0, 1) }}{{ substr(explode(' ', $profissional->name)[1] ?? '', 0, 1) }}
                                        </div>
                                    @endif

                                    <div class="ms-3">
                                        <h5 class="card-title">{{ $profissional->name }}</h5>

                                        @if ($profissional->especialidade)
                                            <p class="card-text">{{ $profissional->especialidade }}</p>
                                        @endif

                                        @if ($profissional->cidade && $profissional->estado)
                                            <p class="card-text">{{ $profissional->cidade }} -
                                                {{ $profissional->estado }}</p>
                                        @endif

                                        @if ($profissional->atendimento)
                                            <p class="card-text"><strong>Atendimento:</strong>
                                                {{ $profissional->atendimento }}</p>
                                        @endif

                                        @if ($profissional->competencias)
                                            <div class="competencia d-flex flex-wrap gap-2 mt-2">
                                                @foreach ($profissional->competencias as $competencia)
                                                    <span
                                                        class="competencia bg-primary rounded-pill">{{ $competencia }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>



        </section>
    </main>
    <footer>
        <x-footer-login>
        </x-footer-login>

    </footer>
</x-layouts.app>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('filtros');
        form.addEventListener('submit', function() {
            sessionStorage.setItem('scrollPosition', window.scrollY);
        });

        var scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            sessionStorage.removeItem('scrollPosition');
        }
    });
</script>
