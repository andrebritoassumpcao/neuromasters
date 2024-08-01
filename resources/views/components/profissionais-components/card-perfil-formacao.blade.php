<div class="card mb-3" style="width: 100%;">
    <div class="col">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">{{ $formacao->curso }}</h3>
            </div>
            <p class="card-text"><strong>Instituição de Ensino:</strong> {{ $formacao->instituicao_ensino }}</p>
            <p class="card-text"><strong>Formação:</strong> {{ $formacao->formacao }}</p>
            <p class="card-text"><strong>Período:</strong> {{ $formacao->inicio_mes }} {{ $formacao->inicio_ano }} -
                {{ $formacao->fim_mes }} {{ $formacao->fim_ano }}</p>
            <p class="card-text"><strong>Descrição:</strong> {{ $formacao->descricao_curso }}</p>
            <p class="card-text"><strong>Especialidades:</strong> {{ $formacao->especialidades }}</p>
        </div>
    </div>
</div>
