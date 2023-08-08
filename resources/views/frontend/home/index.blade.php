@extends('layouts.frontend.master')

@section('title')
Wisata Pulau Keledupa
@endsection

@section('header')
     <!-- header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        Explore Wisata Pulau Keledupa Bersama Kami
                    </h1>
                    <a href="" class="btn btn-primary btn-show"><i
                            class="fas fa-arrow-circle-down me-2"></i>Jelajahi</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('fe/img/Travelers-amico.svg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
@endsection

@section('content')
<section class="explore">
    <div class="container">
        <h2>Cari Lokasi Wisata Kamu</h2>
        <p class="desc">Klik Point Kordinat Untuk Melihat Detail</p>

        <!-- card maps-->
        <div class="row">
            <div class="col-md-12">
                <div class="card p3 shadow-nih rounded-15">
                    <div class="map" id="map"></div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid rounded-15" alt="" id="thumbnail">
                <table class="table table-striped mt-3">
                    <tbody>
                        <tr>
                            <td>Nama Wisata</td>
                            <td>:</td>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <td>Tiket Masuk</td>
                            <td>:</td>
                            <td id="tiket"></td>
                        </tr>
                        <tr>
                            <td>Lokasi Wisata</td>
                            <td>:</td>
                            <td>
                                <a href="" target="_blank" id="lokasi" class="btn btn-primary">Lihat Maps</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td id="deskripsi">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
const options = {
    coordinates: [40, 40],
    name: "Unicorn Company",
    adress: "123 whatever boulevard",
    postalCode: "000000",
    city: "Bear town",
    website: ["https://www.example.com/", "example.com →"],
    socialMedia: ["https://www.linkedin.com/", "Linkedin →"]
}

var map = L.map('map').setView([-5.5375956, 123.7525173], 12)
L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    maxZoom: 20,
    attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


var sample_json = {
    "type": "FeatureCollection",
    "features": @json($dataLokasi)
}

L.geoJSON(sample_json).on('click', markerOnClick).addTo(map);

function markerOnClick(e) {
    var title = e.layer.feature.properties.title;
    var harga = e.layer.feature.properties.harga;
    var lokasi = e.layer.feature.properties.maps;
    var deskripsi = e.layer.feature.properties.deskripsi;
    var image = e.layer.feature.properties.image;

    console.log(e);
    $("#exampleModal").modal('show');
    // set modal
    $("#title").text(title);
    $("#nama").text(title);
    $("#tiket").text(harga);
    $("#deskripsi").html(deskripsi);
    $("#lokasi").attr('href', lokasi);
    $("#thumbnail").attr("src", image);
}
</script>
@endsection