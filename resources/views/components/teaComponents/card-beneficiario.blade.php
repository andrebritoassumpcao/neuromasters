<!-- resources/views/components/card-beneficiario.blade.php -->

<style>
    .card-beneficiario {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 240px;
        width: 190px;
        border: 0ch;

        border-radius: 20px;
        background: #D9E5FF;
        margin: 20px;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
        overflow: hidden;
        /* Adicionado para garantir que as iniciais não ultrapassem a borda do card */
    }

    .card-beneficiario img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Garante que a imagem de perfil seja coberta e ajustada dentro do contêiner */
        border-radius: 20px 20px 0 0;
        /* Ajusta a borda apenas no topo */
    }

    .card-beneficiario .profile-initials {
        line-height: 85px;
        text-align: center;
        width: 100%;
        padding-top: 30px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #F6F5F5;
        font-size: 54px;
        font-weight: 400;
        background-color: #0C359E;
    }

    .card-beneficiario span {
        color: #FFF;
        font-size: 16px;
        font-style: normal;
        width: 190px;
        font-weight: 500;
        line-height: normal;
        background: linear-gradient(180deg, rgba(48, 156, 255, 0.00) 0%, rgba(12, 134, 246, 0.80) 70.01%);
        padding: 15px 0;
        backdrop-filter: blur(20px);
        border-radius: 0 0 20px 20px;
        transition: background 0.3s ease-in-out;
        text-align: center;
    }

    .card-beneficiario:hover {
        transform: scale(1.1);
    }

    .card-beneficiario:hover span {
        background: linear-gradient(180deg, rgba(48, 156, 255, 0.00) 0%, rgba(12, 134, 246, 0.50) 70.01%);
    }

    .card-beneficiario:hover svg {
        fill: #0C86F6;
        transition: fill 0.3s ease-in-out;
    }

    .card-beneficiario:hover .path-cruz {
        fill: #ffffff;
        transition: fill 0.3s ease-in-out;
    }
</style>

<a class="card-beneficiario" href="{{ route('beneficiarios.mostrar', ['id_beneficiario' => $beneficiario->id]) }}">
    @if ($beneficiario->foto)
        <!-- Se houver uma foto, exibir a foto -->
        <img src="{{ asset('storage/' . $beneficiario->foto) }}" alt="{{ $beneficiario->nome_beneficiario }}">
    @else
        <!-- Se não houver foto, exibir as iniciais do nome -->
        <div class="profile-initials">
            {{ $beneficiario->nameInitials }}
        </div>
    @endif
    <span>{{ $beneficiario->nome_beneficiario }}</span>
</a>
