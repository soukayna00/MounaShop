<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
@extends('parent')
@section('title','Categories')

@section('content')
<div class="content-1">
    <p class="display-2">Liste des Categories</p>
       <a href="{{route('create')}}" role="button">
       <button class="btn btn-dark">Ajouter une Nouvelle categorie</button></a>
   </div>
<table style="width: 100%">
    <thead>
        <tr>
          <th scope="col">Nom de Catgorie</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->cat_name}}</td>
            <td><img src="{{ asset('img/'.$category->cat_image) }}" class="img-fluid" width="100"></td>
            <td> <div class="buttons">
            <a class="btn-modifier" style="margin-left: auto"  href="/categories/{{$category->id}}/edit">
            <img src="{{ asset('img/edit.png') }}" width="20px" alt="">
            </a>&nbsp;&nbsp;
            <form action="/categories/{{$category->id}}" method="POST">
                @csrf
                @method('delete')
            <button class="btn btn-delete btn-sm" type="submit"><a href="" style="color: rgb(241, 10, 10); "><i class="fas fa-trash"></i></a></button>

            </form>
        </tr>
        @endforeach

       </tbody>
    </table>



@endsection
</div>


