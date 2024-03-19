
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->

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

    <form action="/categories/{{$categories->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
          <label for="cat_name">Nom de categorie</label>
           <input type="text" class="form-control"  id="cat_name" name="cat_name" value="{{ $categories->cat_name }}"
           >
        </div>
                @error('cat_name')
                <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
                @enderror


        <div class="form-group">
            <label for="cat_image">{{ __('picture of the category') }}</label>
            <input id="cat_image" type="file" class="form-control-file" name="cat_image">
        </div>
        @error('cat_image')
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

