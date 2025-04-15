@extends('layouts.home')

@section('title', 'Dashboard Admin')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('template/assets/img/icons/unicons/chart-success.png') }}" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                    <a class="dropdown-item" href="/kategori">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="d-block mb-1">Kategori</span>
                        <h3 class="card-title text-nowrap mb-2">{{ $vkategori }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('template/assets/img/icons/unicons/chart-success.png') }}" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="/produk">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-medium d-block mb-1">Produk</span>
                        <h3 class="card-title mb-2">{{ $vproduk }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('template/assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="/orders">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-medium d-block mb-1">Pesanan</span>
                        <h3 class="card-title mb-2">{{ $vorder }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('template/assets/img/icons/unicons/chart-success.png') }}" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="/pengguna">View More</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-medium d-block mb-1">User</span>
                        <h3 class="card-title mb-2">{{ $vuser }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">

                    <h5 class="card-header m-0 me-2 pb-3">Data Pesanan</h5>
                    <!-- <div id="totalRevenueChart" class="px-2"></div> -->
                    <canvas id="barChart" style="max-width: 100%; height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@include('layouts.footer')

<div class="content-backdrop fade"></div>
</div>

@endsection

@section('js')

<script>
    $(function () {
        var datas = @json($datas);
        var barCanvas = $("#barChart");
        var barChart = new Chart(barCanvas, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Data Pesanan, {{ date("Y") }}',
                    data: datas,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>

@endsection