<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->

    @extends('parent')
    @section('title','commandes')
    @section('content')
    <div>
        <p class="display-2">Liste des Commandes</p>
         <table>
            <tr>
                <th>ID_client</th>
                <th>date_Commande</th>
                <th>Adresse Livraison</th>
                <th>ville</th>
                <th>totalPayer</th>
                <th>etat</th>
                <th>action</th>
            </tr>
                @foreach($commandes as $commande)
                <tr>
                <td>{{$commande->id}}</td>
                <td>{{$commande->date_Commande}}</td>
                <td>{{$commande->Adresse_Livraison}}</td>
                <td>{{$commande->ville}}</td>
                <td>{{$commande->totalPayer}}</td>
                <td>{{$commande->etat}}</td>
                <td><a href="/detailCommande/{id}"><button type="">detail Commmande</button></a></td>

                </tr>
                @endforeach
         </table>
    </div>

    @endsection

</div>
