<link rel="stylesheet" href="{{ asset('css/modal/modal.css') }}">
<div class="modal" id="academicModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Atualizar Dados</h2>
        <form action="{{ route('profissionalPerfil.update', ['id_profissional' => $user->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')




        </form>
    </div>
    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
        Salvar
    </x-submit-button>

    {{-- <script>
        var modal = document.getElementById('academicModal');

        var btn = document.querySelector('.btn-atualizar-dados');

        var span = document.getElementsByClassName('close')[0];

        btn.onclick = function() {
            modal.style.display = 'block';
        }

        span.onclick = function() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
        document.getElementById('tipoAtendimento').addEventListener('change', function() {
            var atendimento = this.value;
            var enderecoSection = document.getElementById('enderecoSection');
            if (atendimento === 'Presencial' || atendimento === 'Online e Presencial') {
                enderecoSection.style.display = '';
            } else {
                enderecoSection.style.display = 'none';
            }
        });
    </script> --}}
    <script src="{{ asset('js/cep.js') }}"></script>
