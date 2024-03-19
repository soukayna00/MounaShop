<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->

    @extends('parent')
    @section('title','commandes')
    @section('content')
    <div>
        <p class="display-2">Liste des Commandes</p>
         <table>
            <tr>
                <th>product_id</th>
                <th>product_name</th>
                <th>quantity</th>
                <th>price</th>
            </tr>
                @foreach($detailCommande as $item)
                <td>{{$item->product_id}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                @endforeach

         </table>
    </div>

    @endsection

</div>
