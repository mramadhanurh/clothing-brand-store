@extends('layouts.front')

@section('title', 'Checkout')

@section('css')

<style>
    .container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .col {
        flex: 1;
    }

    .left-column {
        flex: 0 0 60%;
    }

    .right-column {
        flex: 0 0 38%;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .card-body {
        padding: 20px;
    }

    .card h5 {
        margin-bottom: 16px;
        font-size: 18px;
        color: #333;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        display: block;
        font-weight: 500;
        margin-bottom: 6px;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 16px;
    }

    .half-width {
        flex: 1;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        font-size: 14px;
    }

    .custom-table thead {
        background-color: #f8f9fa;
        text-align: left;
    }

    .custom-table th,
    .custom-table td {
        padding: 12px 10px;
        border-bottom: 1px solid #dee2e6;
    }

    .custom-table tr:last-child td {
        border-bottom: none;
    }

    .table-action {
        margin-top: 16px;
        text-align: center;
    }

    .btn-outline-full {
        width: 100%;
        padding: 12px;
        background-color: transparent;
        color: #007bff;
        border: 2px solid #007bff;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .btn-outline-full:hover {
        background-color: #007bff;
        color: white;
    }

    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .left-column,
        .right-column {
            flex: 1 0 100%;
        }

        .form-row {
            flex-direction: column;
        }

        .form-row .half-width {
            width: 100%;
        }

        .custom-table thead {
            display: none;
        }

        .custom-table tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 10px;
        }

        .custom-table tbody td {
            display: flex;
            justify-content: space-between;
            padding: 8px 10px;
        }

        .custom-table tbody td::before {
            content: attr(data-label);
            font-weight: bold;
            flex-basis: 50%;
        }
    }
</style>

@endsection

@section('content')

<div class="container">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col left-column">
                <div class="card">
                    <div class="card-body">
                        <h5>Basic Details</h5>
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group half-width">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="no_hp">No Hp/WA</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No Hp/WA">
                            </div>
                            <div class="form-group half-width">
                                <label for="alamat">Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col right-column">
                <div class="card">
                    <div class="card-body">
                        <h5>Order Details</h5>
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item->products->nama_produk }}</td>
                                    <td>{{ $item->produk_qty }}</td>
                                    <td>Rp {{ number_format($item->products->harga, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="table-action">
                            <button type="submit" class="btn-outline-full">Proses Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: `{{ session('status') }}`,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@endsection