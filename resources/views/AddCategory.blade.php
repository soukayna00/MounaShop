<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->

@extends('parent')
@section('title','add categories')

@section('content')

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
    <div  class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" >
                        <form  method="POST" action="/categories" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="cat_name">{{ __('Nom de categorie') }}</label>
                                <input id="cat_name" type="text" class="form-control"   name="cat_name">
                                    @error('cat_name')
                                     <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>
                                    @enderror
                            </div>




                            <div class="form-group">
                                <label for="cat_image">{{ __('ajouter une image') }}</label>
                                <input id="cat_image" type="file" class="form-control-file" name="cat_image">
                                @error('cat_image')
                                <div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">X</button> {{ $message }} </div>

                                @enderror
                            </div>


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


</div>
