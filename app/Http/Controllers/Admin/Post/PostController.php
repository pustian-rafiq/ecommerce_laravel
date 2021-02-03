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

    public function showAllPost(){
    	$posts= DB::table('posts')
    				->join('category_posts','posts.category_id','category_posts.id')
    				->select('posts.*','category_posts.category_name_en')
    				->get();
    	return view('admin.blog.show',compact('posts'));
    }

     	
    public function deletePost($id){
    	$post = DB::table('posts')->where('id',$id)->first();
    	$image = $post->post_image;
    	unlink($image);
    	DB::table('posts')->where('id',$id)->delete();
    	$notification=array(
                     'messege'=>'Successfully Post Deleted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);	
    	
    }
    public function editPost($id){
    	$category = DB::table('category_posts')->get();
    	$post= DB::table('posts')
    				->join('category_posts','posts.category_id','category_posts.id')
    				->select('posts.*','category_posts.category_name_en')
    				->where('posts.id',$id)
    				->first();
    	return view('admin.blog.edit',compact('post','category'));
    	
    }
     	
    public function updatePost(Request $request ,$id){
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

    	$old_image = $request->old_image;
    	$post_image1=$request->file('post_image');
    	if ($post_image1) {
    		unlink($old_image);
    		$post_image_name = hexdec(uniqid()).'.'.$post_image1->getClientOriginalExtension();
    		 Image::make($post_image1)->resize(300,300)->save('public/media/post/'.$post_image_name);
            
            $post['post_image'] = 'public/media/post/'.$post_image_name;

        	$update = DB::table('posts')->where('id',$id)->update($post);
        	if ($update) {
        	$notification = array(
    			'messege' => 'Post Successfully Updated with image',
    			'alert-type' => 'success'
    		);
    		return Redirect()->route('showall.blogpost')->with($notification);
        	}else{
    		$notification = array(
    			'messege' => 'Post Not to Update',
    			'alert-type' => 'success'
    		);
    		return Redirect()->route('showall.blogpost')->with($notification);
    	}
    	}else{
    		 
            $update = DB::table('posts')->where('id',$id)->update($post);
            if ($update) {
            	  $notification=array(
                     'messege'=>'Successfully Post updated without Image ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('showall.blogpost')->with($notification);	
            }else{
    		$notification = array(
    			'messege' => 'Post Not to Update',
    			'alert-type' => 'success'
    		);
    		return Redirect()->route('showall.blogpost')->with($notification);
    	   }
             
     }
    }
}
