<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KategoriControrller extends Controller
{
    function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    function create()
    {
        return view('kategori.create');
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kodeKategori' => 'required',
            'namaKategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/kategori/create')
                ->withErrors($validator)
                ->withInput();
        }

        Kategori::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    /**
     * Return to edit page
     */
    function edit($id)
    {
        return view('kategori.edit', ['data' => Kategori::find($id)]);
    }

    /**
     * Update kategori data
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;

        $kategori->save();
        return redirect('/kategori');
    }

    function destroy($id)
    {
        Kategori::find($id)->delete();

        return redirect('/kategori');
    }
}
