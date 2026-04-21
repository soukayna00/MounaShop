<div>
    @extends('EspaceClient')

    <style>
        body {
            background: #0b0b0b;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ===== CAROUSEL ===== */
        .carousel-item img {
            height: 100vh;
            width: 100%;
            object-fit: cover; /* FIXED IMAGE FIT */
            filter: brightness(0.55);
        }

        .carousel-caption {
            bottom: 30%;
        }

        .carousel-caption h1 {
            font-size: 3rem;
            font-weight: 800;
            text-shadow: 0 10px 30px rgba(0,0,0,0.6);
        }

        .carousel-btn {
            margin-top: 20px;
            padding: 12px 28px;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            background: #fff;
            color: #000;
            transition: 0.3s ease;
        }

        .carousel-btn:hover {
            background: #ff3b3b;
            color: white;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin: 60px 0 30px;
        }

        /* ===== VIDEO ===== */
        .video-section {
            padding: 70px 20px;
            text-align: center;
            color: white;
        }

        .video-section video {
            width: 85%;
            max-width: 900px;
            border-radius: 18px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            object-fit: cover;
        }

        /* ===== ABOUT ===== */
        .about {
            width: 85%;
            margin: 60px auto;
            padding: 60px 40px;
            background: linear-gradient(135deg, #1a1a1a, #2c2c2c);
            border-radius: 20px;
            text-align: center;
            color: white;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        .about h3 {
            font-size: 1.6rem;
            line-height: 1.7;
            font-weight: 500;
        }

        /* ===== PRODUCTS ===== */
        #latestProd {
            padding: 70px 20px;
        }

        .product-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            transition: 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
        }

        /* FIX IMAGE ISSUE HERE */
        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;   /* IMPORTANT FIX */
            display: block;
        }

        .product-body {
            padding: 15px;
        }

        .product-title {
            font-weight: 700;
            font-size: 18px;
        }

        .product-desc {
            font-size: 14px;
            color: #666;
            margin: 6px 0;
            min-height: 40px;
        }

        .price {
            font-weight: bold;
            font-size: 16px;
            margin: 8px 0;
        }

        .add-btn {
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            border: none;
            background: #111;
            color: white;
            transition: 0.3s ease;
        }

        .add-btn:hover {
            background: #ff3b3b;
        }
    </style>

    @section('content')

    <!-- ===== CAROUSEL ===== -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('img/slide1.jpg') }}">
                <div class="carousel-caption">
                    <h1>Design moderne pour votre maison</h1>
                    <button class="carousel-btn">Découvrir</button>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/slide3.jpg') }}">
                <div class="carousel-caption">
                    <h1>Élégance et confort</h1>
                    <button class="carousel-btn">Découvrir</button>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/slide4.jpg') }}">
                <div class="carousel-caption">
                    <h1>Créez votre espace idéal</h1>
                    <button class="carousel-btn">Découvrir</button>
                </div>
            </div>

        </div>

    </div>

    <!-- ===== VIDEO ===== -->
    <div class="video-section">
        <h2 class="section-title">Découvrez notre univers</h2>

        <video autoplay muted loop>
            <source src="{{ asset('img/video-display.mp4') }}">
        </video>
    </div>

    <!-- ===== ABOUT ===== -->
    <div class="about">
        <h3>
            Depuis 1985, MounaShop crée des meubles modernes, écologiques et durables.
            Un design minimaliste pour un style de vie élégant.
        </h3>
    </div>

    <!-- ===== PRODUCTS ===== -->
    <div id="latestProd">

        <h2 class="section-title">Nouveautés</h2>

        <div class="row justify-content-center">

            @foreach ($latestProducts as $item)
                <div class="col-md-3 col-sm-6 mb-4">

                    <div class="product-card">

                        <!-- FIXED IMAGE HANDLING -->
                        <img src="{{ asset('img/' . $item->image) }}"
                             alt="{{ $item->product_name }}">

                        <div class="product-body">

                            <div class="product-title">
                                {{ $item->product_name }}
                            </div>

                            <div class="product-desc">
                                {{ $item->Description }}
                            </div>

                            <div class="price">
                                {{ $item->price }} DH
                            </div>

                            <a href="{{ url('panier/addc', ['id' => $item['id']]) }}">
                                <button class="add-btn">
                                    Ajouter au panier
                                </button>
                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

    @endsection
</div>
