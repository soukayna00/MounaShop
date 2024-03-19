@extends('EspaceClient')

@section('title', 'Les Catégories ')

<style>
    .ListerCategories {
        padding: 80px;
        height: 100vh;
        overflow-y: auto;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-image: url({{ asset('img/background-categorie.jpg') }});

    }

    .ListerCategoriescards {
        border: 1px solid rgba(202, 199, 195, 0.818);
        border-radius: 170px;
        height: 100%;
        padding: 15px;
        margin: 25px;
        text-align: center;
        width: fit-content;
        background: rgba(244, 243, 239, 0.315);
        box-shadow: 0 4px 30px rgba(97, 97, 97, 0.1);
        backdrop-filter: blur(0.1px);
        -webkit-backdrop-filter: blur(0.1px);
        transition: transform 0.2s;
    }

    .ListerCategoriescards img {
        width: 150px;
        border-radius: 20px;
        margin-bottom: 10px;
    }

    .ListerCategoriescards h2 {
        color: rgb(61, 56, 56);
        font-size: 24px;
    }

    .ListerCategories h1 {
        color: rgb(47, 42, 42);
        font-size: 36px;
        margin-bottom: 30px;
    }

    .ListerCategoriescards:hover {
        transform: scale(1.05);
    }

    .ListerCategoriescards a {
        text-decoration: none;
        color: inherit;
    }
</style>

@section('content')
    
        <div class="ListerCategories">
            <h1>Explorez nos Catégories</h1>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="/categories/{{$category->id}}/products">
                            <div class="ListerCategoriescards">
                                <img src="{{ asset('img/'.$category->cat_image) }}" alt="{{ $category->cat_name }}" />
                                <h2>{{$category->cat_name}}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>





    </div>
@endsection
