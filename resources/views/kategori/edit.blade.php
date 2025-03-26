@extends('layouts.home')

@section('title', 'Data Kategori')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Kategori</h5>
                    </div>
                    <div class="card-body">
                        <form id="submitForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ $kategori->kategori }}" />

                                <span class="invalid-feedback" role="alert" id="error-kategori">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $kategori->image_kategori) }}" width="200" height="auto" alt="Image Kategori" style="padding: 20px">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control @error('image_kategori') is-invalid @enderror" id="image_kategori" name="image_kategori" accept="image/*" />
                                        <small class="text-danger">*Abaikan jika tidak ingin
                                            memperbarui image. File format png/jpg/svg, maksimal 2MB.</small>
                                    </div>
                                </div>

                                <span class="invalid-feedback" role="alert" id="error-image_kategori">
                                    <strong></strong>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-warning">
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
<script>
    $(document).ready(function() {
        $('#submitForm').on('submit', function(event) {
            event.preventDefault();

            $('.invalid-feedback').children('strong').text('');
            $('.form-control').removeClass('is-invalid');

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('kategori.update', $kategori->id) }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data berhasil diperbarui!",
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
                        window.location.href = "{{ route('kategori.index') }}";
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