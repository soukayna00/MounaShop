@extends('EspaceClient')
<style>
    #MainContain{
        height:90vh;
        padding-top: 100px;
    }
</style>
@section('content')
    <div id="MainContain" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Confirmation d'achat</div>

                    <div class="card-body">
                        <p>Merci pour votre achat !</p>
                        <p>Voici les détails de votre commande :</p>
                        <ul>
                            @foreach (session('cart') as $id => $details)
                                <li>{{ $details['name'] }} - Quantité: {{ $details['quantity'] }} - Prix unitaire: {{ $details['price'] }}</li>
                            @endforeach
                        </ul>
                        <p>Total: {{ session()->get('total') }}</p>
                        <a href="/">>Accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
