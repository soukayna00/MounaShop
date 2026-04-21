@extends('EspaceClient')

@section('title','Promotions')

@section('content')

<style>
    /* ===== FULL HERO SECTION ===== */
    .OnePage {
        height: 100vh;
        background-image: url({{ asset('img/red-sofa.jpg') }});
        background-size: cover;
        background-position: center;
        position: relative;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;

        padding: 20px;
    }

    /* DARK OVERLAY FOR READABILITY */
    .OnePage::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
    }

    /* TEXT CONTAINER */
    .text-promo {
        position: relative;
        z-index: 2;
        color: white;
        max-width: 800px;
    }

    .text-promo h1 {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    /* CTA BUTTON */
    .promo-btn {
        position: relative;
        z-index: 2;
        margin-top: 20px;
    }

    .promo-btn a {
        display: inline-block;
        padding: 12px 25px;
        background: #ffffff;
        color: #111;
        font-weight: 600;
        border-radius: 30px;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .promo-btn a:hover {
        background: #ff3b3b;
        color: #fff;
        transform: translateY(-2px);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .text-promo h1 {
            font-size: 2rem;
        }
    }
</style>

<div class="OnePage">

    <div class="text-promo">
        <h1>
            Découvrez nos promotions exceptionnelles et profitez jusqu’à -50%
        </h1>
    </div>

    <div class="promo-btn">
        <a href="/catalogue">
            Télécharger le catalogue des promotions
        </a>
    </div>

</div>

@endsection
