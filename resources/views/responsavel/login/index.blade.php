<link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Login</title>

<x-layouts.app>
    <x-header-login :link="'/'" />

    @if (Session::has('alert.config'))
        <script>
            Swal.fire({!! Session::get('alert.config') !!});
        </script>
    @endif
    <div class="main-content">
        <form method="POST" class="needs-validation" action="{{ route('login.store') }}" novalidate autocomplete="off">
            @csrf
            <section class="login-container">
                <div class="left-container">
                    <h2>Bem-vindo de volta!</h2>
                    <p>Entre na sua conta para continuar</p>

                    <div class="form-group">
                        <label for="validationEmail" class="form-label">Email</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            name="email" id="validationEmail" value="{{ old('email') }}" required
                            autocomplete="username">
                        <div class="invalid-feedback">
                            @error('email')
                                {{ $message }}
                            @else
                                O campo de email é obrigatório.
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="validationPassword" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
                                id="validationPassword" required autocomplete="current-password">
                            <i class="fas fa-eye" id="eyeIcon" tabindex="0" aria-label="Mostrar senha"></i>
                        </div>
                        <div class="invalid-feedback">
                            @error('password')
                                {{ $message }}
                            @else
                                O campo de senha é obrigatório.
                            @enderror
                        </div>
                    </div>

                    <a href="#" class="forgot-link">Esqueceu a senha?</a>

                    <button type="submit" class="btn-primary">Login</button>

                    <div class="signup-link">
                        Ainda não tem uma conta? <a href="/cadastro">Cadastre-se</a>
                    </div>
                </div>

                <div class="right-container">
                    <img src="{{ asset('images/login-img.svg') }}" alt="Imagem de apoio à saúde mental">
                    <h4>Junte-se a nós para promover a saúde mental. Acesse nossa plataforma hoje e embarque em uma
                        jornada
                        de apoio e transformação.</h4>
                </div>
            </section>
        </form>
    </div>

    <footer>
        <x-footer-login />
    </footer>
</x-layouts.app>

<script>
    const passwordField = document.getElementById('validationPassword');
    const eyeIcon = document.getElementById('eyeIcon');

    eyeIcon.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });

    eyeIcon.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            eyeIcon.click();
        }
    });

    // Validação do formulário
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
