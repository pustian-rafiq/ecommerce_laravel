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
        $product['product_details'] = $request->product_details;
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

       /*Image insert using laravel image intervention*/
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
    // Shows all product in the index page
    public function index(){
    	  // $categories = Category::all();
         //brands = Brand::all();
        $products = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('products.*','categories.category_name','brands.brand_name')
                    ->get();
                  return view('admin.product.index',compact('products'));
         
    }

    public function Active($id){
        DB::table('products')->where('id',$id)->update(['status'=> 1]);
        $notification = array(
                'messege' => 'Product  Successfully Activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }
     public function Deactive($id){
        DB::table('products')->where('id',$id)->update(['status'=> 0]);
        $notification = array(
                'messege' => 'Product  Successfully Deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function DeleteProduct($id){
        $product = DB::table('products')->where('id',$id)->first();
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        DB::table('products')->where('id',$id)->delete();
        $notification = array(
                'messege' => 'Product  Successfully Deleted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function ViewProduct($id){
        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->join('subcategories','products.subcategory_id','categories.id')
                    ->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')
                    ->where('products.id',$id)->first();
                 return view('admin.product.show',compact('product'));
                    //return response()->json($products);
    }

    public function EditProduct($id){
        $brand = DB::table('brands')->get();
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')->get();
        $product = DB::table('products')->where('id',$id)->first();

        return view('admin.product.edit',compact('product','category','subcategory','brand'));
    }

    public function UpdateProductWithoutPhoto(Request $request, $id){
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
        $product['discount_price']  = $request->discount_price;
        $product['product_details'] = $request->product_details;
        $product['video_link']      = $request->video_link;
        $product['main_slider']     = $request->main_slider;
        $product['hot_deal']        = $request->hot_deal;
        $product['best_rated']      = $request->best_rated;
        $product['trend']           = $request->trend;
        $product['mid_slider']      = $request->mid_slider;
        $product['hot_new']         = $request->hot_new;
        $product['buyone_getone']   = $request->buyone_getone;

        $update_product = DB::table('products')->where('id',$id)->update($product);

        if ($update_product) {
            $notification = array(
                'messege' => 'Product Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('index.product')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Nothing To Update',
                'alert-type' => 'success'
            );
            return Redirect()->route('index.product')->with($notification);
           
    }
}


 public function UpdateProductPhoto(Request $request,$id)
    {
        $old_one=$request->old_one;
        $old_two=$request->old_two;
        $old_three=$request->old_three;

        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
        $data=array();

        if($request->has('image_one')) {
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
           $data['image_one']='public/media/product/'.$image_one_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('index.product')->with($notification);


        }if($request->has('image_two')) {
           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
           $data['image_two']='public/media/product/'.$image_two_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('index.product')->with($notification);
        }if($request->has('image_three')) {
           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
           $data['image_three']='public/media/product/'.$image_three_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Three Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('index.product')->with($notification);
        }if($request->has('image_one') && $request->has('image_two')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
           $data['image_one']='public/media/product/'.$image_one_name;
            
           unlink($old_two); 
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
           $data['image_two']='public/media/product/'.$image_two_name;

           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('index.product')->with($notification);
           


        }if($request->has('image_one') && $request->has('image_two') && $request->has('image_three')){
           unlink($old_one);
           unlink($old_two);
           unlink($old_three);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('public/media/product/'.$image_one_name);
           $data['image_one']='public/media/product/'.$image_one_name;
            
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('public/media/product/'.$image_two_name);
           $data['image_two']='public/media/product/'.$image_two_name;

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('public/media/product/'.$image_three_name);
           $data['image_three']='public/media/product/'.$image_three_name;
            DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('index.product')->with($notification);
          

        }
         return Redirect()->route('index.product');
    }

    // Collect Subcategories Uisng Ajax
    public function GetSubcat($category_id){
    	$cat = DB::table("subcategories")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }
        
}
