<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = Products::join('category', 'category.id_cate', '=', 'products.id_category')
            ->select('products.id', 'products.name', 'products.description', 'products.price', 'products.id_category', 'category.name_category', 'products.image')->paginate(5);
        return view('admin.products.listProduct')->with([
            'products' => $products,
        ]);
    }

    public function addProduct()
    {
        $category = Category::get();
        return view('admin.products.addProduct')->with([
            'category' => $category
        ]);
    }

    public function addPostProduct(Request $req)
    {

        $req->validate([
            'nameProducts' => 'required',
            'priceProducts' => 'required|numeric',
        ],[
            'nameProducts.required' => 'Name Không được để trống',
            'priceProducts.required' => 'Giá không được để trống',
            'priceProducts.numeric' => 'Giá phải là 1 số'
        ]);
        $imgaeUrl = '';
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProduct/";
            $image->move(public_path($link), $nameImage);

            $imgaeUrl = $link . $nameImage;
        }
        $data = [
            'id_category' => $req->categorys,
            'name' => $req->nameProducts,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'description' => $req->description,
            'price' => $req->priceProducts,
            'image' => $imgaeUrl
        ];
        Products::create($data);

        return redirect()->route('admin.product.listProduct')
            ->with([
                'message' => 'Thêm mới thành công',
            ]);
    }

    public function deleteProduct(Request $req)
    {
        $product = Products::find($req->id);
        if ($product->image != null && $product->image != '') {
            File::delete(public_path($product->image));
        }

        $product->delete();
        return redirect()->back()->with([
            'massage' => 'Xóa thành công'
        ]);
    }

    public function detailProduct($idProduc)
    {
        $product = Products::where('id', $idProduc)->first();
        return view('admin.products.detail-product')->with([
            'product' => $product
        ]);
    }

    public function updateProduct($idProduc)
    {
        $category = Category::get();
        $product = Products::where('id', $idProduc)->first();
        return view('admin.products.updateProduct')->with([
            'product' => $product,
            'category' => $category
        ]);
    }

    public function updatePatchProduct($idProduc, Request $req)
    {
        $req->validate([
            'nameProducts' => 'required',
            'priceProducts' => 'required|numeric',
        ],[
            'nameProducts.required' => 'Name Không được để trống',
            'priceProducts.required' => 'Giá không được để trống',
            'priceProducts.numeric' => 'Giá phải là 1 số'
        ]);
        
        $product = Products::where('id', $idProduc)->first();
        $linkImage = $product->image;

        if ($req->hasFile('imageProduct')) {
            File::delete(public_path($product->image)); //xóa file cũ
            $iamge = $req->file('imageProduct');
            $newName = time() . "." . $iamge->getClientOriginalExtension();
            $linkStorage = 'imageProduct/';
            $iamge->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $req->nameProducts,
            'id_category' => $req->category,
            'updated_at' => Carbon::now(),
            'description' => $req->description,
            'price' => $req->priceProducts,
            'image' => $linkImage
        ];
        Products::where('id', $idProduc)->update($data);
        return redirect()->route('admin.product.listProduct')
            ->with([
                'message' => 'Sửa thành công',
            ]);
    }
}
