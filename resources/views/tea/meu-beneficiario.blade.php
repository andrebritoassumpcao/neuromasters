<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\beneficiario-style.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Beneficiario</title>
</head>

<body>
    <x-main.header-app></x-main.header-app>

    <x-back-button backLink="{{ route('beneficiarios.index') }}" />
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
            </div>


        </section>
    </main>

</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputFoto = document.getElementById("input-foto");

        inputFoto.addEventListener("change", function() {
            document.querySelector("form").submit();
        });
    });
</script>
