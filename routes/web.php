<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Web\Front\CartController;
use App\Http\Controllers\Web\Front\SignController;
use App\Http\Controllers\Web\Backend\JobController;
use App\Http\Controllers\Web\Front\OrderController;
use App\Http\Controllers\Web\Backend\CityController;
use App\Http\Controllers\Web\Backend\ShopController;
use App\Http\Controllers\Web\Front\SearchController;
use App\Http\Controllers\Web\Backend\BrandController;
use App\Http\Controllers\Web\Backend\EventController;
use App\Http\Controllers\Web\Backend\UsersController;
use App\Http\Controllers\Web\Backend\VideoController;
use App\Http\Controllers\Web\Front\ProfileController;
use App\Http\Controllers\Web\Backend\ConfigController;
use App\Http\Controllers\Web\Backend\GroupsController;
use App\Http\Controllers\Web\Backend\OrdersController;
use App\Http\Controllers\Web\Front\DiscountController;
use App\Http\Controllers\Web\Front\FavoriteController;
use App\Http\Controllers\Web\Backend\ProductController;
use App\Http\Controllers\Web\Backend\ProjectController;
use \App\Http\Controllers\Web\Backend\GalleryController;
use App\Http\Controllers\Web\Backend\CategoryController;
use App\Http\Controllers\Web\Backend\CommentsController;
use App\Http\Controllers\Web\Backend\ConditionController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\DiscountsController;
use App\Http\Controllers\Web\Backend\AdvertisingController;
use App\Http\Controllers\Web\Backend\CooperationsController;
use App\Http\Controllers\Web\Backend\ShopProductController;
use App\Http\Controllers\Web\Backend\GroupMembersController;
use App\Http\Controllers\Web\Backend\TicketController;
use App\Http\Controllers\Web\Front\ShopProductController as FrontShopProductController;

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

