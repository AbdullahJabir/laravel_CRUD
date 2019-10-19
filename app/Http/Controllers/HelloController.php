<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HelloController extends Controller
{
    public function aboutcatagory()
    {
    	return view('pages.about');
    }
    public function writePost()
    {
        $category=DB::table("abooks")->get();
    	return view('post.writePost',compact('category'));
    } 

    public function AddCatagory()
    {
    	return view('post.AddCatagory');
    } 

    public function StoreCatagory(Request $request)
    {

     $validatedData = $request->validate([
             'name' => 'required|unique:abooks|max:25|min:4',
             'slug' => 'required|unique:abooks|max:25|min:4',
         ]);
    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;
        
  $category=DB::table("abooks")->insert($data);
        if ($category) {      	 $notification=array(
                'messege'=>'Successfully Category Inserted',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);   
        }else{
        	  $notification=array(
                'messege'=>'Something went wrong!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);   
        }
    }  

    public function AllCatagory()
    {
        $category=DB::table("abooks")->get();

        return view('post.all_catagory',compact('category'));
    }

   
       

}
