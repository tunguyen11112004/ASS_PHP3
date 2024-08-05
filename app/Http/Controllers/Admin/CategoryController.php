<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $listCategory = Category::paginate(5);
        return view('admin.category.list-category')->with([
            'category' => $listCategory
        ]);
    }

    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    public function addPostCategory(Request $req)
    {
        $req->validate([
            'nameCategory' => 'required',
        ],[
            'nameCategory.required' => 'Name Không được để trống',
        ]); 
        $data = [
            'name_category' => $req->nameCategory
        ];
        Category::create($data);
        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Thêm thành công danh mục mới!'
        ]);
    }

    public function deleteCategory(Request $req)
    {
        $category = Category::find($req->id_cate);

        $category->delete();
        return redirect()->back()->with([
            'message' => 'Xoá thành công!'
        ]);
    }

    public function detailCategory($idCategory)
    {
        $category = Category::where('id_cate', $idCategory)->first();
        return view('admin.category.detail-category')->with([
            'category' => $category
        ]);
    }

    public function editCategory($idCategory)
    {
        $category = Category::where('id_cate', $idCategory)->first();
        return view('admin.category.edit-category')->with([
            'category' => $category
        ]);
    }

    public function editPatchCategory(Request $req, $idCategory)
    {
        $req->validate([
            'nameCategory' => 'required',
        ],[
            'nameCategory.required' => 'Name Không được để trống',
        ]); 
        $category = Category::where('id_cate', $idCategory)->first();

        $data = [
            'name_category' => $req->nameCategory,
        ];
        Category::where('id_cate', $idCategory)->update($data);
        return redirect()->route('admin.category.listCategory')->with([
            'message' => 'Sửa thành công danh mục!'
        ]);
    }
}