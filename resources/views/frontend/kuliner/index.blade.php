@extends('layouts.frontend.master')

@section('title')
    Pusat Oleh Oleh
@endsection

@section('content')
    <section class="kuliner mb-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Pusat Oleh Oleh</h2>
                <p class="text-muted">Rekomendasi Oleh Oleh Khas Wakatobi</p>
            </div>
            <div class="row">
                @forelse ($data as $item)
                    <div class="col-md-3 col-10">
                        <div class="card p-3 shadow-nih rounded-15">
                            <img src="{{asset('img/' . $item->image)}}" style="width:100%; height:200px;"
                                class="rounded-15" alt="">

                            <h4 class="mt-4">{{ $item->title }}</h4>
                            <p>Rp {{ number_format($item->harga) }}</p>
                            <a href="https://wa.me/+62{{ $item->phone }}" class="btn btn-outline-info w-100">Beli Sekarang</a>
                        </div>
                    </div>
                @empty

                <div class="col-12">
                    <h2>Masih Kosong</h2>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
