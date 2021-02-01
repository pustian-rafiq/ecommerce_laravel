<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Brand;
use DB;
use Image;
class ProductController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addProduct(){
    	  $category = Category::all();
    	  $subcategories = Subcategory::all();
    	  $brand = Brand::all();

    	//$category=DB::table('categories')->get();
    	//$brand=DB::table('brands')->get();
    	return view('admin.product.add_product',compact('category','subcategories','brand'));
    }
    public function storeProduct(Request $request){
    	$validateData = $request->validate([
    		'product_name' => 'required',
    		'product_code' => 'required',
    		'product_quantity' => 'required',
    		'category_id' => 'required',
    		'product_size' => 'required',
    		'selling_price' => 'required',
    		'product_details' => 'required'
    	]);
    	$product = array();
    	$product['product_name']    = $request->product_name;
    	$product['product_code']    = $request->product_code;
    	$product['product_quantity']= $request->product_quantity;
    	$product['category_id']     = $request->category_id;
        $product['brand_id']        = $request->brand_id;
    	$product['subcategory_id']  = $request->subcategory_id;
    	$product['product_size']    = $request->product_size;
    	$product['product_color']   = $request->product_color;
    	$product['selling_price']   = $request->selling_price;
        $product['product_details']   = $request->product_details;
    	$product['video_link']      = $request->video_link;
    	$product['main_slider']     = $request->main_slider;
    	$product['hot_deal']        = $request->hot_deal;
    	$product['best_rated']      = $request->best_rated;
    	$product['trend']           = $request->trend;
    	$product['mid_slider']      = $request->mid_slider;
    	$product['hot_new']         = $request->hot_new;
    	$product['status']          = 1;

    	$image_one = $request->image_one;
    	$image_two = $request->image_two;
    	$image_three = $request->image_three;

    	if ($image_one && $image_two && $image_three) {
    		$image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    		$image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    		// $upload_path = 'public/media/product/';
    		// $success = $image_one->move($upload_path,image_one_name);
    		// $success = $image_two->move($upload_path,image_two_name);

            Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
            Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $product['image_one'] = 'public/media/product/'.$image_one_name;
            $product['image_two'] = 'public/media/product/'.$image_two_name;
            $product['image_three'] = 'public/media/product/'.$image_three_name;

    		// $product['image_one'] = $image_one_name;
    		// $product['image_two'] = $image_two_name;

    		$products = DB::table('products')->insert($product);
    		$notification = array(
    			'messege' => 'Product Successfully Inserted',
    			'alert-type' => 'success'
    		);
    		return Redirect()->back()->with($notification);
    	}
    }
    public function showProduct(){
    	// $categories = Category::all();
    	// return view('admin.category.category',compact('categories'));
    }
    // Collect Subcategories Uisng Ajax
    public function GetSubcat($category_id){
    	$cat = DB::table("subcategories")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }
}
