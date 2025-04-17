@extends('layouts.front')

@section('title', 'Cart')

@section('css')

<style>

    .container {
        max-width: 900px;
        margin: auto;
        padding: 20px;
    }

    .card {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 20px;
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        flex-wrap: wrap;
    }

    .cart-item img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }

    .product-info {
        flex: 1;
        min-width: 150px;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .product-price {
        font-size: 14px;
        color: #555;
        margin-top: 4px;
        font-weight: bold;
    }

    .qty-container {
        text-align: center;
        min-width: 120px;
    }

    .qty-controls {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 5px;
    }

    .qty-btn {
        padding: 4px 10px;
        font-size: 16px;
        background: #eee;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .qty-input {
        width: 50px;
        text-align: center;
        padding: 4px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .remove-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        min-width: 80px;
    }

    .card-footer {
        border-top: 1px solid #ddd;
        padding: 16px;
        background-color: #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        font-size: 18px;
    }

    .btn-checkout {
        padding: 8px 16px;
        border: 2px solid #28a745;
        background-color: transparent;
        color: #28a745;
        border-radius: 5px;
        text-decoration: none;
        /* font-weight: bold; */
        transition: 0.3s ease;
    }

    .btn-checkout:hover {
        background-color: #28a745;
        color: #fff;
    }

    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 14px;
        color: #fff;
        font-weight: bold;
    }

    .bg-danger {
        background-color: #dc3545;
    }

    @media (max-width: 600px) {
        .cart-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .qty-container {
            text-align: left;
        }

        .remove-btn {
            align-self: flex-end;
            margin-top: 10px;
        }
    }
</style>

@endsection

@section('content')

<div class="container">
    <div class="card">
        @php $total = 0; @endphp
        @foreach ($cartitems as $item)
            <div class="cart-item product_data">
                <img src="{{ asset('storage/'.$item->products->image) }}" alt="Product Image Cart">

                <div class="product-info">
                    <div class="product-name">{{ $item->products->nama_produk }}</div>
                    <div class="product-price">
                        Harga: Rp {{ number_format($item->products->harga, 0, ',', '.') }}
                    </div>
                </div>

                <div class="qty-container">
                    Quantity:
                    <div class="qty-controls">
                        <input type="hidden" value="{{ $item->id_produk }}" class="prod_id">
                        @if($item->products->qty > $item->produk_qty)
                            <button class="decrement-btn qty-btn changeQuantity">-</button>
                            <input type="number" class="qty-input" name="quantity" value="{{ $item->produk_qty }}">
                            <button class="increment-btn qty-btn changeQuantity">+</button>
                            @php $total += $item->products->harga * $item->produk_qty ; @endphp
                        @else
                            <span class="badge bg-danger">Stok Qty Habis</span>
                        @endif
                    </div>
                </div>

                <button class="remove-btn delete-cart-item"><ion-icon name="trash-outline"></ion-icon> Remove</button>
            </div>
            
        @endforeach

        <div class="card-footer">
            <h5>Total Harga : Rp {{ number_format($total, 0, ',', '.') }}</h5>

            <a href="{{ url('checkout') }}" class="btn-checkout">Proses Checkout</a>
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
                    }).then((result) => {
                        if (result.isConfirmed) {
                            loadcart();
                        }
                    });
                }
            });

        });

        $('.increment-btn').click(function (e) { 
            e.preventDefault();
            
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });
        
        $('.decrement-btn').click(function (e) { 
            e.preventDefault();
            
            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.delete-cart-item').click(function (e) { 
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'prod_id' : prod_id,
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        text: response.status,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            });
        });

        $('.changeQuantity').click(function (e) { 
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            data = {
                'prod_id' : prod_id,
                'prod_qty' : qty,
            }
            $.ajax({
                method: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
        });

    });
</script>

@endsection