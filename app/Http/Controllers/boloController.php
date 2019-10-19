<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class boloController extends Controller
{
    //
     public function ViewCatagory($id)
    {
        $category=DB::table('abooks')->where('id',$id)->first();
         /*$category=DB::table('abooks')->where('id',$id)->first();
        return response()->json($category);*/
        return view('post.catagoryView',compact('category'));
    }

        public function EditCategory($id)
    {   
    	$category=DB::table('abooks')->where('id',$id)->first();
    	return view('post.editcategory',compact('category'));
    }

    public function UpdateCategory(Request $request,$id)
    {
    	$validatedData = $request->validate([
             'name' => 'required|max:25|min:4',
             'slug' => 'required|max:25|min:4',
         ]);
    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;
        $category=DB::table('abooks')->where('id',$id)->update($data);
        if ($category) {
        	 $notification=array(
                'messege'=>'Successfully Category Updated',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.catagory')->with($notification);   
        }else{
        	  $notification=array(
                'messege'=>'Nothing to updated',
                'alert-type'=>'error'
                 );
               return Redirect()->route('all.catagory')->with($notification);   
        }
    }
}
