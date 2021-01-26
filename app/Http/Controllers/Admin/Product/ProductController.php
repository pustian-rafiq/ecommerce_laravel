<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use App\Model\Admin\Category;
  use App\Model\Admin\Subcategory;
  use App\Model\Admin\Brand;
use DB;
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
    public function showProduct(){
    	// $categories = Category::all();
    	// return view('admin.category.category',compact('categories'));
    }
}
