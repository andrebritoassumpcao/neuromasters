<style>
    h4{
        font-size: 16px;
        font-weight: 5 00;
    }
.footer-container{
    background: #8FB3FF;
    padding: 20px 80px;
    color: #FFFF
}
.linha{

     width: 100%%;
     height: 1px;
     background: #C1C7CD;
     margin: 0 auto;

}
.main-container{
    display: flex;
    width: 100%;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin: 20px 0 20px 0;
}
.secondary-container{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 20px 0 20px 0;
}
.secondary-container div{
    display: flex;
    flex-direction: row;
    gap: 32px;
}
.coluna{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 16px;
    flex: 1 0 0;
}
#coluna4 div{
    display: flex;
    flex-direction: row;
    gap: 16px;

}
button {
    border: none;
    background: none;
    padding: 0;
    margin: 0;
}

</style>
<footer class="footer-container">
    <div class="linha"></div>
    <section class="main-container">
        <div class="coluna" id="coluna1">
            <h4>Coluna um</h4>
            <p>Twenty One</p>
            <p>Twenty One</p>
            <p>Twenty One</p>
            <p>Twenty One</p>
        </div>
        <div class="coluna" id="coluna2">
            <h4>Coluna dois</h4>
            <p>Twenty One</p>
            <p>Twenty One</p>
            <p>Twenty One</p>
            <p>Twenty One</p>
        </div>
        <div class="coluna" id="coluna3">
            <h4>Coluna tres</h4>
            <p>Twenty One</p>
            <p>Twenty One</p>
            <p>Twenty One</p>
            <p>Twenty One</p>
        </div>
        <div class="coluna" id="coluna4">
            <h4>Junte-se a nós</h4>
            <div>
                <button><img src="{{ asset('images/facebook.svg') }}" alt=""></button>
                <button><img src="{{ asset('images/instagram.svg') }}" alt=""></button>
                <button><img src="{{ asset('images/youtube.svg') }}" alt=""></button>
            </div>
        </div>
    </section>
    <div class="linha"></div>
    <section class="secondary-container">
        <p>Neuromasters @ 2023. Todos os direitos reservados</p>
        <div>
            <h4>Teste1</h4>
            <h4>Teste2</h4>
            <h4>Teste3</h4>
        </div>

    </section>

</footer>
