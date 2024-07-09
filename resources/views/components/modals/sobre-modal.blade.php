<div class="modal" id="sobreModal" tabindex="-1" aria-labelledby="sobreModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sobreModalLabel">Sobre mim</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profissionalPerfil.updateSobre', ['id_profissional' => $user->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-campo-component class="txtarea" inputType="textarea" inputName="resumo_profissional"
                        :placeholder="'Digite um resumo profissional'" value="{{ $user->resumo_profissional }}">
                        <x-slot name="labelSlot">
                            Resumo Profissional*:
                        </x-slot>
                    </x-campo-component>
                    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
                        Salvar
                    </x-submit-button>
                </form>
            </div>
        </div>
    </div>
</div>
