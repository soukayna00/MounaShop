<div>
    @extends('EspaceClient')

    @section('title','Promotions')
    @section('content')
    <style>
        .OnePage {
            background-position: center;
            background-size: cover;
            height: 100vh; /* Set the height to cover the full viewport height */
            background-image: url({{ asset('img/red-sofa.jpg') }});
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h3>a {
            color: rgb(75, 71, 71);
            /* background-color: rgb(242, 234, 234); */
            padding: 20px;
            border-radius:20px
        }

        .text-promo {
            margin-bottom: 100px; /* Add some space between the heading and the link */
            color: rgb(70, 39, 39);
        }
    </style>

    <div class="OnePage">
        <div class="text-promo">
            <h1>Découvrez nos Promotions et Profiter de 50%  </h1>
        </div>
        <h3><a href="/catalogue">Télécharger le Catalogue des promotions</a></h3>
    </div>
    @endsection
</div>
