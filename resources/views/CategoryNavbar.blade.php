 <div>
        <style>
            #navbar-category {
                width: 100%;
                height:fit-content;
                background-color: rgb(40, 39, 39);
                /* border-radius: 50px; */
                color: white;
                padding: 20px;
                        box-shadow:  20px 20px 60px #454141,
                                    -20px -20px 70px rgb(231, 112, 14);


            }

            #navbar-category a {
                color: white;
            }


          /* .navbar-collapse {
                flex-direction: row;
          } */
           .navbar-expand-lg .navbar-nav {
                flex-direction: row;
         }



        </style>
        <div class="navbar-flex">
        <nav id='navbar-category' class="navbar navbar-expand-lg sticky-top d ">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li>
                       <img src="{{ asset('img/logo1.png') }}"  width="70px" alt="">
                    </li>
                    <li>
                        <a class="nav-link" href="/home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Espace Client</a>
                      </li>
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{route('create')}}">Products</a> --}}
                           <a class="nav-link" href="/produits/display">Produits</a>

                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/categories/Admin">Catégories</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/CommandesAdmin">Commandes</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/email">Envoyer Email</a>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </div>


