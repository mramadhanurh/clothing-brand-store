@extends('layouts.home')

@section('title', 'Setting Iklan')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="py-3 mb-4" style="text-align: right;"><span class="text-muted fw-light">Home /</span> Setting Iklan</h5>

        <div class="row">
            <div class="card">
                <h5 class="card-header">Setting Iklan</h5>
                <div class="table-responsive text-nowrap">
                    <br><br><br>
                    <table id="basic-datatables" class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($iklans as $item)
                            <tr id="index_{{ $item->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/' . $item->gambar_iklan) }}" alt="Iklan Image" width="100">
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('iklan.edit', $item->id) }}" type="button" class="btn btn-warning btn-sm btn-flat" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="EDIT">
                                        <i class="bx bx-edit-alt me-1"></i>
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