@extends('layouts.home')

@section('title', 'Data Kategori')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="py-3 mb-4" style="text-align: right;"><span class="text-muted fw-light">Home /</span> Data Kategori</h5>

        <div class="row">
            <div class="card">
                <h5 class="card-header">Data Kategori</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ route('kategori.create') }}" class="btn btn-success float-end">
                        Tambah Kategori
                    </a>
                    <br><br><br>
                    <table id="basic-datatables" class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($kategoris as $item)
                            <tr id="index_{{ $item->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/' . $item->image_kategori) }}" alt="Kategori Image" width="100">
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('kategori.edit', $item->id) }}" type="button" class="btn btn-warning btn-sm btn-flat" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="EDIT">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <a href="javascript:void(0);" id="delete-confirm" data-id="{{ $item->id }}" class="btn btn-danger btn-sm btn-flat" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="HAPUS">
                                        <i class="bx bx-trash me-1"></i>
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

            $('body').on('click', '#delete-confirm', function() {
                let post_id = $(this).data('id');
                let token = $("meta[name='csrf-token']").attr("content");

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Anda tidak akan bisa mengembalikan ini!",
                    icon: "warning",
                    buttons: {
                        confirm: {
                            text: "Ya, hapus!",
                            className: "btn btn-success",
                        },
                        cancel: {
                            visible: true,
                            text: "Batal",
                            className: "btn btn-danger",
                        },
                    },
                }).then((result) => {
                    if (result) {
                        $.ajax({
                            url: `/kategori/${post_id}`,
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": token
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Terhapus!",
                                    text: "Data berhasil dihapus.",
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success",
                                        },
                                    },
                                });

                                $(`#index_${post_id}`).remove();
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Terjadi kesalahan: " + (xhr
                                        .responseJSON.message || error),
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-danger",
                                        },
                                    },
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection