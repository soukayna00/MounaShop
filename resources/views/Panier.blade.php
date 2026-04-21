<div>
    @extends('EspaceClient')

    @section('title','Panier')

    @section('content')

    <style>
        /* ===== PAGE BACKGROUND (MATCH YOUR STYLE) ===== */
        .panier {
            min-height: 100vh;
            padding: 90px 20px;
            background: #f5f0e6; /* beige like categories */
        }

        /* TITLE */
        .panier h4 {
            text-align: center;
            font-weight: 800;
            margin-bottom: 40px;
            color: #2b2b2b;
        }

        /* ===== CART CARD WRAPPER ===== */
        .cart-wrapper {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #111;
            color: white;
        }

        th {
            padding: 18px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            text-align: center;
            padding: 18px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        /* PRODUCT IMAGE */
        td img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* INPUT */
        .quantity {
            width: 70px;
            text-align: center;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        /* BUTTONS */
        .btn-modern {
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 13px;
            transition: 0.3s ease;
        }

        .btn-modern:hover {
            transform: scale(1.05);
        }

        /* TOTAL */
        .cart-total {
            padding: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: 700;
            background: #fafafa;
        }

        .cart-total strong {
            color: #111;
        }

        /* ACTION BUTTONS */
        .cart-actions {
            display: flex;
            justify-content: space-between;
            max-width: 1100px;
            margin: 20px auto;
        }

        .cart-actions a {
            text-decoration: none;
        }

        .btn-nav {
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            background: #111;
            color: white;
            transition: 0.3s ease;
        }

        .btn-nav:hover {
            background: #ff3b3b;
        }

        /* EMPTY CART */
        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }
    </style>

    <div class="panier">

        <h4 class="display-5">Votre Panier</h4>

        <div class="cart-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Photo</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php $total = 0 ?>

                @if(session('cart'))

                    @foreach(session('cart') as $id => $details)

                        <?php
                            $total += $details['price'] * $details['quantity'];
                            session()->put('total', $total);
                        ?>

                        <tr>

                            <td>{{ $details['name'] }}</td>

                            <td>
                                <img src="{{ asset('img/'.$details['image']) }}">
                            </td>

                            <td>{{ $details['price'] }} DH</td>

                            <td>
                                <input type="number"
                                       value="{{ $details['quantity'] }}"
                                       class="form-control quantity">
                            </td>

                            <td>
                                {{ $details['price'] * $details['quantity'] }} DH
                            </td>

                            <td>

                                <button class="btn btn-dark btn-modern update-cart"
                                        data-id="{{ $id }}">
                                    Modifier
                                </button>

                                <button class="btn btn-danger btn-modern remove-from-cart"
                                        data-id="{{ $id }}">
                                    Supprimer
                                </button>

                            </td>

                        </tr>

                    @endforeach

                @else

                    <tr>
                        <td colspan="6" class="empty">
                            Votre panier est vide
                        </td>
                    </tr>

                @endif

                </tbody>

            </table>

            <div class="cart-total">
                Total à payer : <strong>{{ $total }} DH</strong>
            </div>

        </div>

        <!-- ACTIONS -->
        <div class="cart-actions">

            <a href="{{ url('/') }}">
                <button class="btn-nav">← Retour</button>
            </a>

            <a href="{{ url('/livraison') }}">
                <button class="btn-nav">Suivant →</button>
            </a>

        </div>

    </div>

    @endsection


    @section('scripts')
    <script>

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function () {
                    location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Supprimer cet article ?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function () {
                        location.reload();
                    }
                });
            }
        });

    </script>
    @endsection

</div>
