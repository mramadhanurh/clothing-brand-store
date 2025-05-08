@extends('layouts.home')

@section('title', 'Data Produk')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Produk</h5>
                    </div>
                    <div class="card-body">
                        <form id="submitForm">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Masukkan Nama Produk" />

                                <span class="invalid-feedback" role="alert" id="error-nama_produk">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select id="id_kategori" name="id_kategori" class="form-select form-control @error('id_kategori') is-invalid @enderror" value="{{ old('id_kategori') }}">
                                    <option selected value="" disabled>-- Pilih Kategori --</option>
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>

                                <span class="invalid-feedback" role="alert" id="error-id_kategori">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga" />

                                <span class="invalid-feedback" role="alert" id="error-harga">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Qty</label>
                                <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty') }}" placeholder="Masukkan Qty" />

                                <span class="invalid-feedback" role="alert" id="error-qty">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select id="status" name="status" class="form-select form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                                    <option selected value="" disabled>-- Pilih Status --</option>
                                    <option value="1">Ready</option>
                                    <option value="0">Not Ready</option>
                                </select>

                                <span class="invalid-feedback" role="alert" id="error-status">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="summernote" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi" rows="3"></textarea>

                                <span class="invalid-feedback" role="alert" id="error-deskripsi">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" accept="image/*" />
                                <small class="text-danger">*File format png/jpg/svg, maksimal 2MB.</small>

                                <span class="invalid-feedback" role="alert" id="error-image">
                                    <strong></strong>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                            <a href="{{ route('produk.index') }}" class="btn btn-warning">
                                Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection

@section('js')
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Masukkan Deskripsi',
                tabsize: 2,
                height: 180,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
            });

            $('#submitForm').on('submit', function(event) {
                event.preventDefault();

                $('.invalid-feedback').children('strong').text('');
                $('.form-control').removeClass('is-invalid');

                var formData = new FormData(this);

                $.ajax({
                    url: `/produk`,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data berhasil disimpan!",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "Oke",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-success",
                                },
                            },
                        }).then(() => {
                            window.location.href = "{{ route('produk.index') }}";
                        });
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#error-' + key).children('strong').text(value[0]);
                                $('#' + key).addClass('is-invalid');
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Terjadi kesalahan: " + (xhr.responseJSON
                                    .message || error),
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                },
                            });
                        }
                    }
                });
            });

        });
    </script>
@endsection