<style>
    #mainNavbar {
        background: rgba(22, 22, 22, 0.25);
        border-radius: 18px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.08);

        padding: 10px 20px;
        max-width: 1100px;
        margin: 10px auto; /* CENTER NAVBAR */
    }

    #mainNavbar .nav-link {
        color: #fff;
        font-weight: 500;
        margin: 0 8px;
        transition: 0.3s ease;
        position: relative;
    }

    #mainNavbar .nav-link:hover {
        color: #ff3b3b;
        transform: translateY(-2px);
    }

    #mainNavbar .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 0%;
        height: 2px;
        background: #ff3b3b;
        transition: 0.3s ease;
    }

    #mainNavbar .nav-link:hover::after {
        width: 100%;
    }

    #mainNavbar img {
        transition: 0.3s ease;
    }

    #mainNavbar img:hover {
        transform: scale(1.1);
    }

    .navbar-toggler {
        border: none;
    }

    .nav-center {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
</style>

<nav id="mainNavbar" class="navbar navbar-expand-lg fixed-top">

    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo1.png') }}" width="65px" alt="">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Centered content -->
        <div class="collapse navbar-collapse nav-center" id="navbarSupportedContent">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/panier">
                        <img src="{{ asset('img/panier.png') }}" height="22px">
                    </a>
                </li>

                @if(Auth::user())

                    <li class="nav-item">
                        <a class="nav-link" href="/Profil">
                            {{ session()->get('name') }}
                        </a>
                    </li>

                    @if(Auth::user()->role === 'USER')
                        <li class="nav-item">
                            <a class="nav-link" href="/Promotion">Promotion</a>
                        </li>

                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-outline-light btn-sm">
                                    <img src="{{ asset('img/logout.png') }}" height="18px">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endif

                    @if(Auth::user()->role === 'ADMIN')
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Espace Admin</a>
                        </li>

                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-outline-light btn-sm">
                                    <img src="{{ asset('img/logout.png') }}" height="18px">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endif

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <img src="{{ asset('img/login.png') }}" height="18px"> Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/register">
                            <img src="{{ asset('img/register.png') }}" height="18px"> Register
                        </a>
                    </li>

                @endif

            </ul>
        </div>

    </div>
</nav>
