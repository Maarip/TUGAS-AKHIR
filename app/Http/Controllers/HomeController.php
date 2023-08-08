<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use App\Models\Wisata;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        return view('frontend.home.index', compact('dataLokasi'));
    }

    public function hotel(Request $request)
    {
        $cari = $request->q;
        $data = Hotel::where('title', 'like', "%{$cari}%")->get();

        $detail = null;
        if ($request->hotel) {
            # code...
            $detail = Hotel::findOrFail($request->hotel);
        }
        return view('frontend.hotel.index', compact('data', 'detail'));
    }
    public function kuliner()
    {
        $data = Kuliner::all();
        // dd($data);
        return view('frontend.kuliner.index', compact('data'));
    }
	public function tentang()
	{
    return view('frontend.tentang.index');
	}
}