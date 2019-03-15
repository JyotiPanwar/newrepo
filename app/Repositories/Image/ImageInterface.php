<?php

namespace App\Repositories\Image;


interface ImageInterface {


    public function create(array $param);

    public function findLatest();

    public function update(array $param);
    
    public function delete(int $id);
    public function fetchAll();
}
