<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        /**
         * index
         *
         * @return void
         */
        public function index()
        {
            $categories = Category::latest()->get();

            return view('dashboard_category.index', compact('categories'));
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
                'name'     => 'required|unique:categories',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $category = Category::create([
                'name'     => $request->name, 
                'slug'     => $request->name, 
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data kategori berhasil disimpan!',
                'data'    => $category  
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
            $category = Category::FindOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Detail data kategori',
                'data'    => $category,
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
            $category = Category::FindOrFail($id);

            $validator = Validator::make($request->all(), [
                'name'     => 'required|unique:categories',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $category->update([
                'name'     => $request->name, 
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data kategori berhasil diupdate!',
                'data'    => $category  
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
            Category::where('id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data kategori berhasil dihapus!.',
            ]); 
        }

}
