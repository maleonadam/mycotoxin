<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UseraccountController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

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
    return view('homage');
})->name('welcome');

Route::get('/aboutus', [WebsiteController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::get('/contactus', [WebsiteController::class, 'contactus'])->name('contactus');
Route::get('/charter', [WebsiteController::class, 'charter'])->name('charter');
Route::get('/service_charter', [WebsiteController::class, 'service_charter'])->name('service_charter');
Route::get('/credit_cert', [WebsiteController::class, 'credit_cert'])->name('credit_cert');

Route::get('/mostselling', [OrderProductController::class, 'index'])->name('mostselling')->middleware(['role:admin', 'auth']);
Route::get('/orderitems', [OrderProductController::class, 'allItems'])->name('orderitems')->middleware(['role:admin', 'auth']);
Route::get('/servicesreport/excel', [OrderProductController::class, 'exportServicesReport'])->name('servicesreport.excel');
Route::post('/checkreport', [OrderProductController::class, 'checkReport'])->name('checkreport')->middleware(['role:admin', 'auth']);


Route::get('/products', [WebsiteController::class, 'allProducts'])->name('allproducts');
Route::get('/allfeedback', [WebsiteController::class, 'showFeedback'])->name('allfeedback')->middleware(['role:staff', 'auth']);
Route::get('/allfeedback/{id}', [WebsiteController::class, 'showClientForm'])->name('clientform')->middleware(['role:staff', 'auth']);
Route::get('/feedback', [WebsiteController::class, 'feedback'])->name('feedback');
Route::post('/feedback', [WebsiteController::class, 'submitFeedback'])->name('submitfeedback');
Route::post('/inquiry', [WebsiteController::class, 'submitInquiry'])->name('submitinquiry');

Route::resource('adminproducts', ProductController::class)->middleware(['role:staff', 'auth']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-product/{id}', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/thankyou', [ConfirmationController::class, 'index'])->name('confirmation.index');

    Route::get('/my-orders', [OrderController::class, 'index'])->name('my-orders.index');
    Route::get('/my-orders/{id}', [OrderController::class, 'clientViewSingleOrder'])->name('my-orders.show');
});


Route::get('/orderschart', [OrderController::class, 'viewOrdersChart'])->name('orderschart')->middleware(['role:admin', 'auth']);
Route::get('/ordersreport', [OrderController::class, 'viewOrdersReport'])->name('ordersreport')->middleware(['role:admin', 'auth']);
Route::get('/ordersreport/excel', [OrderController::class, 'exportOrdersReport'])->name('ordersreport.excel')->middleware(['role:admin', 'auth']);

Route::get('/my-orders/signed/{id}', [OrderController::class, 'signed'])->name('my-orders.signed')->middleware(['role:user', 'auth']);
Route::patch('/my-orders/signed/{id}', [OrderController::class, 'uploadSigned'])->name('my-orders.upload-signed')->middleware(['role:user', 'auth']);

Route::get('/my-orders/payment/{id}', [OrderController::class, 'payment'])->name('my-orders.payment')->middleware(['role:user', 'auth']);
Route::patch('/my-orders/payment/{id}', [OrderController::class, 'uploadPayment'])->name('my-orders.upload-payment')->middleware(['role:user', 'auth']);
Route::get('/my-orders/paymentone/{id}', [OrderController::class, 'paymentone'])->name('my-orders.paymentone')->middleware(['role:user', 'auth']);
Route::patch('/my-orders/paymentone/{id}', [OrderController::class, 'uploadPaymentOne'])->name('my-orders.upload-paymentone')->middleware(['role:user', 'auth']);

Route::get('/all-orders', [OrderController::class, 'allorders'])->name('all-orders.index')->middleware(['role:staff', 'auth']);
Route::get('/all-orders/show/{id}', [OrderController::class, 'staffViewSingleOrder'])->name('all-orders.show')->middleware(['role:staff', 'auth']);
Route::get('/all-orders/{id}', [OrderController::class, 'edit'])->name('all-orders.edit')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/{id}', [OrderController::class, 'update'])->name('all-orders.update')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/reject/{id}', [OrderController::class, 'getReject'])->name('all-orders.getreject')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/reject/{id}', [OrderController::class, 'rejectOrder'])->name('all-orders.reject')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/budget/{id}', [OrderController::class, 'budget'])->name('all-orders.budget')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/budget/{id}', [OrderController::class, 'uploadBudget'])->name('all-orders.upload-budget')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/invoice/{id}', [OrderController::class, 'invoice'])->name('all-orders.invoice')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/invoice/{id}', [OrderController::class, 'uploadInvoice'])->name('all-orders.upload-invoice')->middleware(['role:staff', 'auth']);

