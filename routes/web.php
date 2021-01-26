<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//***********Admin section******************

//Category section
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storeCategory')->name('store.category');
Route::get('delete/category/{id}','Admin\Category\CategoryController@deleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updateCategory');

//Brand section
Route::get('admin/brands', 'Admin\Brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Brand\BrandController@storeBrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\Brand\BrandController@deleteBrand');
Route::get('edit/brand/{id}','Admin\Brand\BrandController@editBrand');
Route::post('update/brand/{id}','Admin\Brand\BrandController@updateBrand');


//Sub Category section
Route::get('admin/sub/categories', 'Admin\Subcategory\SubcategoryController@subCategories')->name('sub.categories');
Route::post('admin/store/sub/category', 'Admin\Subcategory\SubcategoryController@storeSubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Subcategory\SubcategoryController@deleteSubcategory');
Route::get('edit/subcategory/{id}', 'Admin\Subcategory\SubcategoryController@editSubcategory');
Route::post('update/subcategory/{id}', 'Admin\Subcategory\SubcategoryController@updateSubcategory');

//Coupon section using name route
Route::get('admin/coupons','Admin\Coupon\CouponController@Coupon')->name('coupons');
Route::post('admin/store/coupon', 'Admin\Coupon\CouponController@storeCoupon')->name('store.coupon');//{{ route('admin.post.approve',$post->id) }}

Route::get('delete/coupon/{id}','Admin\Coupon\CouponController@deleteCoupon')->name('delete.coupon');
Route::get('edit/coupon/{id}', 'Admin\Coupon\CouponController@editCoupon')->name('edit.coupon');
Route::post('update/coupon/{id}', 'Admin\Coupon\CouponController@updateCoupon')->name('update.coupon');


//Newsletter Section
Route::get('admin/newsletter','FrontController@showSubscribers')->name('admin.newsletters');
Route::get('admin/delete/subscriber/{id}','FrontController@deleteSubscriber')->name('delete.subscriber');

//Product Section
Route::get('admin/add/product','Admin\Product\ProductController@addProduct')->name('add.product');
Route::get('admin/show/allproduct','Admin\Product\ProductController@showAllProduct')->name('all.product');
Route::post('admin/store/product','Admin\Product\ProductController@storeAllProduct')->name('store.product');


//FrontEnd section start here
 
Route::post('store/newsletter','FrontController@storeNewsletter')->name('store.newsletter');

