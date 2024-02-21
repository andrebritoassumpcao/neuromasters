<!-- resources/views/components/card-beneficiario.blade.php -->

<style>
    .card-beneficiario {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 210px;
        width: 190px;
        border: 0ch;
        padding-top: 30px;
        border-radius: 20px;
        background: #D9E5FF;
        margin: 20px;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .card-beneficiario span {
        color: #FFF;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        background: linear-gradient(180deg, rgba(48, 156, 255, 0.00) 0%, rgba(12, 134, 246, 0.80) 70.01%);
        padding: 10px;
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
    <!-- Substitua os placeholders pelos dados reais do beneficiário -->
    <svg width="86" height="85" viewBox="0 0 126 125" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- ... (conteúdo do SVG) ... -->
    </svg>
    <span>{{ $beneficiario->nome_beneficiario }}</span>
</a>