Route::get('/all-orders/service/{id}', [OrderController::class, 'service'])->name('all-orders.service')->middleware(['role:staff', 'auth']);
Route::patch('/all-orders/service/{id}', [OrderController::class, 'uploadService'])->name('all-orders.upload-service')->middleware(['role:staff', 'auth']);

Route::get('/all-order-items/{id}', [OrderController::class, 'editItemStatus'])->name('all-order-items.edit')->middleware(['role:staff', 'auth']);
Route::patch('/all-order-items/{id}', [OrderController::class, 'updateItemStatus'])->name('all-order-items.update')->middleware(['role:staff', 'auth']);
Route::get('/all-order-items/result/{id}', [OrderController::class, 'itemResult'])->name('all-order-items.result')->middleware(['role:staff', 'auth']);
Route::patch('/all-order-items/result/{id}', [OrderController::class, 'uploadItemResult'])->name('all-order-items.upload-result')->middleware(['role:staff', 'auth']);
Route::get('/all-order-items/rawdata/{id}', [OrderController::class, 'itemRawdata'])->name('all-order-items.rawdata')->middleware(['role:staff', 'auth']);
Route::patch('/all-order-items/rawdata/{id}', [OrderController::class, 'uploadItemRawdata'])->name('all-order-items.upload-rawdata')->middleware(['role:staff', 'auth']);

Route::get('/payment/download/{payment}', [OrderController::class, 'downloadPayment']);
Route::get('/paymentone/download/{paymentone}', [OrderController::class, 'downloadPaymentOne']);

Route::get('/signed/download/{signed}', [OrderController::class, 'downloadSigned']);

Route::get('/budget/download/{budget}', [OrderController::class, 'downloadBudget']);
Route::get('/budget/download/{invoice}', [OrderController::class, 'downloadInvoice']);
Route::get('/service/download/{service}', [OrderController::class, 'downloadService']);
Route::get('/item_result/download/{item_result}', [OrderController::class, 'downloadItemResult']);
Route::get('/item_rawdata/download/{item_rawdata}', [OrderController::class, 'downloadItemRawdata']);

Route::post('search-orders', [OrderController::class, 'search'])->middleware(['role:staff', 'auth']);

Auth::routes();

Route::get('/users', [UsersController::class, 'getAllUsers'])->middleware(['role:admin', 'auth']);
Route::get('/userschart', [UsersController::class, 'viewUsersChart'])->name('userschart')->middleware(['role:admin', 'auth']);
Route::post('search-users', [UsersController::class, 'search'])->middleware(['role:admin', 'auth']);
Route::get('/assign/role/{user_id}', [UsersController::class, 'getAssignRole'])->middleware(['role:admin', 'auth']);
Route::post('/assign/role/{user_id}', [UsersController::class, 'assignRole'])->name('assignRole')->middleware(['role:admin', 'auth']);
Route::get('/remove/role/{user_id}', [UsersController::class, 'getRemoveRole'])->middleware(['role:admin', 'auth']);
Route::post('/remove/role/{user_id}', [UsersController::class, 'removeRole'])->name('removeRole')->middleware(['role:admin', 'auth']);

Route::get('/useraccount', [UseraccountController::class, 'index']);
Route::get('/useraccount/edit', [UseraccountController::class, 'edit']);
Route::post('/useraccount/{id}/edit', [UseraccountController::class, 'update'])->name('editProfile');
Route::get('/change/password', [UseraccountController::class, 'changePassword']);
Route::post('/change/password', [UseraccountController::class, 'postChangePassword'])->name('changePassword');



Route::get('/home', [HomeController::class, 'index'])->name('home');
