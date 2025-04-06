@extends('layouts.front')

@section('title', 'Produk')

@section('content')

<!-- #PRODUCT -->

<section class="section product">
    <div class="container">

        <h2 class="h2 section-title">{{ $category->kategori }}</h2>

        <ul class="product-list">
            @forelse ($products as $item)
            <li>
                <div class="product-card">
                    <figure class="card-banner">
                        <a href="#">
                            <img src="{{ asset('storage/'.$item->image) }}" loading="lazy" width="800" height="1034" class="w-100">
                        </a>
                        <div class="card-actions">
                            <button class="card-action-btn" aria-label="Quick view">
                                <ion-icon name="eye-outline"></ion-icon>
                            </button>
                            <button class="card-action-btn cart-btn">
                                <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                <p>Add to Cart</p>
                            </button>
                            <button class="card-action-btn" aria-label="Add to Whishlist">
                                <ion-icon name="heart-outline"></ion-icon>
                            </button>
                        </div>
                    </figure>

                    <div class="card-content">
                        <h3 class="h4 card-title">
                            <a href="#">{{ $item->nama_produk }}</a>
                        </h3>
                        <div class="card-price">
                            <data>Rp. {{ $item->harga }}</data>
                        </div>
                    </div>
                </div>
            </li>
            @empty
            <div class="alert alert-warning text-center">
                Tidak ada item products yang tersedia.
            </div>
            @endforelse
        </ul>

    </div>
</section>

@endsection