Route::get('/test', function () {
    return bcrypt('09157400656');
    // return Carbon::now()->toDateTime();
    // return bcrypt('09020017922');
    // $transactions = Transaction::all();
    // foreach ($transactions as $item) {
    //     $order_id = Order::where('transaction_id', $item->id)->first();
    //     if ($order_id) {
    //         $item->order_id = $order_id->id;
    //         $item->save();
    //     }
    // }
    // $transaction_id = Transaction::query()->select('id')->where('reference_code', 'A00000000000000000000000000420558320')->first();
    // return Order::where('transaction_id', $transaction_id->id)->first();
    // return ShopProduct::where('id' , 18)->first('count')->count;
});
Auth::routes();
Route::post('/user/register', [SignController::class, 'register'])->name('userRegister');
Route::post('/user/password/forget', [SignController::class, 'reserPassword'])->name('reset.password');
Route::get('/login/code', [SignController::class, 'loginCodeForm'])->name('login.code');
Route::post('/login/code', [SignController::class, 'loginCode'])->name('login.code');
Route::get('/soon', [HomeController::class, 'soon'])->name('soon');
Route::prefix('ajax')->group(function () {
    Route::post('/code/send', [SignController::class, 'sendCode'])->name('sendCode');
    Route::post('/forget/code/send', [SignController::class, 'forget_sendCode'])->name('forget.sendCode');
    Route::post('/code/validate', [SignController::class, 'validateCode'])->name('validateCode');
    Route::post('/state/cities', [CityController::class, 'getCities'])->name('cities');
    Route::post('/user/cart/add', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/user/cart/delete', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');
    Route::post('/main/products/search', [\App\Http\Controllers\Web\Front\ShopProductController::class, 'productsFromSerach'])->name('productsMainSearch');
    Route::post('/product/favorite/add', [FavoriteController::class, 'addProductToFavorites'])->name('addProductToFavorites');
    Route::post('/profile/address/add', [ProfileController::class, 'addAddress'])->name('profile.addAddress');
    Route::post('/product/rate', [FrontShopProductController::class, 'rate'])->name('shopProduct.rate');
    Route::post('/product/comment/add/{slug}', [FrontShopProductController::class, 'insertComment'])->name('shopProduct.comment.add');
    Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
    Route::post('/users/search/input', [UsersController::class, 'seachUser'])->name('user.search.input');
    Route::post('/discount/code/generate', [DiscountsController::class, 'generateCode'])->name('generateCode');
    Route::post('/discount/code/validate', [DiscountsController::class, 'validateCode'])->name('validateCode');
    Route::post('/shopProducts/discount/calculate', [DiscountController::class, 'calculateDiscount'])->name('discount.calculate');
    Route::post('/checkout/discount/calculate', [DiscountController::class, 'checkDiscountForCart'])->name('discount.cart.calculate');
    Route::post('/shopProducts/all', [ShopProductController::class, 'getShopProducts'])->name('getShopProducts');
    Route::post('/shopProducts/search', [ShopProductController::class, 'search'])->name('shop.products.search');
    Route::post('/shops/all', [ShopController::class, 'getShops'])->name('getShops');
    Route::post('/shops/search', [ShopController::class, 'search'])->name('shops.search');
    Route::post('/categories/all', [CategoryController::class, 'getCategories'])->name('getCategories');
    Route::post('/categories/search', [CategoryController::class, 'search'])->name('category.search');
    Route::post('/brands/all', [BrandController::class, 'getBrands'])->name('getBrands');
    Route::post('/brands/search', [BrandController::class, 'search'])->name('brands.search');
    Route::post('/users/all', [UsersController::class, 'getCustommers'])->name('getCustommers');
    Route::post('/groups/all', [GroupsController::class, 'getGroups'])->name('getGroups');
    Route::post('/group/uniqueName/check', [GroupsController::class, 'checkUniqueName'])->name('group.checkUniqueName');
    // Route::get('/group/members/{$id}', [GroupsController::class, 'members'])->name('group.members');
    Route::post('/group/{id}/member/add', [GroupMembersController::class, 'addMembersToGroup'])->name('group.members.add');
    Route::post('/users/filter', [UsersController::class, 'getUsersFilter'])->name('users.list.filter');
    Route::post('/users/search', [UsersController::class, 'search'])->name('user.search');
    Route::get('/order/status/change/{trackingCode}', [OrdersController::class, 'changeOrderStatus'])->name('order.status.change');
    Route::post('/orders/filter', [OrdersController::class, 'ordersFilter'])->name('orders.filter');
    Route::post('/comment/changeStatus/{id}', [CommentsController::class, 'changeStatus'])->name('comment.status.change');
    Route::post('/advertising/search', [AdvertisingController::class , 'search'])->name('advertisings.search');
    Route::post('/jobs/search', [JobController::class , 'search'])->name('job.search');
    Route::post('/gallery/search', [GalleryController::class , 'search'])->name('gallery.search');
    Route::post('/video/search', [VideoController::class , 'search'])->name('video.search');
    Route::post('/event/search', [EventController::class , 'search'])->name('event.search');
    Route::post('/project/search', [ProjectController::class , 'search'])->name('project.search');
    Route::post('/ticket/search', [TicketController::class , 'search'])->name('ticket.search');
    Route::post('/cooperation/search', [CooperationsController::class , 'search'])->name('cooperation.search');

});
// Route For Admin Panel
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/user', UsersController::class);
    Route::get('/admin/user/address/{user_id}', [UsersController::class, 'addresses'])->name('user.addresses');
    Route::post('/admin/user/address/add/{user_id}', [UsersController::class, 'addAddress'])->name('user.address.add');
    Route::post('/admin/user/address/delete/{user_id}', [UsersController::class, 'deleteAddress'])->name('user.address.delete');
    Route::post('/admin/user/address/update/{user_id}', [UsersController::class, 'updateAddress'])->name('user.address.update');

    Route::resource('/admin/product', ProductController::class);
    Route::resource('/admin/shop', ShopController::class);
    Route::resource('/admin/shopProduct', ShopProductController::class);
    Route::resource('/admin/discount', DiscountsController::class);
    Route::resource('/admin/group', GroupsController::class);
    Route::get('/admin/group/members/{id}', [GroupsController::class, 'members'])->name('group.members');

    Route::resource('/admin/brand', BrandController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/order', OrdersController::class);
    Route::resource('/admin/comment', CommentsController::class);
    Route::resource('/admin/advertising', AdvertisingController::class);
    Route::resource('/admin/job', JobController::class)->except(['create' , 'edit']);
    Route::get('/admin/job/condition/{job_id}', [ConditionController::class , 'index'])->name('condition.index');
    Route::post('/admin/job/condition/store/{job_id}', [ConditionController::class , 'store'])->name('condition.store');
    Route::resource('/admin/job/condition', ConditionController::class)->only(['update' , 'destroy']);
    Route::resource('/admin/gallery', GalleryController::class)->except(['create' , 'edit' , 'show']);
    Route::resource('/admin/video', VideoController::class)->except(['create' , 'edit' , 'show']);
    Route::resource('/admin/event', EventController::class)->except(['show']);
    Route::resource('/admin/project', ProjectController::class)->except(['show' , 'edit' , 'create']);
    Route::resource('/admin/cooperation', CooperationsController::class)->except(['create']);
    Route::resource('/admin/ticket', TicketController::class)->except(['show']);
    Route::post('/admin/ticket/{tracking_code}/close', [TicketController::class , 'close'])->name('ticket.close');
    Route::get('/admin/ticket/{id}/messages', [TicketController::class , 'messages'])->name('ticket.messages');
    Route::post('/admin/ticket/{id}/send', [TicketController::class , 'send'])->name('ticket.send');
    Route::get('/admin/config' , [ConfigController::class, 'index'])->name('config');
    Route::post('/admin/config/store' , [ConfigController::class, 'store'])->name('config.store');
});
Route::post('/admin/shopProduct/{product_id}/picture/add', [ShopProductController::class, 'storePictures'])->name('storePicture');
Route::post('/admin/shopProduct/{product_id}/picture/delete', [ShopProductController::class, 'deleteProductPic'])->name('deletePicture');

