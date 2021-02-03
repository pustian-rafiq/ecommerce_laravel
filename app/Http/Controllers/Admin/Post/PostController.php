<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class PostController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function createPost(){
    	$category = DB::table('category_posts')->get();
    	return view('admin.blog.create',compact('category'));
    }

    public function storePost(Request $request){
    	$validateData = $request->validate([
    		'post_title_en' => 'required',
    		'post_title_bn' => 'required',
    	    'category_id' => 'required',
    		'post_details_en' => 'required',
     		'post_details_bn' => 'required'
    	]);
    	$post = array();
     	$post['post_title_en'] = $request->post_title_en;
    	$post['post_title_bn'] = $request->post_title_bn;
    	$post['category_id']   = $request->category_id;
     	$post['details_en']    = $request->post_details_en;
    	$post['details_bn']    = $request->post_details_bn;

    	//$post_image1 = $request->post_image;
    	$post_image1=$request->file('post_image');
    	if ($post_image1) {
    		$post_image_name = hexdec(uniqid()).'.'.$post_image1->getClientOriginalExtension();
    		 Image::make($post_image1)->resize(300,300)->save('public/media/post/'.$post_image_name);
            
            $post['post_image'] = 'public/media/post/'.$post_image_name;
        	 DB::table('posts')->insert($post);
    		$notification = array(
    			'messege' => 'Post Successfully Inserted',
    			'alert-type' => 'success'
    		);
    		return Redirect()->back()->with($notification);

    	}else{
    		 $post['post_image']='';
              DB::table('posts')->insert($post);
               $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);	
    	}
    }
}
