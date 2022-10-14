<?php 
namespace App\Repositories\Slider;

use App\Repositories\BaseRepositoryInterface;

interface SliderRepositoryInterface extends BaseRepositoryInterface
{
    public function getSliders();
}
