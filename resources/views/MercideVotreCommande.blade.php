@extends('EspaceClient')

@section('content')

<style>
    /* ===== PAGE BACKGROUND ===== */
    #MainContain {
        min-height: 100vh;
        padding: 120px 20px 60px; /* FIXED TOP SPACING */
        background: #f5f0e6; /* same beige theme */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===== CARD ===== */
    .confirm-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 30px;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        text-align: center;
    }

    /* HEADER */
    .card-header {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 20px;
        color: #2b2b2b;
    }

    /* TEXT */
    .confirm-card p {
        font-size: 15px;
        color: #555;
        margin-bottom: 10px;
    }

    /* LIST */
    .confirm-list {
        text-align: left;
        background: #fafafa;
        border-radius: 12px;
        padding: 15px;
        margin: 15px 0;
    }

    .confirm-list li {
        font-size: 14px;
        margin-bottom: 8px;
        color: #333;
    }

    /* TOTAL */
    .total {
        font-weight: 700;
        font-size: 16px;
        margin-top: 10px;
        color: #111;
    }

    /* BUTTON */
    .home-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #111;
        color: white;
        border-radius: 25px;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .home-btn:hover {
        background: #ff3b3b;
        transform: translateY(-2px);
    }
</style>

<div id="MainContain">

    <div class="confirm-card">

        <div class="card-header">
            Confirmation d'achat 
        </div>

        <p>Merci pour votre achat !</p>
        <p>Voici les détails de votre commande :</p>

        <ul class="confirm-list">

            @foreach (session('cart') as $id => $details)
                <li>
                    {{ $details['name'] }}
                    - Quantité: {{ $details['quantity'] }}
                    - Prix: {{ $details['price'] }} DH
                </li>
            @endforeach

        </ul>

        <div class="total">
            Total: {{ session()->get('total') }} DH
        </div>

        <a href="/" class="home-btn">
            Retour à l'accueil
        </a>

    </div>

</div>

@endsection
