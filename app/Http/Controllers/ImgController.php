<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ImgController extends Controller
{
    
    public function index()
    {
       return view('imageup');
      
    }
    public function uploadImg(Request $request)
    {
      
    if($request->hasfile('image'))
         {

            $image = $request->file('image');
	        $name = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/images');
		    if($image->move($destinationPath, $name)){
		    	exec('ffmpeg -i '.$destinationPath.'/'.$name.' -vf "crop=412:ih:284:0" '.$destinationPath.'/croped_'.$name);
         		return back()->with('imgname',$name);

		    }
         }
    }
    

}
