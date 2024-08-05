## Các truy vấn cơ bản

**1. Lấy tất cả bản ghi**
```php
$users = User::all();
```

**2. Lấy bản ghi theo ID**
```php
$user = User::find(1);
$user = User::where('id', 1);
```

**3. Lấy bản ghi đầu tiên**
```php
$user = User::first();
```

**4. Lấy nhiều bản ghi với điều kiện**
```php
$users = User::where('status', 'active')->get();
```

**5. Lấy bản ghi duy nhất với điều kiện**
```php
$user = User::where('email', 'example@example.com')->first();
```

**6. Thêm bản ghi mới (Cách 1)**
```php
$user = new User;
$user->name = 'John Doe';
$user->email = 'johndoe@example.com';
$user->save();
```

**6. Thêm bản ghi mới (Cách 2)**
```php
$data = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com'
];
User::create($data);
```


**7. Cập nhật bản ghi (Cách 1)**
```php
$user = User::find(1);
$user->name = 'John Smith';
$user->save();
```

**7. Cập nhật bản ghi (Cách 2)**
```php
$data = [
    'name' => 'John Doe',
];
User::where('id', 1)->update($data);
```

**8. Xóa bản ghi**
```php
$user = User::find(1);
$user->delete();
```

**9. Các phương thức khác**
```php
// Truy vấn với nhiều điều kiện
$users = User::where('status', 'active')
             ->where('role', 'admin')
             ->get();
// Truy vấn hoặc
$users = User::where('status', 'active')
             ->orWhere('role', 'admin')
             ->get();
// Sắp xếp kết quả
$users = User::orderBy('name', 'asc')->get();
// Giới hạn số lượng kết quả
$users = User::take(10)->get();
// Phân trang
$users = User::paginate(15); // echo $user->links('pagination::bootstrap-5') trong blade
// Các phương thức tổng hợp khác
$count = User::count();
$max = User::max('age');
$min = User::min('age');
$avg = User::avg('age');
$sum = User::sum('age');
```