<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Images;
use App\Services\OptimizeImage;


class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:images';

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
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $image_info = Images::where('optimize_image','')->orderBy('created_at', 'DESC')->first();
        $image_name=$image_info->name;
        $new_image=app('optimize_image')->scale($image_name,$size='400');
        Images::where('id', $image_info->id)
                ->update(['optimize_image' => 'scaled_'.$image_name]);

    }
}