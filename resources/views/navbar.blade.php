

<style>
    #mainNavbar {
        background: rgba(22, 22, 22, 0.21);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(7.1px);
        -webkit-backdrop-filter: blur(7.1px);
        border: 1px solid rgba(22, 22, 22, 0.02);

        text-align: center;
        display: flex;
        flex-direction: row;
    }

    #mainNavbar a {
        color: white;
    }
    #mainNavbar a:hover{
        color: rgb(234, 13, 13);
    }
</style>

<div>
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar fixed-top">
        <div class="container-fluid">

            <img src="{{ asset('img/logo1.png') }}" width="70px" alt="">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/categories">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/panier">
                            <img src="{{ asset('img/panier.png') }}" height="25px" alt="">
                        </a>
                    </li>

                 @if(Auth::user())
                 <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/Profil">{{session()->get('name')}}</a>
                </li>

                    @if(Auth::user()->role === 'USER')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/Promotion">Promotion</a>
                            </li>

                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-dark btn-outline-light" style="color: white">
                                        <img src="{{ asset('img/logout.png') }}" height="20px" alt=""> Logout
                                    </button>

                                </form>

                        @endif

                        @if(Auth::user()->role === 'ADMIN')
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Espace Admin </a>
                        </li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-outline-light" style="color: white">
                                <img src="{{ asset('img/logout.png') }}" height="20px" alt=""> Logout
                            </button>
                        </form>
                         @endif


                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <img src="{{ asset('img/login.png') }}" height="20px" alt="">Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                <img src="{{ asset('img/register.png') }}" height="20px" alt="">Register
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</div>