// -- Web Frontend Routes  --
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/redirect/login', [HomeController::class, 'redirectToLogin'])->name('redirect_login');
Route::resource('ware', \App\Http\Controllers\Web\Front\ShopProductController::class);
Route::resource('cart', CartController::class)->middleware('auth');
Route::post('cart/submit', [CartController::class, 'submitCart'])->middleware('auth')->name('submitCart');
Route::get('checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::post('/order/submit/{isNew}', [OrderController::class, 'store'])->name('submitOrder');
Route::get('/pay', [OrderController::class, 'pay']);
Route::get('/callback', [OrderController::class, 'callback'])->name('callback');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/ajax/search', [SearchController::class, 'searchAjax'])->name('search_ajax');
Route::get('/about', [HomeController::class, 'aboutUs'])->name('about');
Route::get('/profile/index', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile');
Route::get('/profile/address', [ProfileController::class, 'addresses'])->middleware(['auth'])->name('profile.addresses');
Route::post('/profile/address/update', [ProfileController::class, 'updateAddress'])->middleware(['auth'])->name('profile.updateAddress');
Route::post('/profile/address/delete', [ProfileController::class, 'deleteAddress'])->middleware(['auth'])->name('profile.deleteAddress');
Route::get('/profile/orders', [ProfileController::class, 'orders'])->middleware(['auth'])->name('profile.orders');
Route::get('/profile/order/details/{trackingCode}', [ProfileController::class, 'orderDetails'])->middleware(['auth'])->name('profile.order.details');
Route::get('/profile/favorites', [ProfileController::class, 'favorites'])->middleware(['auth'])->name('profile.favorites');
Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->middleware(['auth'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->middleware(['auth'])->name('profile.updateProfile');
Route::post('/profile/password/update', [ProfileController::class, 'updatePassword'])->middleware(['auth'])->name('profile.updatePassword');
Route::post('/profile/avatar/upload', [ProfileController::class, 'updateAvatar'])->middleware(['auth'])->name('profile.updateAvatar');
Route::post('/ajax/order/products', [OrderController::class, 'getProductsOfOrder'])->middleware(['auth'])->name('order.details');
Route::get('/forget', [LoginController::class, 'forgetPassword'])->name('password.forget');
Route::get('/fromPay/{price}', [PaymentController::class, 'pay']);
Route::post('/order/pay', [OrderController::class, 'payOrder'])->name('payOrder');
