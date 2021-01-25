<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function storeNewsletter(Request $request){
    	$validateData = $request->validate([
    		'email' => 'required|unique:newslaters'
    	]);
    	$data = array();
    	$data['email']= $request->email;
    	DB::table('newslaters')->insert($data);
    	$notification=array(
                 'messege'=>'Thanks for subscribing',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    public function showSubscribers(){
    	$subscribers = DB::table('newslaters')->get();
    	return view('admin.coupon.newsletter',compact('subscribers'));
    }
    public function deleteSubscriber($id){
    	DB::table('newslaters')->where('id',$id)->delete();
    	$notification=array(
                 'messege'=>'Subscriber Deleted SUccessfully',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
}
