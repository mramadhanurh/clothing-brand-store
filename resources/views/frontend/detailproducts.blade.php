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
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 20px;
        background-color: #28a745;
        border: none;
        color: #fff;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    .add-to-cart-btn ion-icon {
        font-size: 25px;
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
    <div class="card product_data">
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
                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                    <button class="decrement-btn">-</button>
                    <input type="number" class="qty-input" name="quantity" value="1" min="1">
                    <button class="increment-btn">+</button>
                    @if($products->qty > 0)
                        <button class="add-to-cart-btn addToCartBtn">
                            Add to Cart
                            <ion-icon name="cart-outline" aria-hidden="true"></ion-icon>
                        </button>
                    @endif
                    
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

        $('.addToCartBtn').click(function (e) { 
            e.preventDefault();
            
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            // alert(product_id);
            // alert(product_qty);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id' : product_id,
                    'product_qty' : product_qty,
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        text: response.status,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            });

        });

        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            
            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.qty-input').val(value);
            }
        });
        
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            
            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.qty-input').val(value);
            }
        });

    });
</script>

@endsection