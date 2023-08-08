@extends('layouts.backend.master')
@section('title')
    Daftar Wisata
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-9">
                                <label for="cari" class="form-label">Cari Kata Kunci</label>
                                <input type="text" name="cari" class="form-control" autocomplete="off" id="cari">
                            </div>
                            <div class="col-md-3">
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                    <button onClick="window.location.reload()" class="btn btn-danger">
                                        <i class="bi bi-arrow-clockwise"></i> Reload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>LOKASI</th>
                                    <th>HARGA TIKET</th>
                                    <th>IMAGE</th>
                                    <th>ACTION</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-bold-500">{{ $item->title }}</td>
                                        <td>{{ $item->longitude }} | {{ $item->latitude }}</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>
                                            <img src="{{ asset('img/' . $item->image) }}" width="100" alt="">
                                        </td>
                                        <td class="text-bold-500">
                                            <a href="{{ route('admin.wisata.edit', $item->id) }}"
                                                class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i> Edit</a>
                                            <form action="{{ route('admin.wisata.destroy', $item->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn icon btn-danger mt-2"><i
                                                        class="bi bi-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
