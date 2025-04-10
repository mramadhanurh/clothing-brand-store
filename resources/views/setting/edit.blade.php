@extends('layouts.home')

@section('title', 'Setting Store')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Store</h5>
                    </div>
                    <div class="card-body">
                        <form id="submitForm">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama Web</label>
                                <input type="text" class="form-control @error('web_name') is-invalid @enderror" id="web_name" name="web_name" value="{{ $setting->web_name }}" />

                                <span class="invalid-feedback" role="alert" id="error-web_name">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $setting->address }}" />

                                <span class="invalid-feedback" role="alert" id="error-address">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ $setting->description }}</textarea>

                                <span class="invalid-feedback" role="alert" id="error-description">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Hp</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $setting->phone_number }}" />

                                <span class="invalid-feedback" role="alert" id="error-phone_number">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $setting->email }}" />

                                <span class="invalid-feedback" role="alert" id="error-email">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image Logo Web</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $setting->image_logo_web) }}" width="200" height="auto" alt="Image Logo Web" style="padding: 20px">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control @error('image_logo_web') is-invalid @enderror" id="image_logo_web" name="image_logo_web" accept="image/*" />
                                        <small class="text-danger">*Abaikan jika tidak ingin
                                            memperbarui image. File format png/jpg/svg, maksimal 2MB.</small>
                                    </div>
                                </div>

                                <span class="invalid-feedback" role="alert" id="error-gambar_iklan">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ $setting->facebook }}" />

                                <span class="invalid-feedback" role="alert" id="error-facebook">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ $setting->instagram }}" />

                                <span class="invalid-feedback" role="alert" id="error-instagram">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Whatsapp</label>
                                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ $setting->whatsapp }}" />

                                <span class="invalid-feedback" role="alert" id="error-whatsapp">
                                    <strong></strong>
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
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
                url: "{{ route('setting.update', $setting->id) }}",
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
                        window.location.href = "/setting/1/edit";
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