<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <title>Login</title>
</head>

<body class="bg-body-tertiary">

    <x-header-login :link="'/'" />

    @if (Session::has('alert.config'))
        <script>
            Swal.fire({!! Session::get('alert.config') !!});
        </script>
    @endif

    <form method="POST" class="needs-validation" action="{{ route('login.store') }}" novalidate>
        @csrf

        <section class="login-container">
            <div class="left-container">
                <h2>Fazer Login</h2>

                <x-google-button url="">Entrar com Google</x-google-button>

                <div class="ou d-flex align-items-center my-3">
                    <div class="linha flex-grow-1"></div>
                    <h4 class="mx-3">OU</h4>
                    <div class="linha flex-grow-1"></div>
                </div>

                <div class="col-md-10 mb-3">
                    <label for="validationEmail" class="form-label">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email" id="validationEmail" value="{{ old('email') }}" required>
                    <div class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @else
                            O campo de email é obrigatório.
                        @enderror
                    </div>
                </div>

                <div class="col-md-10 mb-3">
                    <label for="validationPassword" class="form-label">Senha</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        name="password" id="validationPassword" value="{{ old('password') }}" required>
                    <div class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @else
                            O campo de senha é obrigatório.
                        @enderror
                    </div>
                </div>

                <a id="" href="#" class="link-opacity-25-hover d-block mb-3">Esqueceu a senha?</a>

                <div class="d-grid gap-2 col-10 mx-auto">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>

                <p class="text-center mt-3">Ainda não tem uma conta? <a href="/cadastro"
                        class="link-opacity-25-hover">Cadastre-se</a></p>
            </div>

            <div class="right-container">
                <img src="{{ asset('images/login-img.svg') }}" alt="Imagem de Login" class="img-fluid mb-4">
                <h4 class="text-center m-2">Junte-se a nós para promover a saúde mental, acesse nossa plataforma hoje e
                    embarque em uma
                    jornada
                    de apoio e transformação.</h4>
            </div>
        </section>
    </form>

</body>
<footer>
    <x-footer-login>
    </x-footer-login>

</footer>

</html>
<script>
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
