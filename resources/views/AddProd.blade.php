@extends('parent')
@section('title','add Produits')

@section('content')

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
    <div  class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" >
                        <form  method="POST" action="/produits" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="Product_name">{{ __('Name of the product') }}</label>
                                <input id="Product_name" type="text" class="form-control"   name="Product_name">
                                    @error('Product_name')
                                     <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="Description">{{ __('Description') }}</label>
                                <input id="Description" type="text" class="form-control"  name="Description">
                                @error('Description')
                                <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>

                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('price') }}</label>
                                <input id="price" type="text" class="form-control"  placeholder="set the price in DH" name="price">
                                @error('price')
                                <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>

                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Add a picture') }}</label>
                                <input id="image" type="file" class="form-control-file" name="image">
                                @error('image')
                                <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>

                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">{{ __('Category') }}</label>
                                <select  name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $categoryName)
                                        <option value="{{ $categoryName['id'] }}" >{{ $categoryName['cat_name'] }}</option>
                                    @endforeach
                                </select>





                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Submit') }}
                                </button>
                            </div>
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

