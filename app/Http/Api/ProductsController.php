<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function listProduct()
    {
        $listProduct = Products::select('id', 'id_category', 'name', 'description', 'price', 'image')->get();

        return response()->json([
            'data' => $listProduct,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function getProduct($idProduct)
    {
        $product = Products::select('id', 'name', 'price', 'image')->first($idProduct);

        return response()->json([
            'data' => $product,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function addProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $data = [
            'name' => $req->name,
            'price' => $req->price
        ];
        $newProduct = Products::create($data);

        return response()->json([
            'data' => $newProduct,
            'status_code' => '200',
            'message' => 'success'
        ], 200);

    }

    public function updateProduct(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'price' => 'required',
            'id' => 'required'
        ]);

        $data = [
            'name' => $req->name,
            'price' => $req->price
        ];
        $product = Products::find($req->id);
        $product->update($data);

        return response()->json([
            'data' => $product,
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }

    public function deleteProduct(Request $req)
    {
        $req->validate([
            'id' => 'required'
        ]);
        Products::find($req->id)->delete();

        return response()->json([
            'status_code' => '200',
            'message' => 'success'
        ], 200);
    }
}
