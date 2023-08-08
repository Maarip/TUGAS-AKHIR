@extends('layouts.backend.master')
@section('title')
    Data Hotel
@endsection

@section('content')
    <div class="row">
        <!-- Bagian Tabel Daftar Hotels -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Hotel</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.hotel.create') }}" class="btn btn-success mb-3">Tambah hotel Baru</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Telepon</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $hotel)
                                <tr>
                                    <td>{{ $hotel->title }}</td>
                                    <td>{{ $hotel->phone }}</td>
                                    <td>{{ $hotel->harga }}</td>
                                    <td><img src="{{ asset('img/' . $hotel->image) }}" alt="Thumbnail" style="max-height: 50px;"></td>
                                    <td>
                                        <a href="{{ route('admin.hotel.edit', $hotel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.hotel.destroy', $hotel->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus hotel ini?')">Hapus</button>
                                        </form>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-title="{{ $hotel->title }}" data-image="{{ $hotel->image }}" data-tiket="{{ $hotel->harga }}" data-lokasi="{{ $hotel->lokasi }}" data-deskripsi="{{ $hotel->deskripsi }}">Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
