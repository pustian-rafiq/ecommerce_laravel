<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use DB;

class SubcategoryController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
   public function subCategories(){
   		$category = Category::all();
   		$subcategory=DB::table('subcategories')
				 ->join('categories','subcategories.category_id','categories.id')
				 ->select('subcategories.*','categories.category_name')
				 ->get();
   		return view('admin.subcategory.subcategory',compact('category','subcategory'));
   }
   public function storeSubcategory(Request $request){
   		$validateData = $request->validate([
    		'subcategory_name' => 'required',
    		'category_id' => 'required',
    	]);
     

        // Data insert using Eloquent ORM
    	$subcategory = new Subcategory();
    	$subcategory->category_id = $request->category_id;
    	$subcategory->subcategory_name = $request->subcategory_name;
    	
    	$subcategory->save();

    	$notification=array(
                 'messege'=>'Subcategory Inserted Successfully',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
   }

    public function deleteSubcategory($id){
    	DB::table('subcategories')->where('id',$id)->delete();
    	$notification=array(
                 'messege'=>'Subcategory Deleted Successfully',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
   	
   }

   public function editSubcategory($id){
   		$subcategory=DB::table('subcategories')->where('id',$id)->first();
   		$category = Category::all();
    	return view('admin.subcategory.edit_subcategory',compact('category','subcategory'));
   }

   public function updateSubcategory(Request $request ,$id){
   		$data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Sub Category Updated',
                'alert-type'=>'success'
                );
        return Redirect()->route('sub.categories')->with($notification); 
    }
}
