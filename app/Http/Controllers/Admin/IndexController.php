<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = Wisata::all();
        $dataLokasi = [];
        foreach ($data as $no => $lokasi) {
            $dataLokasi[$no] = [
                "type" => "Feature",
                "id" => $no,
                "properties" => [
                    "title" => $lokasi->title,
                    "harga" => "Rp. " . number_format($lokasi->harga),
                    "maps" => $lokasi->maps,
                    "deskripsi" => $lokasi->deskripsi,
                    "image" => asset('img/' . $lokasi->image),
                ],
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        $lokasi->longitude, $lokasi->latitude
                    ]
                ]
            ];
        }

        // dd($dataLokasi);
        return view('backend.index', compact('dataLokasi'));
    }
}