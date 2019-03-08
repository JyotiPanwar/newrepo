<?php 

namespace App\Services;

class OptimizeImage {
   
      
    public function __construct(){
       
    }

   
    public function scale(string $image_name, string $size){
    	 $destinationPath=public_path('/images/');
         exec('ffmpeg -i '.$destinationPath.''.$image_name.' -vf scale='.$size.':-1 '.$destinationPath.'scaled_'.$image_name);
    }

}