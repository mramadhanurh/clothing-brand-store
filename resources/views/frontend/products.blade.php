@extends('layouts.front')

@section('title', 'Produk')

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

    .contai {
        width: 90%;
        max-width: 1100px;
        margin: 0 auto;
    }
</style>

@endsection

@section('content')

<div class="breadcrumb-bar">
    <div class="contai">
        <h4 class="mb-0 breadcrumb-title">Collections / {{ $category->kategori }}</h4>
    </div>
</div>

<section class="section product">
    <div class="container">

        <h2 class="h2 section-title">{{ $category->kategori }}</h2>

        <ul class="product-list">
            @forelse ($products as $item)
            <li>
                <div class="product-card">
                    <figure class="card-banner">
                        <a href="{{ url('detail-products/'.$category->id.'/'.$item->id) }}">
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