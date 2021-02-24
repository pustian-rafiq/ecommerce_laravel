<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
    public function AddCart($id){
    	$products = DB::table('products')->where('id',$id)->first();
    	$data = array();

    	if ($products->discount_price == NULL) {
    		$data['id'] = $products->id;
    		$data['name'] = $products->product_name;
    		$data['qty'] = 1;
    		$data['price'] = $products->selling_price;
    		$data['weight'] = 1;
    	    $data['options']['image'] = $products->image_one;
    	    $data['options']['color'] ='';
	        $data['options']['size']  ='';
	        Cart::add($data);
	        return response()->json(['success' => 'Successfully Added on your Cart']);
    	}else{
    		$data['id'] = $products->id;
    		$data['name'] = $products->product_name;
    		$data['qty'] = 1;
    		$data['price'] = $products->discount_price;
    		$data['weight'] = 1;
    	    $data['options']['image'] = $products->image_one;
    	    $data['options']['color']='';
	        $data['options']['size']='';
	        Cart::add($data);
	        return response()->json(['success' => 'Successfully Added on your Cart']);
    	}
    }
 public function Check()
    {
        $content=Cart::content();
        return response()->json($content);
    }
      public function showCart(){
        $carts = Cart::content();
        return view('pages.cart',compact('carts'));
    }
 public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function UpdateCart(Request $request){
        $rowId = $request->productid;
        $quantity = $request->qty;
        Cart::update($rowId,$quantity);
        return redirect()->back();
    }

}
