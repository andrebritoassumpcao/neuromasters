    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
            margin: 0%;
            padding: 0%;
        }

        a {
            text-decoration: none;
            color: #393938;
        }

        .navbar-cointainer {
            display: flex;
            flex-direction: row;
            list-style: none;
            font-size: 18px;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            box-shadow: 0px 4px 20px 0px rgba(0, 0, 0, 0.05);
        }

        .navbar-cointainer div {
            display: flex;
            flex-direction: row;
        }

        nav {
            background-color: #ffffff;
        }

        .nav-item {
            padding: 20px;
        }

        .nav-items {
            justify-content: space-between;
            width: 40%;
        }

        .nav-link {
            background-image: linear-gradient(to right,
                    #4B85FF,
                    #4B85FF 50%,
                    #393938 50%);
            background-size: 200% 100%;
            background-position: -100%;
            display: inline-block;
            padding: 5px 0;
            position: relative;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.3s ease-in-out;
        }

        .nav-link:before {
            content: '';
            background: #4B85FF;
            display: block;
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 3px;
            transition: all 0.3s ease-in-out;
        }

        .nav-link:hover {
            background-position: 0;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .logo {
            font-weight: 700;
            margin-left: 40px;
            font-size: 26px;
        }

        .sing-in {
            width: 20%;
            align-items: center;
            justify-content: flex-end;
            gap: 8%;
            margin-right: 40px;
        }

        .sing-in a {
            font-weight: 500;

        }
    </style>
    <header>
        <nav>
            <ul class="navbar-cointainer">
                <li class="logo">
                    <a href="/">Neuromasters</a>
                </li>
                <div class="nav-items">
                    <li class="nav-item">
                        <a class="nav-link" href="/servicos">Buscar Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sou-profissional">Sou um Especialista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre a Empresa</a>
                    </li>
                </div>
                <div class="sing-in">
                    <li class="login">
                        <a class="nav-link" href="{{ route('login.index') }}">Entrar</a>
                    </li>
                    <li class="cadastro">
                        <x-sign-button url="/cadastro" style="">
                            Cadastre-se
                        </x-sign-button>
                    </li>
                </div>
            </ul>
        </nav>
    </header>
