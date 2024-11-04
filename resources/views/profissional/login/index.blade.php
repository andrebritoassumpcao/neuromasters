<link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">
<title>Login</title>

<x-layouts.app>
    <x-header-login :link="'/sou-profissional'" />

    @include('sweetalert::alert')

    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif

    @error('error')
        <span>{{ $message }}</span>
    @enderror


    <form method="POST" action="{{ route('loginProfissionais.store') }}">
        @csrf

        <section class="login-container">
            <div class="left-container">
                <h4 class="mb-3">Fazer Login</h4>


                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        name="email" id="email" placeholder="Digite seu email" value="{{ old('email') }}"
                        required>
                    <div class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @else
                            O campo de email é obrigatório.
                        @enderror
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        name="password" id="password" placeholder="Digite sua senha" required>
                    <div class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @else
                            O campo de senha é obrigatório.
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <a href="#" id="esqueceu">Esqueceu a senha?</a>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px; margin: 20px 0;">
                        Login
                    </button>
                </div>

                <!-- Link para Cadastro -->
                <p class="mt-3">Ainda não tem uma conta? <a href="/cadastro">Cadastre-se</a></p>
            </div>
            </div>
            <div class="right-containerProf">


            </div>


        </section>
    </form>
    <footer>
        <x-footer-login>
        </x-footer-login>

    </footer>

</x-layouts.app>
