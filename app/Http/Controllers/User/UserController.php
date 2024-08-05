<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {

        $listCategory = Category::paginate();
        $listProduct = Products::join('category', 'category.id_cate', '=', 'products.id_category')
        ->select('products.id', 'products.name', 'products.description', 'products.price', 'products.id_category', 'category.name_category', 'products.image')->paginate();
        return view('users.index')->with([
            'products' => $listProduct,
            'category' =>$listCategory
        ]);
        // $category = Category::paginate();
        // $listProduct = Products::paginate();
        // return view('users.index')->with([
        //     'category' => $category,
        //     'products' => $listProduct

        // ]);
    }

    public function timKiemSP(Request $req)
    {
        $tukhoa = $req->nameProduct;
        $listCategory = Category::paginate();
        $listProduct = Products::
            join('category', 'category.id_cate', '=', 'id_category')
            ->select('products.id', 'products.name', 'products.price', 'products.id_category', 'products.description', 'products.image', 'category.name_category')
            ->where('products.name', 'like', '%' . $tukhoa . '%')
            ->get();
        return view('users.index')->with([
            'products' => $listProduct,
            'category' =>$listCategory
        ]);
    }

    public function timKiemDM(Request $req)
    {
        $tukhoa = $req->nameCategory;
        $listCategory = Category::paginate();
        $listProduct = Products::
            join('category', 'category.id_cate', '=', 'id_category')
            ->select('products.id', 'products.name', 'products.price', 'products.id_category', 'products.description', 'products.image', 'category.name_category')
            ->where('products.id_category', 'like', '%' . $tukhoa . '%')
            ->get();
        return view('users.index')->with([
            'products' => $listProduct,
            'category' =>$listCategory
        ]);
        //Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $userPhongBan = DB::table('phongban')
        //     ->where('ten_donvi', 'like', '%Ban đào tạo%')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $userPhongBan)
        //     ->select('id', 'name', 'email')
        //     ->get();
    }

    public function listUsers()
    {
        $listUsers = User::paginate(5);
        return view('admin.users.list-user')->with([
            'users' => $listUsers
        ]);
    }

    public function addUsers()
    {
        return view('admin.users.add-user');
    }

    public function addPostUsers(Request $req)
    {
        $req->validate([
            'nameUser' => 'required',
            'emailUser' => 'required|email',
            'passwordUser' => 'required|min:8'
        ],[
            'email.required' => 'Email Không được để trống',
            'nameUser.required' => 'Name Không được để trống',
            'emailUser.email' => 'Email Không đúng định dạng',
            'passwordUser.required' => 'Password không được để trống',
            'passwordUser.min' => 'Password quá ngắn',
        ]); 

        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'password' => Hash::make($req->passwordUser),
            'role' => $req->roleUser,
        ];
        User::create($data);

        return redirect()->route('admin.users.listUsers')->with([
            'message' => 'Thêm thành công người dùng mới!'
        ]);
    }

    public function deleteUsers(Request $req)
    {
        $user = User::find($req->id);
        $user->delete();

        return redirect()->back()->with([
            'message' => 'Xoá thành công!'
        ]);
    }

    public function detailUsers($idUser)
    {
        $user = User::where('id', $idUser)->first();

        return view('admin.users.detail-user')->with([
            'users' => $user
        ]);
    }

    public function editUsers($idUser)
    {
        $user = User::where('id', $idUser)->first();

        return view('admin.users.edit-user')->with([
            'users' => $user
        ]);
    }

    public function editPatchUsers(Request $req, $idUser)
    {
        $req->validate([
            'nameUser' => 'required',
            'emailUser' => 'required|email',
            'passwordUser' => 'required|min:8'
        ],[
            'email.required' => 'Email Không được để trống',
            'nameUser.required' => 'Name Không được để trống',
            'emailUser.email' => 'Email Không đúng định dạng',
            'passwordUser.required' => 'Password không được để trống',
            'passwordUser.min' => 'Password quá ngắn',
        ]); 
        $user = User::where('id', $idUser)->first();

        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'password' => Hash::make($req->passwordUser),
            'role' => $req->roleUser,
        ];
        User::where('id', $idUser)->update($data);
        return redirect()->route('admin.users.listUsers')->with([
            'message' => 'Sửa thành công người dùng!'
        ]);
    }

}
