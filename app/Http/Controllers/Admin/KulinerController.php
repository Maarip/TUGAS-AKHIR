<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuliner;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $data = Kuliner::where('title', 'like', "%{$cari}%")->get();
        return view('backend.kuliner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.kuliner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'harga' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png',
        ]);

        # membuat variabel baru untuk penamaan file image kita menggunakan time() agar unique tidak sama dengan gambar lain
        $imageName = time() . '.' . $request->image->extension();

        # gunakan query untuk update data baru kedalam database dengan memanggil model wisata

        # awal query
        Kuliner::create([
            'title' => $request->title,
            'phone' => $request->phone,
            'harga' => $request->harga,
            'image' => $imageName,
        ]);
        # akhir query

        # menentukan folder mana yang akan menyimpan gambar hasil upload kita
        $request->image->move(public_path('img'), $imageName);
        # kita akan menyimpan gambar pada folder public/img/namafile.png

        return redirect()->route('admin.kuliner.index')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kuliner::find($id);
        return view('backend.kuliner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kuliner::find($id);

        # membuat if 2 kondisi dimana jika ada request pergantian thumbnail atau gambar maka
        if ($request->image) {
            # jika da request image / thumbnail maka system akan mengganti gambar tersebut

            # gunakan fitur unlink untuk menghapus gambar pada folder penyimpanan kita sesuai dengan nama file pada database
            unlink(public_path('img/' . $data->image));

            # jika sudah berhasil menghapus maka kita buat persiapan untuk gambar baru

            # membuat variabel baru untuk penamaan file image kita menggunakan time() agar unique tidak sama dengan gambar lain
            $imageName = time() . '.' . $request->image->extension();

            # gunakan query untuk update data baru kedalam database dengan memanggil model wisata

            # awal query
            $data->update([
                'title' => $request['title'],
                'phone' => $request['phone'],
                'harga' => $request['harga'],
                'image' => $imageName,
            ]);
            # akhir query

            # menentukan folder mana yang akan menyimpan gambar hasil upload kita
            $request->image->move(public_path('img'), $imageName);
            # kita akan menyimpan gambar pada folder public/storage/img/namafile.png

        } else {
            # jika tidak ada request image maka memanggil query update dengan model

            # awal query
            $data->update([
                'title' => $request['title'],
                'phone' => $request['phone'],
                'harga' => $request['harga'],
            ]);
            # akhir query
        }

        # kembalikan hasil controller ini ke halaman list wisata
        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # membuat variabel untuk cek apakah id tersebut ada atau tidak menggunakan find / where by id 
        $data = Kuliner::find($id);

        # membuat if satu kondisi dimana jika kosong data tersebut akan di kembalikan
        if (empty($data)) {
            # kembalikan ke halaman list wisata dengan notifikasi with
            return redirect()->route('admin.kuliner.index')->with('galat', 'Kuliner not found');
        }

        # gunakan fitur unlink untuk menghapus gambar pada folder penyimpanan kita sesuai dengan nama file pada database
        unlink(public_path('img/' . $data->image));

        # gunakan query delete orm untuk menghapus data pada tabel

        # awal query
        $data->delete();
        # akhir query

        # kembalikan hasil controller ini ke halaman list product
        return redirect()->route('admin.kuliner.index')->with('success', 'Kuliner Berhasil di Hapus');
    }
}