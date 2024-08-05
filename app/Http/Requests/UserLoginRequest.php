<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // đăng nhập
            // Bài 1: Tạo form đăng ký gồm: name, email, password, password_confirmation
            // name: bắt buộc nhập, tối đa 100 ký tự
            // email: bắt buộc nhập, là một email hợp lệ, không tồn tại trong bảng users
            // password: bắt buộc, tối thiểu 8 ký tự, khớp với trường password_confirmation
            'name' => 'required|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:4',

            //update
            // Bài 2: Tạo form update hồ sơ người dùng gồm: email, age, avatar
            // email: bắt buộc nhập, phải là định dạng email hợp lệ, không trùng với bất kỳ email nào khác trong bảng users
            // age: Có thể trống, nếu có thì phải là số từ 18 đến 100
            // avatar: Có thể trống, nếu có thì phải là một tệp hình ảnh (jpeg, png, jpg), không quá 2MB

            // 'emailUpdate' => 'required|email|unique:users,email,' . $this->userId,
            // 'age' => 'nullable|min:18|max:100|integer',
            // 'avatar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',

            //Bài 3: Tạo form xác thực thông tin đặt hàng gồm: shipping_address, is_shipping_address_same
            // shipping_address: Bắt buộc phải có nếu 'is_shipping_address_same' là true
            // is_shipping_address_same: bắt buộc, có giá trị true hoặc false

            // 'is_shipping_address_same' => 'required|boolean',
            // 'shipping_address' => 'required_if:is_shipping_address_same,true',

            // Bài 4: Tạo form nhận phản hồi của người dùng: user_id, vote_star, feedback
            // user_id: bắt buộc nhập, phải tồn tại ở trường id trong bảng users
            // vote_star: bắt buộc nhập, là một số nguyên trong khoảng 1 đến 5
            // feedback: bắt buộc nhập, có số ký tự không dưới 50 và không quá 500 ký tự

            // 'user_id' => 'required|exists:user,user_id',
            // 'vote_star' => 'required|integer|min:1|max:5',
            // 'feedback' => 'required|string|min:50|max:500',

            // Bài 5: Tạo form đăng ký khóa học: name, birth_day, province, district
            // name: bắt buộc nhập, số ký tự trong khoảng 5 đến không quá 20
            // birth_day: bắt buộc nhập, phải là ngày tháng hợp lệ, có định dạng d/m/Y (ví dụ: 30/07/2024)
            // province: là một chuỗi, không bắt buộc nhập
            // district: là một chuỗi, bắt buộc phải nhập nếu province có giá trị

            // 'names' => 'required|string|min:5|max:28',
            // 'birth_day' => 'required|date_formax:d/m/Y',
            // 'province' => 'string|nullable',
            // 'district' => 'required_with:province|string'
            // Bài 6: Thay đổi thông tin người dùng: username, phone_number
            // username: bắt buộc, không được trùng với bất kỳ username nào đã có trong bảng users
            // phone_number: có thể trống, nếu có thì phải là một số điện thoại hợp lệ (/^(\+?[\d\s\-()]{7,15})$/)
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email Không được để trống',
            'email.email' => 'Email Không đúng định dạng',
            'email.exists' => 'Email chưa được đăng ký',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password quá ngắn'
        ];
    }
    public $userId;
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
