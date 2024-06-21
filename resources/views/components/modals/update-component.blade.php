<style>
    .modal {
        display: none;
        /* Escondido por padrão */
        position: fixed;
        /* Fica fixo na tela */
        z-index: 1;
        /* Fica no topo */
        left: 0;
        top: 0;
        width: 100%;
        /* Largura total */
        height: 100%;
        /* Altura total */
        overflow: auto;
        /* Habilita a rolagem se necessário */
        background-color: rgb(0, 0, 0);
        /* Cor de fundo */
        background-color: rgba(0, 0, 0, 0.4);
        /* Cor de fundo com opacidade */
    }

    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: 10% auto;
        /* 15% do topo e centralizado horizontalmente */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Pode ser mais ou menos, dependendo do design */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Adiciona animação */
    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div class="modal" id="updateModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Atualizar Dados</h2>
        <form action="{{ route('profissionalPerfil.update', ['id_profissional' => $user->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <button type="submit" class="btn">Enviar</button>

            <script>
                // Obtém o modal
                var modal = document.getElementById('updateModal');

                // Obtém o botão que abre o modal
                var btn = document.querySelector('.btn-atualizar-dados');

                // Obtém o elemento <span> que fecha o modal
                var span = document.getElementsByClassName('close')[0];

                // Quando o usuário clica no botão, abre o modal
                btn.onclick = function() {
                    modal.style.display = 'block';
                }

                // Quando o usuário clica em <span> (x), fecha o modal
                span.onclick = function() {
                    modal.style.display = 'none';
                }

                // Quando o usuário clica fora do modal, ele fecha
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                }
            </script>
