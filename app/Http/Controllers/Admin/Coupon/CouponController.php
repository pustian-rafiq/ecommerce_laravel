<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use APP\Model\Admin\Coupon;
use DB;
class CouponController extends Controller
{
   // this function works as a gurad.It checks the user is authenticate or not.
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function Coupon(){
    	$coupons = DB::table('coupons')->get();
    	return view('admin.coupon.coupon',compact('coupons'));
    }
    public function storeCoupon(Request $request){
    	 $validateData = $request->validate([
    		'coupon_code' => 'required|unique:coupons|max:55',
    		'discount' => 'required|unique:coupons|max:10'
    	]);
    	 //using ORM
    	 // $coupon = new Coupon();
    	 // $coupon->coupon_code = $request->coupon_code;
    	 // $coupon->discount = $request->discount;
    	 // $coupon->save();

    	 $data = array();
    	 $data['coupon_code']= $request->coupon_code;
    	 $data['discount']= $request->discount;
    	 DB::table('coupons')->insert($data);
    	 $notification =array(
    	 	'messege' => 'Coupon Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );
    	  return Redirect()->back()->with($notification);
    }
    public function deleteCoupon($id){
    	DB::table('coupons')->where('id',$id)->delete();
    	 $notification =array(
    	 	'messege' => 'Coupon Deleted Successfully',
    	 	'alert-type' => 'success'
    	 );
    	  return Redirect()->back()->with($notification);

    }
    public function editCoupon($id){
    	$coupon = DB::table('coupons')->where('id',$id)->first();
    	return view('admin.coupon.edit_coupon',compact('coupon'));
    }

    public function updateCoupon(Request $request, $id){
    	$validateData = $request->validate([
    		'coupon_code' => 'required|max:55',
    		'discount' => 'required|max:10'
    	]);
    	 

    	 $data = array();
    	 $data['coupon_code']= $request->coupon_code;
    	 $data['discount']= $request->discount;
    	 $update = DB::table('coupons')->where('id',$id)->update($data);
    	 
    	 if ($update) {
        	$notification=array(
                 'messege'=>'Coupon Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('coupons')->with($notification);
        }else{
        	$notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('coupons')->with($notification);
        }
    }

}
