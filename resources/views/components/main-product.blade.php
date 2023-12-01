<style>
    .main-product-container {
        display: flex;
        flex-direction: column;
        margin: 25px;
        gap: 25px
    }

    .main-product-container img {
        width: 337px;
        height: 298px;
        border-radius: 12px 0 0 12px;

    }

    .main-product {
        display: flex;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.05);

    }

    .main-product div {
        display: flex;
        flex-direction: column;
        margin: 20px 25px;
        gap: 20px;

    }

    .main-product p {
        color: #393938;
        font-family: Inter;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 28.8px;
        max-width: 798px;
        /* 160% */
    }

    .main-product span {
        color: #000;
        font-family: Inter;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 28.8px;
    }
</style>
<div class="main-product-container">
    <h2>Neuromasters - TEA</h2>
    <div class="main-product">
        <img src="{{ asset('images/img-produto-tea.jpg') }}" alt="">
        <div>
            <p>O <span>Terapiame - TEA</span> é uma plataforma com uma abordagem revolucionária para auxiliar crianças
                no espectro
                autista a alcançarem seu potencial máximo de desenvolvimento, através de uma plataforma interativa e
                inovadora.</p>
            <p>O <span>Terapiame - TEA</span> oferece um novo caminho, aliando equipes multidisciplinares de
                profissionais,
                tecnologia e
                um método reconhecido e eficiente no tratamento do espectro autista</p>
            <x-sign-button url="tea-app" style="max-width:180px;">Saiba Mais</x-sign-button>
        </div>
    </div>
</div>
