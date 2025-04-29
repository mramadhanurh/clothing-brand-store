@extends('layouts.front')

@section('title', 'Shop')

@section('content')
    <!-- #Shop -->
    <section class="section product">
        <div class="container">
            <h2 class="h2 section-title">Shop</h2>

            <ul class="product-list">
                @foreach($product_shop as $item)
                <li>
                    <div class="product-card">
                        <figure class="card-banner">
                            <a href="{{ url('detail-products/'.$item->id_kategori.'/'.$item->id) }}">
                                <img src="{{ asset('storage/'.$item->image) }}" alt="Products of the week" loading="lazy" width="800" height="1034" class="w-100">
                            </a>
                            <div class="card-actions">
                                <a href="{{ url('detail-products/'.$item->id_kategori.'/'.$item->id) }}" class="card-action-btn" aria-label="Quick view">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                            </div>
                        </figure>

                        <div class="card-content">
                            <h3 class="h4 card-title">
                                <a href="#">{{ $item->nama_produk }}</a>
                            </h3>
                            <div class="card-price">
                                <data>Rp. {{ number_format( $item->harga, 0, ',', '.') }}</data>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </section>
@endsection
