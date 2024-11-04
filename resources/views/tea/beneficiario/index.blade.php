<link rel="stylesheet" type="text/css" href="{{ asset('css/beneficiario/style.css') }}">
<title>Meu Beneficiario</title>

<x-layouts.app>
    <x-main.header-app></x-main.header-app>

    <main>
        <x-menu-lateral>
        </x-menu-lateral>
        <section class="beneficiario-content">
            <x-back-button backLink="{{ route('beneficiarios.index') }}" />
            <div class="perfil-beneficiario">
                <form action="{{ route('beneficiarios.upload', ['id_beneficiario' => $beneficiario->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="input-foto" class="label-foto" title="Editar Imagem"
                        style="background-image:  url('{{ asset('storage/images/fotos/' . $beneficiario->id . '.png') }}?v={{ time() }}');">
                        <input type="file" name="foto" accept="image/*" id="input-foto">

                        @if (!$beneficiario->foto || Storage::missing('public/' . $beneficiario->foto))
                            <div class="profile-initials">
                                {{ $beneficiario->nameInitials }}
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
                <div class="info-beneficiario">
                    <h2>
                        <h2>{{ $beneficiario->nome_beneficiario }}</h2>
                    </h2>
                    <h3>{{ $idade }} Anos</h3>
                    <h3>{{ $beneficiario->cidade }}, {{ $beneficiario->estado }}</h3>
                </div>
            </div>

            <article class="titulo-container">
                <h2>Informações gerais</h2>
                <span>Diagnóstico Principal: {{ $beneficiario->diagnostico_principal }}</span>
            </article>
            <div class="diagnostico-container">
                <div class="questionario-action">
                    <svg width="153" height="166" viewBox="0 0 153 166" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M82.471 20.75H52.0202C44.9144 20.75 41.3614 20.75 38.6474 22.2578C36.26 23.584 34.319 25.7002 33.1026 28.3031C31.7197 31.2622 31.7197 35.136 31.7197 42.8833V123.117C31.7197 130.864 31.7197 134.738 33.1026 137.697C34.319 140.3 36.26 142.416 38.6474 143.742C41.3614 145.25 44.9144 145.25 52.0202 145.25H63.4392M82.471 20.75L120.534 62.25M82.471 20.75V51.1833C82.471 55.057 82.471 56.9939 83.1624 58.4734C83.7708 59.7749 84.7408 60.833 85.9347 61.4962C87.2917 62.25 89.068 62.25 92.6212 62.25H120.534M120.534 62.25V69.1667M57.0953 117.583H72.9551M57.0953 89.9167H88.8149M57.0953 62.25H63.4392M88.8149 145.25L101.661 142.449C102.781 142.205 103.341 142.082 103.863 141.859C104.327 141.661 104.768 141.404 105.176 141.093C105.636 140.743 106.04 140.303 106.848 139.422L133.222 110.667C136.726 106.847 136.726 100.653 133.222 96.8333C129.718 93.0133 124.038 93.0133 120.534 96.8333L94.1602 125.589C93.352 126.47 92.9485 126.91 92.6275 127.412C92.3427 127.857 92.1067 128.337 91.9253 128.843C91.7204 129.412 91.6081 130.023 91.3841 131.244L88.8149 145.25Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <x-sign-button url="" style="width:190px; font-size:16px;">
                        Preencher Questionário
                    </x-sign-button>
                </div>
                <div class="info-questionario">
                    <h3>Questionário de Apresentação do Paciente</h3>
                    <p>Complete o questionário de apresentação do paciente para garantir que todas as informações
                        essenciais
                        estejam sempre disponíveis para os profissionais de saúde. Isso permitirá um acompanhamento mais
                        eficaz do progresso do tratamento. </p>
                    <span>Juntos, vamos construir um caminho de desenvolvimento e evolução de forma personalizada para o
                        futuro do seu filho.</span>
                </div>

            </div>
        </section>

    </main>

</x-layouts.app>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputFoto = document.getElementById("input-foto");

        inputFoto.addEventListener("change", function() {
            document.querySelector("form").submit();
        });
    });
</script>
