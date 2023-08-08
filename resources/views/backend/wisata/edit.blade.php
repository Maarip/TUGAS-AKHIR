@extends('layouts.backend.master')
@section('title')
    Edit Produk : {{ $data->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@yield('title')</h4>
                </div>
                <div class="card-body">
                    {{-- route disini merupakan bagian edit yang membawa parameter id bisa dicek pada web.php --}}
                    <form class="form" action="{{ route('admin.wisata.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('img/' . $data->image) }}" class="img-fluid shadow-sm"
                                    style="border-radius: 14px;" id="blah">
                                <div class="mt-3">
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <div>
                                            Gambar hanya JPG dan PNG serta Maks Size 2 MB
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label">Nama Wisata</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $data->title }}" autocomplete="off">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Masukan Harga Tiket</label>
                                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                                name="harga" value="{{ $data->harga }}" autocomplete="off">
                                            @error('harga')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Google Maps</label>
                                            <input type="text" class="form-control @error('maps') is-invalid @enderror"
                                                name="maps" value="{{ $data->maps }}" autocomplete="off">
                                            @error('maps')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude Maps</label>
                                            <input type="text"
                                                class="form-control @error('longitude') is-invalid @enderror"
                                                name="longitude" value="{{ $data->longitude }}" autocomplete="off">
                                            @error('longitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude Maps</label>
                                            <input type="text"
                                                class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                                                value="{{ $data->latitude }}" autocomplete="off">
                                            @error('latitude')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Wisata</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" autocomplete="off" id="imgInp">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
