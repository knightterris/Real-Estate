<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/', 'loginPage');
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('homePage',[AuthController::class,'homePage'])->name('auth#homePage');


        Route::middleware(['admin_auth'])->group(function(){
                Route::prefix('category')->group(function(){
                Route::get('categoryListPage',[CategoryController::class,'categoryListPage'])->name('admin#categoryListPage');
                Route::get('create/categoryPage',[CategoryController::class,'createCategoryPage'])->name('admin#createCategoryPage');
                Route::post('create',[CategoryController::class,'createCategory'])->name('admin#createCategory');
                Route::get('deleteAll',[CategoryController::class,'deleteAll'])->name('admin#deleteAllcategory');
                Route::get('deleteCategory/{id}',[CategoryController::class,'deleteCategory'])->name('admin#deleteCategory');
                Route::get('editPage/{id}',[CategoryController::class,'editPage'])->name('admin#editPage');
                Route::post('update',[CategoryController::class,'updateCategory'])->name('admin#updateCategory');
            });
            Route::prefix('product')->group(function(){
                Route::get('productListPage',[ProductController::class,'productListPage'])->name('admin#productListPage');
                Route::get('createPage',[ProductController::class,'adminProductCreatePage'])->name('admin#productCreatePage');
                Route::post('create',[ProductController::class,'createProduct'])->name('admin#createProduct');
                Route::get('view/detail/{id}',[ProductController::class,'viewDetail'])->name('admin#viewDetail');
                Route::get('delete/{id}',[ProductController::class,'deleteProduct'])->name('admin#deleteProduct');
                Route::get('updatePage/{id}',[ProductController::class,'updatePage'])->name('admin#updatePage');
                Route::post('update',[ProductController::class,'updateProduct'])->name('admin#updateProduct');
                Route::get('delete/eachPhoto/{id}',[ProductController::class,'deleteEachPhoto'])->name('admin#deleteEachPhoto');
                Route::get('salePage',[ProductController::class,'salePage'])->name('admin#salePage');
                Route::get('rentPage',[ProductController::class,'rentPage'])->name('admin#rentPage');
            });
            Route::prefix('account')->group(function(){
                Route::get('accountPage',[AccountController::class,'accountPage'])->name('admin#accountPage');
                Route::get('editPage',[AccountController::class,'editPage'])->name('admin#editAccountPage');
                Route::get('updateCredentialPage',[AccountController::class,'updateCredentialPage'])->name('admin#updateCredentialPage');
                Route::post('update/password',[AccountController::class,'updatePassword'])->name('admin#updatePassword');
                Route::post('update/profile/{id}',[AccountController::class,'updateProfile'])->name('admin#updateProfile');
                Route::post('create/admin',[AccountController::class,'createAdmin'])->name('admin#createAdmin');
                Route::get('view/detail/{id}',[AccountController::class,'accountDetail'])->name('admin#accountDeatil');
                Route::get('delete/user/{id}',[AccountController::class,'deleteUser'])->name('admin#deleteUser');
            });
            Route::prefix('list')->group(function(){
                Route::get('adminList',[AccountController::class,'adminListPage'])->name('admin#adminListPage');
                Route::get('uerList',[AccountController::class,'userListPage'])->name('admin#userListPage');
                Route::get('create/adminPage',[AccountController::class,'createAdminPage'])->name('admin#createAdminPage');
            });
            Route::prefix('admin/contact')->group(function(){
                Route::get('contactPage',[ContactController::class,'contactPage'])->name('admin#contactPage');
                Route::get('read/comment/{id}',[ContactController::class,'readComment'])->name('admin#readComment');
                Route::get('delete/comment/{id}',[ContactController::class,'deleteComment'])->name('admin#deleteComment');
                Route::get('delete/allComments',[ContactController::class,'deleteAllComment'])->name('admin#deleteAllComments');
            });
        });


        Route::middleware(['user_auth'])->group(function(){
                Route::prefix('user')->group(function(){
                Route::get('home',[UserController::class,'homePage'])->name('user#homePage');
                Route::get('about',[UserController::class,'aboutPage'])->name('user#aboutPage');
                Route::get('contact',[UserController::class,'contactPage'])->name('user#contactPage');
                Route::get('accountPage',[UserController::class,'accountPage'])->name('user#accountPage');
                Route::get('edit/accountPage',[UserController::class,'editAccountPage'])->name('user#editAccountPage');
                Route::get('change/passwordPage',[UserController::class,'passwordPage'])->name('user#passwordPage');
                Route::post('update/account/{id}',[UserController::class,'updateUserAccount'])->name('user#updateAccount');
                Route::post('change/password',[UserController::class,'changeUserPassword'])->name('user#changePassword');
            });
            Route::prefix('product')->group(function(){
                Route::get('productPage',[UserProductController::class,'productPage'])->name('user#productPage');
                Route::get('user/createPage',[UserProductController::class,'userProductCreatePage'])->name('user#createPage');
                Route::post('user/create',[UserProductController::class,'userCreateProduct'])->name('user#createProduct');
                Route::get('detailPage/{id}',[UserProductController::class,'detailPage'])->name('user#detailPage');
            });
            Route::prefix('contact')->group(function(){
                Route::post('create/message',[ContactController::class,'createMessage'])->name('user#createContact');
            });
        });
});
