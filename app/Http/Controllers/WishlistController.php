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
    			 $notification=array(
                        'messege'=>'Product aleady has your wishlist',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification); 
    		}else{
    			DB::table('wishlists')->insert($data);
    			 $notification=array(
                        'messege'=>'Added to wishlist',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
    		}
    	}else{
    		$notification=array(
                        'messege'=>'First your login',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification); 
    	}

    }
}
