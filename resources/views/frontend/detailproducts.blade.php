@extends('layouts.front')

@section('title', $products->nama_produk)

@section('css')

<style>
    .breadcrumb-bar {
        padding: 16px;
        background-color: #80c2bd;
        border-top: 1px solid #e0a800;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 50px;
    }

    .breadcrumb-title {
        color: white;
    }

    .container {
        width: 90%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 50px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-left {
        flex: 1 1 40%;
        padding: 10px;
    }

    .col-right {
        flex: 1 1 60%;
        padding: 10px;
    }

    .product-image {
        width: 100%;
        border-radius: 8px;
    }

    .product-title {
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .product-description {
        margin-bottom: 10px;
        color: #555;
    }

    .product-status {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 14px;
        color: #fff;
        font-weight: bold;
    }

    .bg-success {
        background-color: #28a745;
    }

    .bg-danger {
        background-color: #dc3545;
    }

    .qty-control {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .qty-control button {
        padding: 6px 10px;
        font-size: 16px;
        margin: 0 5px;
        cursor: pointer;
    }

    .qty-control input {
        width: 50px;
        text-align: center;
        padding: 5px;
        font-size: 16px;
    }

    .add-to-cart-btn {
        padding: 10px 20px;
        background-color: #28a745;
        border: none;
        color: #fff;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    .add-to-cart-btn:hover {
        background-color: #218838;
    }
</style>

@endsection

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <h4 class="mb-0 breadcrumb-title">Collections / {{ $products->kategori->kategori }} / {{ $products->nama_produk }}</h4>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="row">
            <div class="col-left">
                <img src="{{ asset('storage/'.$products->image) }}" alt="Product Image" class="product-image">
            </div>
            <div class="col-right">
                <div class="product-title">{{ $products->nama_produk }}</div>
                <hr>
                <br>
                <div class="product-price">Rp {{ $products->harga }}</div>
                
                @if($products->qty > 0)
                    <div class="product-status">
                        Status: <span class="badge bg-success">Ready</span>
                    </div>
                @else
                    <div class="product-status">
                        Status: <span class="badge bg-danger">Not Ready</span>
                    </div>
                @endif
                <br>
                <div class="qty-control">
                    <button onclick="decreaseQty()">-</button>
                    <input type="number" id="qty" value="1" min="1">
                    <button onclick="increaseQty()">+</button>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
                <div class="product-description">
                    <br><br>
                    Deskripsi : <br><br>
                    {{ $products->deskripsi }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    function decreaseQty() {
        var qty = document.getElementById('qty');
        if (qty.value > 1) qty.value--;
    }

    function increaseQty() {
        var qty = document.getElementById('qty');
        qty.value++;
    }
</script>

@endsection