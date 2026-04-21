<div>
    @extends('EspaceClient')

    @section('title','Checkout')

    <style>
        /* ===== PAGE (MATCH YOUR BEIGE STYLE) ===== */
        .checkout-page {
            min-height: 100vh;
            padding: 110px 20px 60px; /* FIXED TOP PADDING FOR NAVBAR */
            background: #f5f0e6; /* your beige theme */
            font-family: Arial, sans-serif;
        }

        /* ===== CONTAINER ===== */
        .checkout-container {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 25px;
        }

        /* ===== LEFT SIDE ===== */
        .checkout-form {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #2b2b2b;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            margin-top: 10px;
            display: block;
            color: #444;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        input:focus {
            border-color: #2b2b2b;
            box-shadow: 0 0 0 3px rgba(0,0,0,0.05);
        }

        /* ===== RIGHT SIDE ===== */
        .order-summary {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            height: fit-content;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 10px;
            color: #444;
        }

        .summary-total {
            border-top: 1px solid #eee;
            margin-top: 15px;
            padding-top: 15px;
            font-weight: 700;
            font-size: 16px;
            color: #2b2b2b;
        }

        .muted {
            font-size: 12px;
            color: #777;
        }

        /* ===== BUTTONS (MATCH YOUR DARK BUTTON STYLE) ===== */
        .btn-pay {
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            border: none;
            background: #111;
            color: white;
            font-weight: 600;
            transition: 0.3s ease;
            margin-top: 10px;
        }

        .btn-pay:hover {
            background: #ff3b3b;
            transform: translateY(-2px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 900px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @section('content')

    <div class="checkout-page">

        <div class="checkout-container">

            <!-- LEFT -->
            <div class="checkout-form">

                @include('incs.flash')

                <div class="section-title">Livraison</div>

                <form action="processForm" method="POST">
                    @csrf

                    <label>Adresse</label>
                    <input type="text" name="shipping_address">

                    <label>Ville</label>
                    <input type="text" name="shipping_city">

                    <label>Code postal</label>
                    <input type="text" name="shipping_postal_code">

                    <div class="section-title" style="margin-top:20px;">
                        Informations personnelles
                    </div>

                    <label>Nom complet</label>
                    <input type="text" name="name">

                    <label>Email</label>
                    <input type="email" name="email">

                    <label>Téléphone</label>
                    <input type="text" name="phone_number">

                    <button class="btn-pay">Continuer</button>
                </form>

                <div class="section-title" style="margin-top:30px;">
                    Paiement
                </div>

                <?php
                    $total = session()->get('total');
                    $tva = $total * 0.1;
                    $prixTotal = $total + $tva;
                ?>

                <form action="/processPaiement" method="POST">
                    @csrf

                    <label>Numéro de carte</label>
                    <input type="text" name="NumCarte">

                    <label>Expiration</label>
                    <input type="text" name="DateExp">

                    <label>CVV</label>
                    <input type="password" name="password">

                    <input type="hidden" name="prixTotal" value="{{ $prixTotal }}">

                    <button class="btn-pay">
                        Payer {{ $prixTotal }} DH
                    </button>
                </form>

            </div>

            <!-- RIGHT -->
            <div class="order-summary">

                <div class="section-title">Résumé de commande</div>

                @foreach (session('cart') as $id => $details)

                    <div class="product-item">
                        <span>{{ $details['quantity'] }}x {{ $details['name'] }}</span>
                        <span>{{ $details['price'] * $details['quantity'] }} DH</span>
                    </div>

                @endforeach

                <div class="summary-total">
                    Total: {{ session()->get('total') }} DH
                </div>

                <div class="muted">
                    TVA incluse (10%)
                </div>

                <form method="POST" action="/validerCommande">
                    @csrf

                    @foreach (session('cart') as $id => $details)
                        <input type="hidden" name="cart[{{ $id }}][name]" value="{{ $details['name'] }}">
                        <input type="hidden" name="cart[{{ $id }}][quantity]" value="{{ $details['quantity'] }}">
                        <input type="hidden" name="cart[{{ $id }}][price]" value="{{ $details['price'] }}">
                    @endforeach

                    <button class="btn-pay" style="margin-top:15px;">
                        Confirmer commande
                    </button>

                </form>

            </div>

        </div>

    </div>

    @endsection
</div>
