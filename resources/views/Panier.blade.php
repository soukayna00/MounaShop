<div>
    @extends('EspaceClient')
    @section('title','Panier')
    @section('content')

    <style>
     .panier{
        height: fit-content;
        padding: 33px;
        padding-top:60px;
        background-image: url({{ asset('img/background-categorie.jpg') }});
     }
     table{
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 4px );
        background-color: rgba(0, 0, 0, 0.223);
        -webkit-backdrop-filter: blur( 4px );
        color: white;
        border-radius: 30px;
     }
     th{
    padding: 20px;
    text-align: center;
    font-size: 20px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
    td{
        text-align: center;

        padding: 10px;
        width: fit-content;
        height: fit-content;
    }
    </style>


    <div class="panier">
    <h4 class="display-4">Votre Panier</h4>
    <table  width='100%'>
        <thead>
        <tr>
            <th scope="col">Nom de Produit</th>
            <th scope="col">Photo</th>
            <th scope="col">Prix</th>
            <th scope="col">Quantité</th>
            <th scope='col'>Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
       <tbody>
                <?php $total=0 ?>
             @if (session('cart'))
             @foreach (session('cart') as $id => $details )
             <?php $total+=$details['price'] * $details['quantity']  ; session()->put('total',$total) ?>
             <tr>
                <td>{{$details['name']}}</td>
                <td><img src="{{ asset('img/'.$details['image']) }}" width="100" height="100" class="img-responsive"/></td>
                <td>{{$details['price']}}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                </td>
                <td>{{ $details['price'] * $details['quantity'] }}-DH</td>
                <td class="actions" data-th="">
                        <button class="btn btn-dark btn-sm update-cart" data-id="{{ $id }}">Modifier</button>
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}">Supprimer</button>
                    </td>
            </tr>
             @endforeach
             @endif
    </tbody>
    <tfoot>

        <tr>
            <td colspan="2" class="hidden-xs"></td>
            <td style="color:rgb(18, 81, 18);font-size:20px " class="hidden-xs text-left"><strong>Total à payer : {{ $total }} DH</strong></td>
        </tr>
        </tfoot>

  </table>
  <td><a href="{{ url('/') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i> Retour</a></td>
  <td><a href="{{ url('/livraison') }}" class="btn btn-dark"><i class="fa fa-angle-left"></i>suivant</a></td>


</div>
  @endsection
  @section('scripts')
<script>



// this function is for update card
        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("vous etes sur de vouloire supprimer cet article de votrre panier ?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();

                    }
                });
            }
        });

    </script>

@endsection

  </div>
