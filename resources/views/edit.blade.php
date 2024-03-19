@extends('parent')
@section('title','Edit ')

@section('content')

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

<form action="/produits/{{$articles->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="Product_name">Product name</label>
       <input type="text" class="form-control"  id="Product_name" name="Product_name" value="{{ $articles->Product_name }}"
       >
    </div>
            @error('Product_name')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
            @enderror

      <div class="form-group">
                            <label for="Description">Description of the product</label>
                            <input type="text" class="form-control" id="Description" name="Description" value="{{ $articles->Description }}">
                        </div>
                      @error('Description')
                      <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
                      @enderror

    <div class="form-group">
      <label for="price">Price of the product</label>
      <input type="text" class="form-control"  id="Price" name="price" value={{ $articles->price }}>
    </div>
            @error('price')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
            @enderror

    <div class="form-group">
        <label for="image">{{ __('picture of the product') }}</label>
        <input id="image" type="file" class="form-control-file" name="image">
    </div>
    <div class="form-group">
        <label for="category">Categorie du produit</label>
        <input type="text" class="form-control"  id="title" name="category" value={{ $articles->category->cat_name }}>
      </div>
            @error('category')
            <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
            @enderror

    <button type="submit" class="btn btn-dark">Modifier</button>
  </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

