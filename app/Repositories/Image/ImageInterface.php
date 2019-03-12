<?php

namespace App\Repositories\Image;


interface ImageInterface {


    public function create($param);


    public function findLatest();


    public function update($id);
    
    public function delete($id);
}
