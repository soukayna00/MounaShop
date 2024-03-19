<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->

    @extends('EspaceClient')
    {{-- @yield('title', 'Les Prods ') --}}
    @section('content')

    <style>
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

            .search-filter {
            padding: 40px;
            display: flex;
            width: 100%;
            border-radius: 20px;
            margin-bottom: 20px;
            margin-top: 80px;
            align-items: flex-end;
            margin-top:0px;
            background-position: center;
            background-size: cover;
            height:50vh; /* Set the height to cover the full viewport height */
            background-image: url({{ asset('img/canape-background.jpg') }});



    }
    @keyframes pulseAnimation {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    .btn.btn-dark:hover {
        animation: pulseAnimation 1.5s infinite  ease-in-out;
        color: black;
        background-color:white;
        border: black solid 1px;
    }
    </style>

    <div class="container" >
        <div class="search-filter">
            {{-- <form action="{{route('produit.shop')}}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="query" placeholder="Nom de produits">
                        <input type="submit" value="search">
                    </div>


                </div>
            </form> --}}
        </div>

        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-3">
                    <div class="card catalogue-card">
                        <img src="{{ asset('img/' . $item->image) }}" class="card-img-top" alt="{{ $item->product_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->Product_name }}</h5>
                            <p class="card-text">{{ $item->Description }}</p>
                            <p class="card-text"><strong>{{ $item->price }}DH</strong></p>
                        </div>
                <a href="{{ url('panier/addc', ['id' => $item['id']]) }}"  role="button">
                    <button class="btn btn-dark">Ajouter au panier </button>
                </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<div style=" display: flex;justify-content: center ; margin-top: 20px;"> {{ $products->links('pagination::bootstrap-4') }}</div>
    @endsection
</div>
