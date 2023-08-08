@extends('layouts.frontend.master')

@section('title')
    Hotel dan Penginapan
@endsection

@section('content')
    <section class="mb-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Hotel dan Penginapan</h2>
                <p class="text-muted">Rekomendasi Oleh Oleh Hotel dan Penginapan</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @if (empty($detail))
                        <img src="{{ asset('assets/no-image.jpeg') }}" class="img-fluid rounded-15 shadow-nih" alt="">
                    @else
                        <div class="card p-3 shadow-nih rounded-15">
                            <img src="{{ asset('img/' . $detail->image) }}" height="200" class="rounded-15"
                                alt="">

                            <h3 class="mb-0 fw-bold mt-3 mb-2">{{ $detail->title }}</h3>
                            <div class="d-flex justify-content-between">
								<p>Rp {{ number_format($detail->harga) }}</p>
								<p>Tlp {{ $detail->phone }}</p>
							</div>
							
							<hr>

                            <div class="row justify-content-between">
                                <div class="col-md-7">
                                    <small class="mt-3 fw-bold">Fasilitas</small>
                                    <p>
                                        {!! $detail->fasilitas !!}
                                    </p>
                                </div>
                                 <div class="col-md-4">
                                    <div class="d-flex">
                                        <a href="tel:{{ $detail->phone }}" style="height: 42px;" target="_blank"
                                            class="btn btn-outline-primary me-2"><i class="fas fa-phone"></i></a>
                                        <a href="{{ $detail->alamat }}" style="height: 42px;" target="_blank" class="btn btn-primary">Google Maps</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <form action="" class="card shadow-nih rounded-15 mb-4 p-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-9">
                                <input type="text" name="q" placeholder="cari hotel" class="form-control"
                                    aria-describedby="passwordHelpInline">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary w-100" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        @forelse ($data as $item)
                            <div class="col-md-6">
                                <div class="card p-3 shadow-nih rounded-15">
                                    <img src="{{ asset('img/' . $item->image) }}" class="img-fluid rounded-15"
                                        alt="">
                                    <h4 class="mt-4">{{ $item->title }}</h4>
                                    <p>Rp {{ number_format($item->harga) }}</p>
                                    <a href="{{ route('hotel') }}?hotel={{ $item->id }}"
                                        class="btn btn-outline-info w-100">Detail</a>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning" role="alert">
                                    Hotel Tidak ditemukan
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
