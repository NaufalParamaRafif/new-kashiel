<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('dashboard_produk.index', compact('products'));
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
            'nama_produk' => 'required',
            'harga'       => 'required',
            'stok'        => 'required',
            'kategori'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::create([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'category_id'  => $request->kategori,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data produk berhasil disimpan!',
            'data'    => $product  
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
        $product = Product::FindOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data produk',
            'data'    => $product,
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $product
     * @return void
     */
    public function update(Request $request, $id)
    {
        $product = Product::FindOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga'       => 'required',
            'stok'        => 'required',
            'kategori'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'category_id' => $request->kategori,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data produk berhasil diupdate!',
            'data'    => $product  
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
        Product::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kategori berhasil dihapus!.',
        ]); 
    }
}
