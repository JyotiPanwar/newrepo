<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\OptimizeImage;
use App\Repositories\Image\ImageRepository;



class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:images';
    protected $model;


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize last uploaded image';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new ImageRepository();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $image_info =$this->model->findLatest();
        $newArr=array();
        if(isset($image_info)){
            $image_name=$image_info->name;
            $new_image=app('optimize_image')->scale($image_name,$size='400');
            if($new_image){
                $newArr['id']=$image_info->id;
                $newArr['new_image']=$new_image;
                $this->model->update($newArr);
                 
            }
        }

    }
}
