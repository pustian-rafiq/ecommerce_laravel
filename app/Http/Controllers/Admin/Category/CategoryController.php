<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use DB;

class CategoryController extends Controller
{
	// this function works as a gurad.It checks the user is authenticate or not.
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$categories = Category::all();
    	return view('admin.category.category',compact('categories'));
    }

    public function storeCategory(Request $request){

    	$validateData = $request->validate([
    		'category_name' => 'required|unique:categories|max:55'
    	]);
    	// Data insert using 
    	// $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        // Data insert using Eloquent ORM
    	$category = new Category();
    	$category->category_name = $request->category_name;
    	$category->save();

    	$notification=array(
                 'messege'=>'Category Inserted Successfully',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function deleteCategory(Request $request, $id){
    	DB::table('categories')->where('id',$id)->delete();
    	$notification=array(
                 'messege'=>'Category Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

     public function editCategory($id)
    {
    	$category=DB::table('categories')->where('id',$id)->first();
    	return view('admin.category.edit_category',compact('category'));
    }

    public function updateCategory(Request $request, $id){
    	$validatedData = $request->validate([
        'category_name' => 'required|max:55',
        ]);
         $data=array();
         $data['category_name']=$request->category_name;
         $update= DB::table('categories')->where('id',$id)->update($data);
        if ($update) {
        	$notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('categories')->with($notification);
        }else{
        	$notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('categories')->with($notification);
        }
    }
}
