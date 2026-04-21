<div>

    @extends('parent')

    @section('title','Commandes')

    @section('content')

    <style>
        .orders-page {
            padding: 100px 20px;
            background: #f5f0e6; /* same beige theme */
            min-height: 100vh;
        }

        .orders-title {
            text-align: center;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 40px;
            color: #2b2b2b;
        }

        .orders-table {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #111;
            color: white;
        }

        th {
            padding: 15px;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
        }

        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
        }

        tr:hover {
            background: #fafafa;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>

    <div class="orders-page">

        <div class="orders-title">Liste des Commandes</div>

        <div class="orders-table">

            <table>

                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Nom Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($detailCommande as $item)

                        <tr>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }} DH</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="empty">
                                Aucune commande disponible
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    @endsection

</div>
