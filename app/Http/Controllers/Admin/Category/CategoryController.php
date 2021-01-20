<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;

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
}
