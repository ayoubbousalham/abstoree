<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthAdmin;
use App\Http\Livewire\CartCoponent;
use App\Http\Livewire\HomeCoponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutCoponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategorieComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategorieComponent;
use App\Http\Livewire\Admin\AdminAddCategorieComponent;
use App\Http\Livewire\Admin\AdminEditCategorieComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminDeleteProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategorieComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\SearchComponent;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/',HomeCoponent::class)->name('home');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartCoponent::class)->name('product.cart');
Route::get('/checkout',CheckoutCoponent::class)->name('checkout');
Route::get('/products/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-categorie/{categorie_slug}',CategorieComponent::class)->name('product.categorie');
Route::get('/wishlist',WishlistComponent::class)->name('wishlist');
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');
Route::get('/search',SearchComponent::class)->name('product.search');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');

//for Users
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

//for Admin
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  //admin dashboard
  Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
  //admin Categorie
  Route::get('/admin/categories',AdminCategorieComponent::class)->name('admin.categories');
  Route::get('/admin/categorie/Add',AdminAddCategorieComponent::class)->name('admin.categorie.add');
  Route::get('/admin/categorie/Edit/{categorie_slug}',AdminEditCategorieComponent::class)->name('admin.categorie.Edit');
  Route::get('/admin/home-categories',AdminEditCategorieComponent::class)->name('admin.categorie.Edit');
  //admin Product
  Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
  Route::get('/admin/product/Add',AdminAddProductComponent::class)->name('admin.product.add');
  Route::get('/admin/product/Edit/{product_slug}',AdminEditProductComponent::class)->name('admin.product.Edit');
  Route::get('/admin/product-categorie',AdminHomeCategorieComponent::class)->name('admin.homecategorie');
  Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');
  
});
    

