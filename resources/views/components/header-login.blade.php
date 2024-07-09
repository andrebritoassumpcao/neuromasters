@props(['link'])

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


    .logo {
        font-weight: 700;
        margin-left: 40px;
        font-size: 26px;
    }
</style>
<header>
    <nav>
        <ul class="navbar-cointainer">
            <li class="logo">
                <a href="{{ $link }}">Neuromasters</a>
            </li>

            </li>
            </div>
        </ul>
    </nav>
</header>
