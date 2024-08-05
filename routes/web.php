<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Admin\ProductController;

Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');
Route::get('mail-', [AuthenticationController::class, 'register'])->name('register');



// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkAdmin'], function () {
    Route::group(['prefix' => 'products', 'as' => 'product.'], function () {
        //http://127.0.0.1:8000/admin/product/....
        Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');

        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');

        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');

        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

        Route::get('detail-product/{idProduct}', [ProductController::class, 'detailProduct'])->name('detailProduct');

        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');

        Route::patch('update-product/{idProduct}', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');

    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {

        // CategoryController
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');

        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');

        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');

        Route::delete('delete-category', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

        Route::get('detail-category/{idCategory}', [CategoryController::class, 'detailCategory'])->name('detailCategory');

        Route::get('edit-category/{idCategory}', [CategoryController::class, 'editCategory'])->name('editCategory');

        Route::patch('edit-category/{idCategory}', [CategoryController::class, 'editPatchCategory'])->name('editPatchCategory');

    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

        // UserController
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');

        Route::get('add-user', [UserController::class, 'addUsers'])->name('addUsers');

        Route::post('add-user', [UserController::class, 'addPostUsers'])->name('addPostUsers');

        Route::delete('delete-user', [UserController::class, 'deleteUsers'])->name('deleteUsers');

        Route::get('detail-user/{idUser}', [UserController::class, 'detailUsers'])->name('detailUsers');

        Route::get('edit-user/{idUser}', [UserController::class, 'editUsers'])->name('editUsers');

        Route::patch('edit-user/{idUser}', [UserController::class, 'editPatchUsers'])->name('editPatchUsers');

    });
});

Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
    //http://127.0.0.1:8000/admin/product/....
    Route::get('/', [UserController::class, 'list'])->name('list');

    Route::get('timkiemSP', [UserController::class, 'timKiemSP'])->name('timKiemSP');

    Route::get('timkiemDM', [UserController::class, 'timKiemDM'])->name('timKiemDM');
    
});
