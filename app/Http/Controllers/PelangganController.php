<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $pelanggans = Pelanggan::latest()->get();

        return view('dashboard_pelanggan.index', compact('pelanggans'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan'    => 'required',
            'alamat'            => 'required',
            'nomor_telepon'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pelanggan = Pelanggan::create([
            'nama_pelanggan'     => $request->nama_pelanggan,
            'alamat'             => $request->alamat,
            'nomor_tlp'          => $request->nomor_telepon
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil disimpan!',
            'data'    => $pelanggan
        ]);
    }

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::FindOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data kategori',
            'data'    => $pelanggan,
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category
     * @return void
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::FindOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_pelanggan'    => 'required',
            'alamat'            => 'required',
            'nomor_telepon'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pelanggan->update([
            'nama_pelanggan'     => $request->nama_pelanggan,
            'alamat'             => $request->alamat,
            'nomor_tlp'          => $request->nomor_telepon
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil diupdate!',
            'data'    => $pelanggan  
        ]);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        Pelanggan::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil dihapus!.',
        ]); 
    }
}
