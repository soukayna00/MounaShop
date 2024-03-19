<style>

    #catalogue-card
{
    border :1 solid rgba(194, 194, 187, 0.49);
    align-items: center;
    justify-content: center;
    padding: 4px;
    height: 50vh;
    border-radius: 20px;
    margin : 5px;

}
#catalogue-card>h5{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size:35px;
    /* color: orange */

}
#catalogue-card>p{
    font-size:20px
}

</style>

<div>

    <!-- An unexamined life is not worth living. - Socrates -->
    <h1>Notre Catalogue</h1>
    <h2>Liste des Produits</h2>

    <div  class="card-deck">
        @foreach ($products as $item)
        <div id="catalogue-card" class="card">
            <img src="{{ public_path('img/' . $item['image']) }}" class="card-img-top" height="150px" alt="{{ $item['product_name'] }}">
            <div class="card-body">
                <h5 class="card-title">{{ $item['Product_name'] }}</h5>
                <p class="card-text">{{ $item['Description'] }}</p>
                <p class="card-text"><strong>{{ $item['price'] }}DH</strong></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
