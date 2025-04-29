@extends('layouts.front')

@section('title', 'Beranda')

@section('content')

<!-- #HERO -->

<section class="hero" id="home" style="background-image: url('template_frontend/assets/images/clothingbrand-herobanner2.jpg')">
    <div class="container">
        <div class="hero-content">
            <!-- <p class="hero-subtitle">Fashion Everyday</p>
            <h2 class="h1 hero-title">Unrivalled Fashion House</h2> -->
            <button onclick="window.location=`{{ url('shop') }}`" class="btn btn-primary">Shop Now</button>
        </div>
    </div>
</section>

<!-- #SERVICE -->

<section class="service">
    <div class="container">
        <ul class="service-list">

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="{{ asset('template_frontend/assets/images/service-icon-1.svg') }}" alt="Service icon">
                </div>

                <div class="service-content">
                    <p class="service-item-title">Free Shipping</p>
                    <p class="service-item-text">On All Order Over $599</p>
                </div>
            </li>

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="{{ asset('template_frontend/assets/images/service-icon-2.svg') }}" alt="Service icon">
                </div>

                <div class="service-content">
                    <p class="service-item-title">Easy Returns</p>
                    <p class="service-item-text">30 Day Returns Policy</p>
                </div>
            </li>

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="{{ asset('template_frontend/assets/images/service-icon-3.svg') }}" alt="Service icon">
                </div>

                <div class="service-content">
                    <p class="service-item-title">Secure Payment</p>
                    <p class="service-item-text">100% Secure Gaurantee</p>
                </div>
            </li>

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="{{ asset('template_frontend/assets/images/service-icon-4.svg') }}" alt="Service icon">
                </div>

                <div class="service-content">
                    <p class="service-item-title">Special Support</p>
                    <p class="service-item-text">24/7 Dedicated Support</p>
                </div>
            </li>

        </ul>
    </div>
</section>

<!-- #CATEGORY -->

<section class="section category">
    <div class="container">

        <ul class="category-list">
            @foreach($category as $item)
            <li class="category-item">
                <figure class="category-banner">
                    <img src="{{ asset('storage/'.$item->image_kategori) }}" alt="Category List" loading="lazy" width="510" height="600" class="w-100">
                </figure>

                <a href="#" class="btn btn-secondary">{{ $item->kategori }}</a>
            </li>
            @endforeach
        </ul>

    </div>
</section>

<!-- #latest products -->

<section class="section product">
    <div class="container">

        <h2 class="h2 section-title">Latest Products</h2>

        <ul class="product-list">
            <div class="owl-carousel latest-carousel owl-theme">
                @foreach($latest_products as $item)
                <li>
                    <div class="product-card item">
                        <figure class="card-banner">
                            <a href="#">
                                <img src="{{ asset('storage/'.$item->image) }}" loading="lazy" width="800" height="1034" class="w-100">
                            </a>
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
            </div>

        </ul>

    </div>
</section>

<!-- #PRODUCT -->

<section class="section product">
    <div class="container">

        <h2 class="h2 section-title">Products of the week</h2>

        <ul class="product-list">
            @foreach($products_week as $item)
            <li>
                <div class="product-card">
                    <figure class="card-banner">
                        <a href="{{ url('detail-products/'.$item->id_kategori.'/'.$item->id) }}">
                            <img src="{{ asset('storage/'.$item->image) }}" alt="Products of the week" loading="lazy" width="800" height="1034" class="w-100">
                        </a>
                        <div class="card-actions">

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

        <button onclick="window.location=`{{ url('shop') }}`" class="btn btn-outline">View All Product</button>

    </div>
</section>

<!-- #BLOG -->

