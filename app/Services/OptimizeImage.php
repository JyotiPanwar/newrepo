<?php 

namespace App\Services;
use Illuminate\Support\Facades\Storage;


class OptimizeImage {
   
      
    public function __construct(){
       
    }

   
    public function scale(string $image_name, string $size){
    	 $destinationPath=public_path('/images/');
         exec('ffmpeg -i '.$destinationPath.''.$image_name.' -vf scale='.$size.':-1 '.$destinationPath.'scaled_'.$image_name);
         return 'scaled_'.$image_name;
    }
    public function awsUpload(string $image_name){
    	 $destinationPath='jyoti/'.$image_name;
         $storagePath = Storage::disk('s3')->put($destinationPath, 'public');
         return true;

    }

}