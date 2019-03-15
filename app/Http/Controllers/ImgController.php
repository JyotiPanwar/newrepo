<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OptimizeImage;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepository;
use Illuminate\Support\Facades\Auth;


class ImgController extends Controller
{
    protected $model;

    public function __construct()
    {
         $this->middleware('auth');

         $this->model = new ImageRepository();
    }
    public function index()
    {
        return view('imageup');     
      
    }
    public function uploadImg(Request $request)
    {
        if($request->hasfile('image'))
        {
            $param=array('');
            $user = Auth::user();
            $image = $request->file('image');
	        $name = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/images/');
    		    if($image->move($destinationPath, $name)){
                    $new_image=app('optimize_image')->awsUpload($name);
                    $param['name']=$name;
                    $param['user_id']= $user->id;
                    $this->model->create($param);
                   	return back()->with('imgname',$name);

    		    }
        }
    }    
}
