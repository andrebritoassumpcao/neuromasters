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
                <form action="{{ route('profissionalPerfil.updateSobre', ['id_profissional' => $user->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="skills-container">
                        <button type="button" class="skill-button" data-skill="JavaScript">JavaScript</button>
                        <button type="button" class="skill-button" data-skill="React">React</button>
                        <button type="button" class="skill-button" data-skill="CSS">CSS</button>
                        <button type="button" class="skill-button" data-skill="Node.js">Node.js</button>
                        <button type="button" class="skill-button" data-skill="Node.js">1.js</button>
                        <button type="button" class="skill-button" data-skill="Node.js">2.js</button>
                        <button type="button" class="skill-button" data-skill="Node.js">3.js</button>
                        <button type="button" class="skill-button" data-skill="Node.js">4.js</button>
                        <button type="button" class="skill-button" data-skill="Node.js">5.js</button>
                        <!-- Adicione mais botões conforme necessário -->
                    </div>
                    <div class="add-skill-container" style="margin-top: 20px;">
                        <input type="text" id="new-skill" class="form-control"
                            placeholder="Adicionar nova competência">
                        <button type="button" id="add-skill-button" class="btn btn-primary"
                            style="margin-top: 10px;">Adicionar</button>
                    </div>
                    <x-submit-button url="" class="btn" style="width: 120px; height: 32px; margin: 20px 0;">
                        Salvar
                    </x-submit-button>
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

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('selecionado');
                // Aqui você pode adicionar lógica para lidar com o estado selecionado
                console.log(`Habilidade selecionada: ${button.dataset.skill}`);
            });
        });

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
                    console.log(`Habilidade selecionada: ${newButton.dataset.skill}`);
                });
                skillsContainer.appendChild(newButton);
                newSkillInput.value = '';
            }
        });
    });
</script>