<!-- <section class="section blog">
    <div class="container">

        <h2 class="h2 section-title">Latest fashion news</h2>

        <ul class="blog-list">

            <li>
                <div class="blog-card">

                    <figure class="card-banner">
                        <a href="#">
                            <img src="./assets/images/blog-1.jpg" alt="Worthy Cyber Monday Fashion From Casmart" loading="lazy" width="1020" height="700" class="w-100">
                        </a>
                    </figure>

                    <div class="card-content">

                        <ul class="card-meta-list">

                            <li class="card-meta-item">
                                <ion-icon name="folder-open-outline"></ion-icon>

                                <a href="#" class="card-meta-link">Fashion</a>
                            </li>

                            <li class="card-meta-item">
                                <ion-icon name="time-outline"></ion-icon>

                                <a href="#" class="card-meta-link">
                                    <time datetime="2021-03-31">31 Mar 2021</time>
                                </a>
                            </li>

                        </ul>

                        <h3 class="h3 card-title">
                            <a href="#">Worthy Cyber Monday Fashion From Casmart</a>
                        </h3>

                    </div>

                </div>
            </li>

            <li>
                <div class="blog-card">

                    <figure class="card-banner">
                        <a href="#">
                            <img src="./assets/images/blog-2.jpg" alt="Holiday Home Decoration I've Recently Ordered" loading="lazy" width="1020" height="700" class="w-100">
                        </a>
                    </figure>

                    <div class="card-content">

                        <ul class="card-meta-list">

                            <li class="card-meta-item">
                                <ion-icon name="folder-open-outline"></ion-icon>

                                <a href="#" class="card-meta-link">Fashion</a>
                            </li>

                            <li class="card-meta-item">
                                <ion-icon name="time-outline"></ion-icon>

                                <a href="#" class="card-meta-link">
                                    <time datetime="2021-03-31">31 Mar 2021</time>
                                </a>
                            </li>

                        </ul>

                        <h3 class="h3 card-title">
                            <a href="#">Holiday Home Decoration I've Recently Ordered</a>
                        </h3>

                    </div>

                </div>
            </li>

            <li>
                <div class="blog-card">

                    <figure class="card-banner">
                        <a href="#">
                            <img src="./assets/images/blog-3.jpg" alt="Unique Ideas for Fashion You Haven’t heard yet" loading="lazy" width="1020" height="700" class="w-100">
                        </a>
                    </figure>

                    <div class="card-content">

                        <ul class="card-meta-list">

                            <li class="card-meta-item">
                                <ion-icon name="folder-open-outline"></ion-icon>

                                <a href="#" class="card-meta-link">Fashion</a>
                            </li>

                            <li class="card-meta-item">
                                <ion-icon name="time-outline"></ion-icon>

                                <a href="#" class="card-meta-link">
                                    <time datetime="2021-03-31">31 Mar 2021</time>
                                </a>
                            </li>

                        </ul>

                        <h3 class="h3 card-title">
                            <a href="#">Unique Ideas for Fashion You Haven't heard yet</a>
                        </h3>

                    </div>

                </div>
            </li>

        </ul>

    </div>
</section> -->


@endsection


@section('sweetalert')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var imageUrl = "{{ isset($iklan->gambar_iklan) ? Storage::url('public/' . $iklan->gambar_iklan) : '' }}";
        var imageCaption = "{{ isset($iklan->judul) ? $iklan->judul : '' }}";
        var action = "{{ isset($iklan->aksi) ? $iklan->aksi : '' }}";

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                @if (!empty($iklan))
                    `@if ($iklan->aksi == 1)`
                    Swal.fire({
                        // imageUrl: imageUrl, // Ubah path gambar sesuai dengan lokasi dan nama gambar Anda
                        // imageWidth: 400, // Ubah lebar gambar sesuai kebutuhan
                        // imageHeight: 200, // Ubah tinggi gambar sesuai kebutuhan
                        imageAlt: 'Contoh Gambar', // Ubah teks alternatif gambar sesuai kebutuhan
                        html: "<div style='text-align: center;'><img src='" + imageUrl +
                            "' style='max-width: 100%; max-height: 100%;'><p style='font-weight: bold; font-size: 25px;'>" +
                            imageCaption + "</p></div>",
                        showCloseButton: true,
                        showConfirmButton: false,
                        customClass: {
                            closeButton: 'swal2-close' // Menggunakan custom class untuk tombol close
                        }
                    });
                    `@endif`
                @endif
            }, 1000);
        });
    </script>

@endsection

@section('js')

<script>
    $('.latest-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots:false,
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