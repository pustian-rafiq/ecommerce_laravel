
<?php

//Socailite Routes for google
 Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
 Route::get('/callback/{provider}', 'GoogleLoginController@callback');

//Socailite Routes for github
 Route::get('/auth/redirect/{provider}', 'GithubSocialController@redirect');
 Route::get('/callback/{provider}', 'GithubSocialController@callback');


//Wishlist routes Here
Route::get('add/wishlist/{id}','WishlistController@AddWishlist');

//Cart routes Here
Route::get('add/cart/{id}','CartController@AddCart');
Route::get('check','CartController@Check');
Route::get('products/cart','CartController@showCart')->name('show.cart');
// Route::get('/show/cart/product', 'CartController@showCart')->name('show.cart');

Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
 
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');
Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
// Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
// Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');
// Route::get('payment/page/','CartController@PymentPage')->name('payment.step');



//front page or single page routes
Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
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

//Category Routes
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storeCategory')->name('store.category');
Route::get('delete/category/{id}','Admin\Category\CategoryController@deleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updateCategory');

//Brand Routes
Route::get('admin/brands', 'Admin\Brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Brand\BrandController@storeBrand')->name('store.brand');
Route::get('delete/brand/{id}','Admin\Brand\BrandController@deleteBrand');
Route::get('edit/brand/{id}','Admin\Brand\BrandController@editBrand');
Route::post('update/brand/{id}','Admin\Brand\BrandController@updateBrand');


//Sub Category Routes
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


//Newsletter Routes
Route::get('admin/newsletter','FrontController@showSubscribers')->name('admin.newsletters');
Route::get('admin/delete/subscriber/{id}','FrontController@deleteSubscriber')->name('delete.subscriber');

//Product Routes
Route::get('admin/add/product','Admin\Product\ProductController@addProduct')->name('create.product');
Route::get('admin/show/allproduct','Admin\Product\ProductController@index')->name('index.product');
Route::post('admin/store/product','Admin\Product\ProductController@storeProduct')->name('store.product');
Route::get('admin/active/product/{id}','Admin\Product\ProductController@Active')->name('active.product');
Route::get('admin/deactive/product/{id}','Admin\Product\ProductController@deactive')->name('deactive.product');
Route::get('admin/view/product/{id}','Admin\Product\ProductController@ViewProduct')->name('view.product');
Route::get('admin/edit/product/{id}','Admin\Product\ProductController@EditProduct')->name('edit.product');
Route::post('admin/update/product/{id}','Admin\Product\ProductController@UpdateProductWithoutPhoto')->name('update.product');
Route::post('admin/update/product/photo/{id}','Admin\Product\ProductController@UpdateProductPhoto')->name('update.product.photo');
Route::get('admin/delete/product/{id}','Admin\Product\ProductController@DeleteProduct')->name('delete.product');

//Blog Routes
Route::get('admin/create/post','Admin\Post\PostController@createPost')->name('create.blogpost');
Route::post('admin/store/post','Admin\Post\PostController@storePost')->name('store.blogpost');
Route::get('admin/showall/post','Admin\Post\PostController@showAllPost')->name('showall.blogpost');
Route::get('admin/delete/post/{id}','Admin\Post\PostController@deletePost')->name('delete.blogpost');
Route::get('admin/edit/post/{id}','Admin\Post\PostController@editPost')->name('edit.blogpost');
Route::post('admin/update/post/{id}','Admin\Post\PostController@updatePost')->name('update.blogpost');







//Subcategry Routes using ajax
Route::get('get/subcategory/{category_id}','Admin\Product\ProductController@GetSubcat');






//FrontEnd section start here 
Route::post('store/newsletter','FrontController@storeNewsletter')->name('store.newsletter');
 Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductDetials');
 Route::post('/cart/product/add/{id}', 'ProductController@AddCart');
 Route::get('cart/product/view/{id}','ProductController@ViewProduct');
 

