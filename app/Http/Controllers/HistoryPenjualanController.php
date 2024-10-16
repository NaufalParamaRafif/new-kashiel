<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Penjualan;

class HistoryPenjualanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard_penjualan.index', [
            'penjualans' => Penjualan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'total_harga' => 'required',
            'pelanggan'   => 'required',
            'kasir'       => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $penjualan = Penjualan::create([
            'total_harga' => $request->total_harga,
            'pelanggan_id' => $request->pelanggan,
            'kasir_id' => $request->kasir,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil disimpan!',
            'data'    => $penjualan
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
        $penjualan = Penjualan::FindOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data penjualan',
            'data'    => $penjualan,
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
        $penjualan = penjualan::FindOrFail($id);

        $validator = Validator::make($request->all(), [
            'total_harga' => 'required',
            'pelanggan' => 'required',
            'kasir' => 'required',
            'tanggal_penjualan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penjualan->update([
            'total_harga' => $request->total_harga,
            'pelanggan_id' => $request->pelanggan,
            'kasir_id' => $request->kasir,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data penjualan berhasil diupdate!',
            'data'    => $penjualan  
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
        Penjualan::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil dihapus!.',
        ]); 
    }
}
