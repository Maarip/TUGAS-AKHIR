@extends('layouts.backend.master')
@section('title')
    List Oleh Oleh
@endsection

@section('content')
    <div class="row">
        <!-- Bagian Tabel Daftar Kuliners -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Kuliner</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.kuliner.create') }}" class="btn btn-success mb-3">Tambah Kuliner Baru</a>
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
                            @foreach ($data as $kuliner)
                                <tr>
                                    <td>{{ $kuliner->title }}</td>
                                    <td>{{ $kuliner->phone }}</td>
                                    <td>{{ $kuliner->harga }}</td>
                                    <td><img src="{{ asset('img/' . $kuliner->image) }}" alt="Thumbnail" style="max-height: 50px;"></td>
                                    <td>
                                        <a href="{{ route('admin.kuliner.edit', $kuliner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.kuliner.destroy', $kuliner->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kuliner ini?')">Hapus</button>
                                        </form>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-title="{{ $kuliner->title }}" data-image="{{ $kuliner->image }}" data-tiket="{{ $kuliner->harga }}" data-lokasi="{{ $kuliner->lokasi }}" data-deskripsi="{{ $kuliner->deskripsi }}">Detail</button>
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
