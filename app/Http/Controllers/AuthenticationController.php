<?php

namespace App\Http\Controllers;

use App\Models\Sessoin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Mail;


class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $req)
    {
        //validate
        //chuyền id
        // $req->setUserId(4);

        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ], [
            'email.required' => 'Email Không được để trống',
            'email.email' => 'Email Không đúng định dạng',
            'email.exists' => 'Email chưa được đăng ký',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password quá ngắn'
        ]);

        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
        $remember = $req->has('remember');
        if (Auth::attempt($dataUserLogin, $remember)) {
            // logout các tài khoản khắc
            Sessoin::where('user_id', Auth::id())->delete();
            //tạo phiên dn mới
            session()->put('user_id', Auth::id());

            //dn thành công
            if (Auth::user()->role == '1') {
                return redirect()->route('admin.product.listProduct')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                //dn user
                return redirect()->route('user.list')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            }

        } else {
            // dn thất bại
            return redirect()->back()->with([
                'message' => 'Eamil hoặc password không đúng',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Đăng xuất thành công'
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ], [
            'email.required' => 'Email Không được để trống',
            'name.required' => 'Name Không được để trống',
            'email.email' => 'Email Không đúng định dạng',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password quá ngắn',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp'
        ]);

        $check = User::where('email', $req->email)->exists();
        if ($check) {
            return redirect()->back()->with([
                'message' => 'Tài khoản đã tồn tại',
            ]);
        } else {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->pasword)
            ];
            if ($newUser = User::create($data)) {

                $mail = [
                    'thongbao' => 'Chúc mừng bạn đã đăng ký tài khoản thành công'
                ];

                Mail::send('dangky', $mail, function ($message) {
                    $message->to('tyuvip8@gmail.com', 'Tú')->subject('Bạn vừa đăng ký tài khoản thành công');
                });
            }




            Auth::login($newUser); // tự động đăng nhập xong return ra trang chủ
            return redirect()->back()->with([
                'message' => 'Đăng ký thành công. Vui lòng đăng nhập',
            ]);
        }

    }
}
