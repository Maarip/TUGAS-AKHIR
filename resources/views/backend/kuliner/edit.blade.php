@extends('layouts.backend.master')

@section('content')
    <h1>Ubah Oleh Oleh</h1>

    <form action="{{ route('admin.kuliner.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $data->phone }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="{{ $data->harga }}" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Kuliner</button>
    </form>
@endsection
