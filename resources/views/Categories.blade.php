@extends('EspaceClient')

@section('title', 'Les Catégories')

<style>
    /* ===== BEIGE BACKGROUND (LUXURY FEEL) ===== */
    .ListerCategories {
        min-height: 100vh;
        padding: 90px 30px;
        background: #f5f0e6; /* soft beige */
        color: #2b2b2b;
    }

    /* TITLE */
    .ListerCategories h1 {
        text-align: center;
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 55px;
        color: #2b2b2b;
        letter-spacing: 1px;
    }

    /* GRID */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 22px;
        max-width: 1050px;
        margin: auto;
    }

    /* CARD (smaller + more elegant) */
    .category-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        height: 220px; /* adjusted size */
        background: #fff;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: 0.3s ease;
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.12);
    }

    /* IMAGE */
    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s ease;
    }

    .category-card:hover img {
        transform: scale(1.06);
    }

    /* DARK OVERLAY FOR TEXT READABILITY */
    .category-card::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 55%;
        background: linear-gradient(to top, rgba(0,0,0,0.65), transparent);
    }

    /* CATEGORY NAME */
    .category-name {
        position: absolute;
        bottom: 12px;
        left: 12px;
        font-size: 1.1rem;
        font-weight: 700;
        color: #fff;
        z-index: 2;
    }

    /* SMALL BADGE */
    .category-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255,255,255,0.8);
        color: #333;
        font-size: 11px;
        padding: 4px 10px;
        border-radius: 20px;
        z-index: 2;
        font-weight: 500;
    }

    /* LINK */
    .category-card a {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    /* RESPONSIVE IMPROVEMENT */
    @media (max-width: 768px) {
        .category-card {
            height: 200px;
        }

        .ListerCategories h1 {
            font-size: 2.2rem;
        }
    }
</style>

@section('content')

<div class="ListerCategories">

    <h1>Explorez nos Catégories</h1>

    <div class="category-grid">

        @foreach ($categories as $category)

            <a href="/categories/{{$category->id}}/products">

                <div class="category-card">

                    <img src="{{ asset('img/'.$category->cat_image) }}"
                         alt="{{ $category->cat_name }}">

                    <div class="category-badge">Collection</div>

                    <div class="category-name">
                        {{ $category->cat_name }}
                    </div>

                </div>

            </a>

        @endforeach

    </div>

</div>

@endsection
