<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OptimizeImage;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Images;


class ImgController extends Controller
{
    
    public function index()
    {
       return view('imageup');
       /*$lastImage = Images::orderBy('created_at', 'DESC')->first();
       echo '<pre>';
       print_r($lastImage);
       exit;*/
      
    }
    public function uploadImg(Request $request)
    {
        if($request->hasfile('image'))
        {

            $image = $request->file('image');
	        $name = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/images');
		    if($image->move($destinationPath, $name)){
               // $new_image=app('optimize_image')->scale($name,$size='400');
                $img = new Images;
                $img->name = $name;
                $img->save();
         		return back()->with('imgname',$name);

		    }
        }
    }    

}
