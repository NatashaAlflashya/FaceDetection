<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowroomController extends Controller
{
    public function create() {
        return view('showrooms/index');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'nama_mobil'=> 'required',
            'brand_mobil'=> 'required',
            'warna_mobil'=> 'required',
            'tipe_mobil'=> 'required',
            'harga_mobil' => 'required',
        ]);

        showroom::create([
            'nama_mobil'=> $nama_mobil->hashname(),
            'brand_mobil'=> $request->brand_mobil,
            'warna_mobil'=> $request->warna_mobil,
            'tipe_mobil'=> $request->tipe_mobil,
            'harga_mobil'=> $request->harga_mobil
        ]);
        return redirect()->route('');

    public function index(){
        $showroom
    }
    //
}
