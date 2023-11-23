<style>
    .container-confirma {
        min-width: 55vw;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        margin: 40px auto;
    }

    .confirma-header {
        margin: 0 auto;
        max-width: 480px;
    }

    .container-confirma p {
        max-width: 480px;
        line-height: normal;


    }

    .confirma-header h1 {
        margin: 8px auto;
        font-size: 34px;
        text-align: center;
    }

    .verifica-container {
        display: flex;
        gap: 8px;
    }

    .ver-email {
        width: 45px;
        height: 55px;
        flex-shrink: 0;
        border-radius: 8px;
        border: 1px solid #525456;
        text-align: center;
        color: #000;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .ver-email::placeholder {
        text-align: center;
        padding: 0 auto;
    }

    #reenvio {
        margin-left: auto;
        color: #5654DA;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        margin-top: 8px;
    }

    #reenvio:hover {
        color: #3431d8;
        text-decoration: underline;

    }
</style>

<script>
    function onlyNumbers(event, nextInputName) {
        event.target.value = event.target.value.replace(/[^0-9]/g, '');

        if (event.target.value.length > 1) {
            event.target.value = event.target.value.slice(0, 1);
        }

        var currentIndex = parseInt(event.target.getAttribute('name'));
        var nextIndex = currentIndex + 1;

        if (event.target.value !== '' && nextIndex <= 6) {
            document.querySelector('input[name="' + nextIndex + '"]').focus();
        }
    }

    function handleBackspace(currentInputName) {
        var currentInput = document.querySelector('input[name="' + currentInputName + '"]');
        var currentIndex = parseInt(currentInputName);
        var prevIndex = currentIndex - 1;

        if (prevIndex >= 1) {
            if (currentInput.value === '') {
                document.querySelector('input[name="' + prevIndex + '"]').focus();
            } else {
                currentInput.value = '';
            }
        }
    }

    function handlePaste(event, startInputName) {
        var pastedText = (event.clipboardData || window.clipboardData).getData('text');
        var inputs = document.querySelectorAll('.ver-email');

        for (var i = 0; i < Math.min(pastedText.length, 6); i++) {
            inputs[startInputName - 1 + i].value = pastedText[i];
        }
    }
</script>

<div class="container-confirma">
    <img src="{{ asset('images/confirmacao.svg') }}" alt="detalhes-icone" style="width: 46px;">
    <div class="confirma-header">
        <h1>Confirmar Cadastro</h1>
        <p>Por favor, verifique sua caixa de entrada e insira o código no espaço abaixo para completar o processo de
            verificação</p>
    </div>
    <div class="verifica-container">
        <input type="text" class="ver-email" placeholder=" - " name="1" oninput="onlyNumbers(event, '2')"
            onkeydown="if(event.keyCode == 8) handleBackspace('1')" onpaste="handlePaste(event, 1)">
        <input type="text" class="ver-email" placeholder=" - " name="2" oninput="onlyNumbers(event, '3')"
            onkeydown="if(event.keyCode == 8) handleBackspace('2')" onpaste="handlePaste(event, 2)">
        <input type="text" class="ver-email" placeholder=" - " name="3" oninput="onlyNumbers(event, '4')"
            onkeydown="if(event.keyCode == 8) handleBackspace('3')" onpaste="handlePaste(event, 3)">
        <input type="text" class="ver-email" placeholder=" - " name="4" oninput="onlyNumbers(event, '5')"
            onkeydown="if(event.keyCode == 8) handleBackspace('4')" onpaste="handlePaste(event, 4)">
        <input type="text" class="ver-email" placeholder=" - " name="5" oninput="onlyNumbers(event, '6')"
            onkeydown="if(event.keyCode == 8) handleBackspace('5')" onpaste="handlePaste(event, 5)">
        <input type="text" class="ver-email" placeholder=" - " name="6" oninput="onlyNumbers(event, null)"
            onkeydown="if(event.keyCode == 8) handleBackspace('6')" onpaste="handlePaste(event, 6)">
    </div>
    <p>Caso não tenha recebido o email de verificação, verifique sua pasta de spam ou lixo eletrônico. Se ainda assim
        não encontrar, <a id="reenvio" href="">Clique aqui</a> para reenviar o email de verificação.</p>
    <x-submit-button style="width: 323px; height: 38px; margin: 20px 0;">
        Finalizar Cadastro
    </x-submit-button>
</div>
