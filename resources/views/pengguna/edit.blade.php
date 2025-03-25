@extends('layouts.home')

@section('title', 'Data User')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit User</h5>
                    </div>
                    <div class="card-body">
                        <form id="submitForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" />

                                <span class="invalid-feedback" role="alert" id="error-name">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" />

                                <span class="invalid-feedback" role="alert" id="error-email">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />

                                <small class="text-danger">*Kosongkan jika tidak ada pembaruan.</small>

                                <span class="invalid-feedback" role="alert" id="error-password">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role Akses</label>
                                <select id="is_admin" name="is_admin" class="form-select form-control @error('is_admin') is-invalid @enderror">
                                    <option selected value="" disabled>-- Pilih Role Akses --</option>
                                    <option value="1" {{ $user->is_admin == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ $user->is_admin == '0' ? 'selected' : '' }}>User</option>
                                </select>

                                <span class="invalid-feedback" role="alert" id="error-is_admin">
                                    <strong></strong>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <a href="{{ route('pengguna.index') }}" class="btn btn-warning">
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
                    url: "{{ route('pengguna.update', $user->id) }}",
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
                            window.location.href = "{{ route('pengguna.index') }}";
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