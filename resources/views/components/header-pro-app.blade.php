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
        font-weight: 600;
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
        min-width: 45%;
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

    .user-container {
        width: 20%;
        align-items: center;
        justify-content: flex-end;
        gap: 8%;
        margin-right: 40px;
        z-index: 1;
    }

    .user-container a {
        font-weight: 500;

    }

    .user-menu {
        list-style: none;
        padding: 10px;
        margin: 0;
    }

    .user-profile {
        position: relative;
        display: inline-block;
    }

    .menu-trigger {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .menu-trigger svg {
        margin-right: 10px;
    }

    .submenu {
        display: none;
        position: absolute;
        right: 1%;
        min-width: 220px;
        list-style: none;
        padding: 20px;
        margin: 0 25px 0 0;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transform: translateY(0);
        transition: transform 0.3s ease-in-out;
    }

    .submenu a:hover {
        color: #4B85FF
    }

    .submenu a: {
        padding: 10px;
    }

    .user-profile:hover .submenu {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
</style>
<header>
    <nav>
        <ul class="navbar-cointainer">
            <li class="logo">
                <a href="/teaPro-app">Neuromasters</a>
            </li>
            <div class="nav-items">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profissionais</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Minhas Assinaturas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre a Empresa</a>
                </li>
            </div>
            <div class="user-container">
                <li class="notification">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="26" viewBox="0 0 25 28"
                        fill="none">
                        <path
                            d="M15.8824 21.5263V22.8947C15.8824 25.162 14.0652 27 11.8235 27C9.5819 27 7.76471 25.162 7.76471 22.8947V21.5265M15.8824 21.5263L7.76471 21.5265M15.8824 21.5263H21.2941C22.0413 21.5263 22.6471 20.9137 22.6471 20.1579V19.3561C22.6471 18.9932 22.5044 18.6453 22.2507 18.3886L21.5597 17.6897C21.3896 17.5176 21.2941 17.2842 21.2941 17.0409V11.9474C21.2941 11.7059 21.2855 11.4664 21.2677 11.2304M7.76471 21.5265L2.35294 21.5265C1.60574 21.5265 1 20.9134 1 20.1576V19.3561C1 18.9932 1.14265 18.6457 1.39637 18.389L2.08737 17.689C2.25741 17.517 2.35294 17.2845 2.35294 17.0412V11.9473C2.35294 6.65707 6.59306 2.36842 11.8235 2.36842C12.7863 2.36842 13.7155 2.51372 14.5909 2.78383M21.2677 11.2304C22.8998 10.2879 24 8.51073 24 6.47368C24 3.45065 21.5771 1 18.5882 1C17.005 1 15.5805 1.68768 14.5909 2.78383M21.2677 11.2304C20.4777 11.6867 19.5631 11.9474 18.5882 11.9474C15.5994 11.9474 13.1765 9.49672 13.1765 6.47368C13.1765 5.05203 13.7123 3.75696 14.5909 2.78383M14.5909 2.78383L14.5928 2.78442"
                            stroke="#000B1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </li>
                <ul class="user-menu">
                    <li class="user-profile" title="Meu Perfil">
                        <div class="menu-trigger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                                fill="none">
                                <path
                                    d="M19.9555 22.7764C18.2466 20.8677 15.7635 19.6667 13 19.6667C10.2365 19.6667 7.75323 20.8677 6.04427 22.7764M13 25C6.37258 25 1 19.6274 1 13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25ZM13 15.6667C10.7909 15.6667 9 13.8758 9 11.6667C9 9.45753 10.7909 7.66667 13 7.66667C15.2091 7.66667 17 9.45753 17 11.6667C17 13.8758 15.2091 15.6667 13 15.6667Z"
                                    stroke="#000B1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Olá, {{ auth()->user()->name }}!</span>
                        </div>
                        <ul class="submenu">
                            <li><a
                                    href="{{ route('profissionalPerfil.index', ['id_profissional' => auth()->user()->id]) }}">Meu
                                    Perfil</a></li>
                            <li><a href="">Minhas Assinaturas</a></li>
                            <li><a href="">Histórico de Compras</a></li>
                            <li><a href="">Notificações</a></li>
                            <li><a href="">Mensagens</a></li>
                            <li><a href="">Forma de Pagamento</a></li>
                            <li><a href="">Configurações de Conta</a></li>
                            <li><a href="{{ route('login.destroy') }}">Sair</a></li>
                        </ul>
                    </li>
                </ul>

                </li>
            </div>
        </ul>
    </nav>
</header>
