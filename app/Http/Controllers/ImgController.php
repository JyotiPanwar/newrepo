<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OptimizeImage;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;



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
              $filePath = 'images/jyoti' . $name;
              Storage::disk('s3')->put($filePath, file_get_contents($image));
              $img = new Images;
              $img->name = $name;
              $img->save();
           		return back()->with('imgname',$name);

  		    }
        }
    }    

}
