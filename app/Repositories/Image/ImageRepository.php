<?php

namespace App\Repositories\Image;
use App\Models\Images;

/**
 * Class ImageRepository.
 */
class ImageRepository implements ImageInterface
{
    /**
     * @return string
     *  Return the model
     */
 
    public function create(array $param)
    {
        $name=$param->name;
        $img = new Images;
              $img->name = $name;
              $img->save();
    }
    public function findLatest()
    {
       $image_info = Images::whereNull('optimized_name')->first();
       return $image_info;

    }
    public function update(array $param)
    {
       Images::where('id', $param->id)
                    ->update(['optimized_name' => $param->new_image]);
    }
    public function delete(int $param)
    {
       Images::where('id', $param->id)->delete();
    }
}
