<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function AddWishlist($id){
    	$userid = Auth::id();
    	$check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	//insert to wishlist table
    	$data = array(
    		'user_id' => $userid, 
    		'product_id'=>$id 
    	);
    	if (Auth::check()) {
    		if ($check) {
           return response()->json(['error' => 'Product Already has on your wishlist']); 
    			 // $notification=array(
        //                 'messege'=>'Product aleady has your wishlist',
        //                 'alert-type'=>'error'
        //                  );
        //                return Redirect()->back()->with($notification); 
    		}else{
    			DB::table('wishlists')->insert($data);
           return response()->json(['success' => 'Successfully Added on your wishlist']); 
    			 // $notification=array(
        //                 'messege'=>'Added to wishlist',
        //                 'alert-type'=>'success'
        //                  );
        //                return Redirect()->back()->with($notification); 
    		}
    	}else{
             return response()->json(['error' => 'At first login your account']);  
    		// $notification=array(
      //                   'messege'=>'First your login',
      //                   'alert-type'=>'error'
      //                    );
      //                  return Redirect()->back()->with($notification); 
    	}

    }
}
