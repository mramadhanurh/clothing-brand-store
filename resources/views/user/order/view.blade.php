@extends('layouts.home')

@section('title', 'Data Detail Order')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="py-3 mb-4" style="text-align: right;"><span class="text-muted fw-light">Home /</span> Data Detail Order</h5>

        <div class="row">
            <div class="card">
                <h5 class="card-header">Data Detail Order</h5>
                <div class="table-responsive text-nowrap">

                    <br><br><br>
                    <div class="row">
                        <div class="col-md-5">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="border p-2">{{ $order->nama_lengkap }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="border p-2">{{ $order->email }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Hp/WA</label>
                                <div class="border p-2">{{ $order->no_hp }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <div class="border p-2">{{ $order->alamat }}</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="border p-2">
                                    @if($order->status == 0)
                                        <span class="badge bg-label-warning">Proses</span>
                                    @elseif($order->status == 1)
                                        <span class="badge bg-label-success">Selesai</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>Order Details</h5>
                            <hr>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($order->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->nama_produk }}</td>
                                        <td class="text-center">{{ $item->qty }}</td>
                                        <td class="text-center">{{ $item->harga }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $item->products->image) }}" width="50px" alt="Product Image">
                                            
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-warning text-center">
                                        Tidak ada item yang tersedia.
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <br>
                            <h4 class="float-end">Grand Total: Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5" />
    </div>

    <!-- / Content -->

    @include('layouts.footer')

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->

@endsection