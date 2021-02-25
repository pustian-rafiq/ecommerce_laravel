<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Response;
use Auth;
 
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

  public function InsertCart(Request $request)
    {
         $id=$request->product_id;
          $product=DB::table('products')->where('id',$id)->first();
          $data=array();
          if ($product->discount_price == NULL) {
                        $data['id']=$product->id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;;
                        $data['price']= $product->selling_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                      Cart::add($data);
                       $notification=array(
                              'messege'=>'Successfully Done',
                               'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
           }else{
                       $data['id']=$product->id;
                        $data['name']=$product->product_name;
                        $data['qty']=$request->qty;;
                        $data['price']= $product->discount_price;          
                        $data['weight']=1;
                        $data['options']['image']=$product->image_one;  
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                        Cart::add($data);  
                      $notification=array(
                              'messege'=>'Successfully Done',
                               'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
         }
    }

    public function Checkout(){


        if (Auth::check()) {
            $carts=Cart::content();
              return view('pages.checkout',compact('carts'));
        }else{
            $notification=array(
                   'messege'=>'At first login your account',
                   'alert-type'=>'error'
                 );
               return Redirect()->route('login')->with($notification);
        }
    }
    public function Wishlist(){

        $userid = AUth::id();
        $products = DB::table('Wishlists')
                    ->join('products','Wishlists.product_id','products.id')
                    ->select('products.*','Wishlists.user_id')
                    ->where('Wishlists.user_id',$userid)
                    ->get();

                    return view('pages.Wishlist',compact('products'));
        
    }

}
