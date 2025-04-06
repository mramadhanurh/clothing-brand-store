@extends('layouts.front')

@section('title', 'Kategori')

@section('content')

<!-- #Category -->

<section class="section product">
    <div class="container">

        <h2 class="h2 section-title">Category</h2>

        <ul class="product-list">
            <div class="owl-carousel category-carousel owl-theme">
                @foreach($category as $item)
                <li>
                    <div class="product-card item">
                        <figure class="card-banner">
                            <a href="{{ url('view-category/'.$item->id) }}">
                                <img src="{{ asset('storage/'.$item->image_kategori) }}" loading="lazy" width="800" height="1034" class="w-100">
                            </a>
                            <div class="card-actions">
                            </div>
                        </figure>

                        <div class="card-content">
                            <h3 class="h4 card-title">
                                <a href="#">{{ $item->kategori }}</a>
                            </h3>
                        </div>
                    </div>
                </li>
                @endforeach
            </div>

        </ul>

    </div>
</section>

@endsection

@section('js')

<script>
    $('.category-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>

@endsection