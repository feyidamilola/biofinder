<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    return view('coming-soon');
});*/

Route::get('/','IndexController@index');

Route::match(['get', 'post'], '/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => ['auth']], function () {
	Route::get('/admin/dashboard','AdminController@dashboard');	
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get', 'post'],'/admin/update-pwd','AdminController@updatePassword');

	// Admin Routes for main and sub categories
	Route::match(['get', 'post'], '/admin/add-main-category','CategoryController@addParentCategory');
	Route::get('/admin/main-categories','CategoryController@viewParentCategories');
	Route::match(['get', 'post'], '/admin/edit-main-category/{id}','CategoryController@editParentCategory');
	Route::match(['get', 'post'], '/admin/delete-main-category/{id}','CategoryController@deleteParentCategory');
	Route::match(['get', 'post'], '/admin/add-sub-category','CategoryController@addSubCategory');
	Route::get('/admin/sub-categories','CategoryController@viewSubCategories');
	Route::match(['get', 'post'], '/admin/edit-sub-category/{id}','CategoryController@editSubCategory');
	Route::match(['get', 'post'], '/admin/delete-sub-category/{id}','CategoryController@deleteSubCategory');

	// Admin Routes for vendors
	Route::match(['get', 'post'], '/admin/add-vendor','VendorsController@addVendor');
	Route::get('/admin/all-vendors','VendorsController@viewVendors');
	Route::get('/admin/new-vendors','VendorsController@newVendors');
	Route::match(['get', 'post'], '/admin/edit-vendor/{id}','VendorsController@editVendor');
	Route::match(['get', 'post'], '/admin/delete-vendor/{id}','VendorsController@deleteVendor');

	// Admin Routes for BioProducts
	Route::match(['get','post'], '/admin/create-product', 'BioProductsController@createProduct');
	Route::get('/admin/all-products', 'BioProductsController@viewProducts');
	Route::get('/admin/delete-product/{url}', 'BioProductsController@deleteProduct');
	Route::get('/admin/all-products/{url}', 'BioProductsController@viewProductDetail');
	Route::match(['get','post'],'/admin/edit-product/{url}','BioProductsController@editBioProduct');
	Route::get('/admin/delete-product-image/{id}','BioProductsController@deleteBioProductImage');

	// All Orders
	Route::match(['get','post'], '/admin/orders', 'BioProductsController@allorders');

	// Admin route for services
	Route::match(['get','post'], '/admin/create-service', 'ServicesController@createService');
	Route::get('/admin/all-services', 'ServicesController@viewService');
	Route::get('/admin/delete-service/{id}', 'ServicesController@deleteService');
	Route::match(['get','post'],'/admin/edit-service/{id}','ServicesController@editService');

	// Admin Banners Routes
	Route::match(['get','post'], '/admin/add-banner', 'BannersController@addBanner');
	Route::get('/admin/all-banners', 'BannersController@allBanners');
	Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
	Route::get('/admin/delete-banner/{id}', 'BannersController@deleteBanner');

	// All quotes
	Route::get('/admin/quotes', 'QuotesController@allQuotes');

	
// });

Route::post('/admin/login' , 'AdminController@login');
Route::get('/logout','AdminController@logout');


// Frontend Routes
Route::get('/products', 'BioProductsController@viewFrontendProducts');
Route::get('/products/{id}', 'BioProductsController@viewFrontendProductDetail');
Route::get('/products/category/{url}','BioProductsController@fetchProducts');

// Vendor's products
Route::get('/vendors/{url}','VendorsController@fetchVendorProducts');
Route::get('/vendors','VendorsController@ViewFrontendVendors');
Route::match(['get', 'post'], '/vendor/become-a-vendor','VendorsController@VendorSignup');

// Cart
Route::match(['get','post'],'/add-to-cart','BioProductsController@AddtoCart');
Route::match(['get','post'],'/cart','BioProductsController@Cart');
// Update cart quantity
Route::get('/cart/update-quantity/{id}/{quantity}','BioProductsController@UpdateCartQuantity');
// delete cart items
Route::get('/cart/delete/{id}', 'BioProductsController@deleteCartitem');

// Search
Route::get('/search', 'BioProductsController@Search');

// Quotes
Route::match(['get','post'], '/get-quote', 'QuotesController@newQuote');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User path
Route::get('/login-register', 'UsersController@userloginregister');
Route::post('/user-register', 'UsersController@register');
Route::post('/user-login', 'UsersController@userlogin');
Route::get('/user-logout', 'UsersController@userlogout');

// Check if user email currenty exists
Route::match(['get', 'post'], '/check-email', 'UsersController@checkEmail');

Route::group (['middleware' => ['FrontLogin']], function(){
	Route::match(['get', 'post'], '/profile', 'UsersController@userProfile');
	Route::match(['get', 'post'],'/update-password', 'UsersController@updatePassword');
	Route::match(['get', 'post'], '/checkout', 'BioProductsController@Checkout');
	Route::match(['get', 'post'], '/review', 'BioProductsController@OrderReview');
	Route::get('/thank-you', 'BioProductsController@Thankyou');
	Route::get('/orders', 'UsersController@userOrders');
});

Route::get('/send','EmailController@send');
