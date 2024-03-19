<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
  @extends('EspaceClient');
  @section('title','Livraison')

  <style>
    .mainContentCommande{
        /* height: 90vh; */
        padding: 30px;
        padding-top:50px;



    }
    .recapdeCommande,.Livraison,.Payement{
        height: fit-content;
        border: 1px solid orange;
        width: fit-content;
        padding: 30px;
        border-radius: 20px;



    }


    .infoLivraison,.infoPersonnel{
        margin: 20px;

    }
    p{
        font-size: 20px;
    }
  </style>
@section('content')

<div class="mainContentCommande">
    <h4 class="display-4">Votre commande</h4>

    {{-- recap de commande--}}
  <div class="recapdeCommande">

        @foreach (session('cart') as $id => $details )
        <td><img src="{{ asset('img/'.$details['image']) }}" width="100" height="100" class="img-responsive"/></td>
        @endforeach

        <h5 class='display-5'>Récapitulatif de la commande</h5>
        @foreach (session('cart') as $id => $details )
        <p> Quantité : {{ $details['quantity'] }}x - {{ $details['name'] }}</p>
        @endforeach
        <p>Prix Total {{session()->get('total')}}</p>
        <p>TVA(10%) : {{$tva=session()->get('total')*0.1}} </p>
        <p>Prix Total à payer : {{$prixTotal=session()->get('total')+$tva}} ;   </p>
        <a href="{{ url('/panier') }}">Modifier</a>
  </div>
<h4 class="display-4">Livraison et Informations Personnelles</h4>
  <div class="Livraison" style="display: flex">
    <div class="infoLivraison">
        @include('incs.flash')

        <h3>Informations de Livraison</h3>
        <form action="processForm" method="POST">
            @csrf
        <label for="shipping_address">Adresse de Livraison:</label><br>
        <input type="text" id="shipping_address" name="shipping_address" ><br>
        @error('shipping_address')
        <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
       @enderror

        <label for="shipping_city">Ville de Livraison:</label><br>
        <input type="text" id="shipping_city" name="shipping_city" ><br>
        @error('shipping_city')
        <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
       @enderror
        <label for="shipping_postal_code">Code Postal de Livraison:</label><br>
        <input type="text" id="shipping_postal_code" name="shipping_postal_code" ><br>
        @error('shipping_postal_code')
        <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
       @enderror
    </div>
    <div class="infoPersonnel">
            <h3>Informations Personnelles</h3>
            {{-- @include('incs.flash') --}}
            <label for="full_name">Nom Complet:</label><br>
            <input type="text" id="full_name" name="name" ><br>
       @error('name')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
         @enderror
            <label for="email">Adresse Email:</label><br>
            <input type="email" id="email" name="email" ><br>
            @error('email')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
         @enderror
            <label for="phone_number">Numéro de Téléphone:</label><br>
            <input type="text"  name="phone_number"><br>
            @error('phone_number')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
         @enderror
            <button class="btn btn-dark mt-2" type="submit">valider</button>
            </form>
    </div>
  </div>
  <h4 class="display-4">Paiement</h4>
<div class="Payement">
    <h3>Informations de Paiement</h3>
<form action="/processPaiement" method="POST" >
    @include('incs.flash')
    @csrf
        <div>
            <p class="text mb-1">Numero de la carte</p>
            <input  type="text" name="NumCarte" placeholder="1234 5678 435678">
            @error('NumCarte')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
         @enderror
        </div>
        <div>
           <p class="text ">Date d'Expiration</p>
            <input  type="text" name="DateExp" placeholder="MM/YYYY">
            @error('DateExp')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
         @enderror
        </div>
       <div>
           <p class="text ">CVV/CVC</p>
            <input  type="password" name="password" placeholder="***">
            @error('password')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
         @enderror
         <input type="hidden" name="prixTotal" value="{{ $prixTotal }}">
        </div>
    <button class="btn btn-dark mt-2" type="submit">entrer le Paiement</button>
</form>

 {{--   pour table commandes_details --}}
<form method="POST" action="/validerCommande">
    @csrf


    @foreach (session('cart') as $id => $details)
           <input type="hidden" name="cart[{{ $id }}][name]" value="{{ $details['name'] }}">
           <input type="hidden" name="cart[{{ $id }}][quantity]" value="{{ $details['quantity'] }}">
           <input type="hidden" name="cart[{{ $id }}][price]" value="{{ $details['price'] }}">

    @endforeach
    <button class='btn btn-danger mt-2' type="submit">Valider la commande</button>
</form>


</div>
</div>
@endsection



