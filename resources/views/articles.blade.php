<div>
    @extends('parent')
 @section('content')
<div class="content-1">
 <p class="display-2">Liste des Produits</p>
    <a href="create" role="button">
    <button class="btn btn-dark">Ajouter un Nouveau produit</button></a>
</div>
<div class="Content-2">
 <table>
    <thead>
        <tr>
          <th scope="col">Product name</th>
          <th scope="col">Description</th>
          <th scope="col">Picture</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach($articles as $article)
        <tr>
        <td>{{$article->Product_name}}</td>
        <td>{{$article->Description}}</td>
        <td><img src="{{ asset('img/'.$article->image) }}" class="img-fluid" width="100"></td>
        <td>{{$article->price}}dh</td>
        <td>{{$article->category->cat_name}}</td>
        <td>
            <div class="buttons">
                 {{-- -modifier- --}}
                <a class="btn-modifier" style="margin-left: auto"  href="/produits/{{$article->id}}/edit">
                    <img src="{{ asset('img/edit.png') }}" width="20px" alt="">
                </a>&nbsp;&nbsp;

             {{-- -supprimer- --}}
               <form action="/produits/{{$article->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        <button class="btn btn-delete btn-sm" type="submit"><a href="" style="color: rgb(241, 10, 10); "><i class="fas fa-trash"></i></a></button>

                </form>
            </div>

        </td>
       </tr>
        @endforeach

    </tbody>
</div>


</table><br>
<td>  {{ $articles->links('pagination::bootstrap-4') }}</td>
</div>
 @endsection;
</div>

