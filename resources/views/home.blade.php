@extends('layouts.home')

@section('title', 'Dashboard User')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-cart-alt"></i></span>
                            </div>
                        </div>
                        <span class="d-block mb-1">Cart</span>
                        <h3 class="card-title text-nowrap mb-2">{{ $cartcount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-closet"></i></span>
                            </div>
                        </div>
                        <span class="fw-medium d-block mb-1">Order</span>
                        <h3 class="card-title mb-2">{{ $ordercount }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row">

                    <!-- Order Statistics -->
                    <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Cart List</h5>
                            </div>
                            <div class="card-body">
                                <ul class="p-0 m-0">
                                    @foreach ($cartitems as $item)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-cart-alt"></i></span>
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{ $item->products->nama_produk }}</h6>
                                                <small class="text-muted">Qty : {{ $item->produk_qty }}</small>
                                            </div>
                                            <div class="user-progress">
                                                <small class="fw-medium">Rp {{ number_format($item->products->harga, 0, ',', '.') }}</small>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Order Statistics -->

                    <!-- Transactions -->
                    <div class="col-md-6 col-lg-6 order-2 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Order List</h5>
                            </div>
                            <div class="card-body">
                                <ul class="p-0 m-0">
                                    @foreach ($orderitems as $item)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-closet"></i></span>
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1">{{ $item->nama_lengkap }}</small>
                                                <h6 class="mb-0">Total : Rp {{ number_format($item->total_harga, 0, ',', '.') }}</h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <h6 class="mb-0">
                                                    @if($item->status == 0)
                                                        <span class="badge bg-label-warning">Proses</span>
                                                    @elseif($item->status == 1)
                                                        <span class="badge bg-label-success">Selesai</span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Transactions -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@include('layouts.footer')

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->

@endsection