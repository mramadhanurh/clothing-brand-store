@extends('layouts.home')

@section('title', 'Data Produk')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Upload Image Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/produk/'.$produk->id.'/upload-gambar') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="images">Upload Gambar (bisa pilih lebih dari satu):</label>
                                <input type="file" name="images[]" multiple class="form-control @error('images') is-invalid @enderror" accept="image/*">

                                <span class="invalid-feedback" role="alert" id="error-images">
                                    <strong></strong>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Upload</button>
                        </form>

                        <hr>
                        <h5>Gambar Saat Ini:</h5>
                        <div class="row">
                            @foreach($produk->images as $img)
                            <div class="col-md-3 mb-4 text-center">
                                <img src="{{ asset('storage/'.$img->image) }}" class="img-fluid mb-2" alt="img">

                                <form action="{{ route('produk.image.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bx bx-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection

@section('js')
    @if (session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            text: "{{ session('status') }}",
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        });
    </script>
    @endif
@endsection