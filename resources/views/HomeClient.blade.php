<div>
    @extends('EspaceClient')
    <style>
      #latestProd{
        padding: 20px;
      }
        .row-container-2{
            background-color: rgb(33, 32, 32);
            color: white;
            text-align: center;
            padding: 20px;
            margin: 20px;
            border-radius: 20px;
            height: 70vh;
            display: flex;
            .catalogue-card {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 100%;
            width: 100%;

        }

        .catalogue-card img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

    </style>
    @section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100  " style="height: 100vh" src="{{ asset('img/slide1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h1 class="display-1">Découvrez les Essentiels pour une Maison Impeccable !</h1>
              <button class="btn btn-secondary p-2">je profite</button>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" style="height: 100vh" src="{{ asset('img/slide3.jpg') }}"  alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-1">"Trouvez Tout ce Dont Vous Avez Besoin pour Votre Maison Idéale !</h1>
              <button class="btn btn-secondary p-2">je profite</button>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height: 100vh" src="{{ asset('img/slide4.jpg') }}"  alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-1">Faites de Votre Maison un Lieu de Rêve avec Nos Fournitures !</h1>
              <button class="btn btn-secondary p-2 ">je profite</button>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" style="height: 100vh" src="{{ asset('img/slide5.jpg') }}"  alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-1">Les Secrets pour une Maison Bien Équipée à Découvrir !</h1>
              <button class="btn btn-secondary p-2">je profite</button>
            </div>
          </div>
          <!-- Add similar structure for other carousel items -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="row-container">
        <div>
            <div style="text-align: center;">

                <h2 class="display-2">Explorez des nouvelles possibilités</h2>
                <video width="700" autoplay muted loop>
                    <source src="{{ asset('img/video-display.mp4') }}" type="video/mp4">
                </video>
            </div>

        </div>
        <div class="row-container-2">
            <h3 class="display-3">Depuis 1985, MounaShop produit des meubles écologiques, nous défendons un design minimaliste et une approche durable du design.</h3>

        </div>
        <div id='latestProd' class="row-container text-center">
            <h4 class="display-4">Nouveauté</h4>
            <div class="row justify-content-center ">
                @foreach ($latestProducts as $item)
                    <div class="col-md-3">
                        <div class="card catalogue-car py-3 ">
                            <img src="{{ asset('img/' . $item->image) }}" class="card-img-top" alt="{{ $item->product_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->Product_name }}</h5>
                                <p class="card-text">{{ $item->Description }}</p>
                                <p class="card-text"><strong>{{ $item->price }}DH</strong></p>
                            </div>
                            <a href="{{ url('panier/addc', ['id' => $item['id']]) }}"  role="button">
                                <button class="btn btn-dark">Ajouter au panier </button>
                            </a>                        </div>
                    </div>
                @endforeach
            </div>
        </div>
