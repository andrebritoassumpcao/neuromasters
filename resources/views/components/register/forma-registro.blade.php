<style>
    .container-forma {
        min-width: 55vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        margin: 16px auto;
        height: auto;

    }

    .ou {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-top: 20px;
    }

    .linha {

        width: 152px;
        height: 2px;
        background: #DBDCD6;
        margin: 0 auto;

    }

    .detalhe-header {
        text-align: center;
    }

    .detalhe-header h1 {
        margin: 8px auto;
    }

    .entrar-button {
        display: inline-flex;
        color: #000;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 31.68px;
        /* 144% */
        padding: 12px 45px;
        align-items: center;
        gap: 12px;
        border-radius: 8px;
        border: 1px solid var(--gray, #DBDCD6);
        margin-top: 20px;
        width: 300px;

    }

    .entrar-button:hover {
        background-color: #eaebe7
    }

    @media (max-width: 1200px) {
        .container-forma {
            min-width: 55vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin: 12px auto;
            height: auto;
        }

        .detalhe-header h1 {
            margin: 8px auto;
            font-size: 24px;
        }

    }
</style>
<div class="container-forma">
    <img src="{{ asset('images/icon-user.png') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="detalhe-header">
        <h3>Criar nova conta</h3>
        <p>Ja tem uma conta? <a href="#">Entre aqui</a></p>
    </div>

    <button type="button" class="entrar-button">
        <img src="{{ asset('images/google logo.svg') }}" alt="">
        Entrar com o Google
    </button>


    <button class="entrar-button" type="button" onclick="setActive(1)">
        <img src="{{ asset('images/img email.png') }}" alt="">
        Entrar com Email
    </button>


</div>
