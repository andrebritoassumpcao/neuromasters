<style>
    .skills-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .skill-button {
        background-color: #e0e0e0;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .skill-button.selecionado {
        background-color: #007bff;
        color: #fff;
    }

    .skill-button:hover {
        background-color: #d0d0d0;
    }

    textarea {
        border-radius: 8px;
        border: 1px solid #DBDCD6;
        color: #1b1b1b;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        width: 100%;
        line-height: normal;
        padding: 8px;
        resize: none;
        margin-top: 8px;
        height: 150px;
    }


    .txtarea textarea {}
</style>

<div class="modal" id="competenciasModal" tabindex="-1" aria-labelledby="competenciasModalLabel" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="competenciasModalLabel">Minhas Competências</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profissionalPerfil.updateCompetencias', ['id_profissional' => $user->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @php
                        $competencias = $user->competencias ?? [];

                    @endphp
                    <div class="skills-container">
                        <button type="button" class="skill-button"
                            data-skill="Acompanhamento Terapêutico">Acompanhamento Terapêutico</button>
                        <button type="button" class="skill-button" data-skill="Ansiedade">Ansiedade</button>
                        <button type="button" class="skill-button" data-skill="Adolescência">Adolescência</button>
                        <button type="button" class="skill-button" data-skill="Autoestima">Autoestima</button>
                        <button type="button" class="skill-button" data-skill="Casais">Casais</button>
                        <!-- Adicione mais botões conforme necessário -->
                    </div>

                    <div class="add-skill-container d-flex flex-column" style="margin-top: 20px;">
                        <input type="text" id="new-skill" class="form-control"
                            placeholder="Adicionar nova competência">
                        <button type="button" id="add-skill-button" class="btn btn-primary"
                            style="margin-top: 10px;width: 120px;">Adicionar</button>
                    </div>
                    <div class="txtarea">

                        <textarea
                            placeholder="{{ !empty($competencias) ? implode(', ', $competencias) : 'Clique nos botões acima para adicionar as competências' }}"
                            id="competencias-input" name="competencias[]" value="">
        </textarea>
                    </div>



                    <div class="d-flex justify-content-end" style="margin-top: 10px;">
                        <x-submit-button url="" class="btn"
                            style="width: 120px; height: 32px; margin: 20px 0;">
                            Salvar
                        </x-submit-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.skill-button');
        const addSkillButton = document.getElementById('add-skill-button');
        const newSkillInput = document.getElementById('new-skill');
        const skillsContainer = document.querySelector('.skills-container');
        const competenciasInput = document.getElementById('competencias-input');

        // Atualiza o campo de texto com habilidades selecionadas
        function updateCompetencias() {
            const selectedSkills = Array.from(document.querySelectorAll('.skill-button.selecionado'))
                .map(button => button.dataset.skill);
            competenciasInput.value = selectedSkills.join(', ');
            console.log('Competências atualizadas:', selectedSkills);
            console.log('Valor do campo de entrada:', competenciasInput.value);
        }

        // Adiciona evento de clique aos botões existentes
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('selecionado');
                updateCompetencias();
            });
        });

        // Adiciona nova habilidade ao clicar no botão "Adicionar"
        addSkillButton.addEventListener('click', () => {
            const newSkill = newSkillInput.value.trim();
            if (newSkill) {
                const newButton = document.createElement('button');
                newButton.type = 'button';
                newButton.className = 'skill-button';
                newButton.dataset.skill = newSkill;
                newButton.textContent = newSkill;
                newButton.addEventListener('click', () => {
                    newButton.classList.toggle('selecionado');
                    updateCompetencias();
                });
                skillsContainer.appendChild(newButton);
                newSkillInput.value = '';
                updateCompetencias();
            }
        });

        // Adiciona a funcionalidade de adicionar habilidade ao pressionar Enter
        newSkillInput.addEventListener('keypress', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault(); // Evita o comportamento padrão do Enter
                addSkillButton.click(); // Aciona o clique do botão
            }
        });

        // Ativa os botões correspondentes às competências do usuário
        const userCompetencias = {!! json_encode($user->competencias ?? []) !!};
        buttons.forEach(button => {
            if (userCompetencias.includes(button.dataset.skill)) {
                button.classList.add('selecionado');
            }
        });
        updateCompetencias();
    });
</script>
