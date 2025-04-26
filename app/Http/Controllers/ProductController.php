<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result = Product::all();
        return $result;
    }
    public function show($id){
        $result = Product::find($id);
        return $result;
    }
    public function store(Request $request){
       DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return response()->json(['message' => 'Product created successfully'], 201);
    }
     public function update(Request $request, $id){
      Product::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return response()->json(['message' => 'Product updated successfully'], 200);
     }

     public function destroy($id){
     Product::destroy($id);
        return response()->json(['message' => 'Product deleted successfully'], 200);
     }
}
