@extends('layouts.home')

@section('title', 'Data Order')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="py-3 mb-4" style="text-align: right;"><span class="text-muted fw-light">Home /</span> Data Order</h5>

        <div class="row">
            <div class="card">
                <h5 class="card-header">Data Order</h5>
                <div class="table-responsive text-nowrap">

                    <br><br><br>
                    <table id="basic-datatables" class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($orders as $item)
                            <tr id="index_{{ $item->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td class="text-center">
                                    {{ $item->email }}
                                </td>
                                <td class="text-center">
                                    @if($item->status == 0)
                                        <span class="badge bg-label-warning">Proses</span>
                                    @elseif($item->status == 1)
                                        <span class="badge bg-label-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('view-myorder/'.$item->id) }}" type="button" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="DETAIL">
                                        <i class="bx bx-show-alt me-1"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-warning text-center">
                                    Tidak ada item yang tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
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

@section('js')
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable();


        });
    </script>
@endsection