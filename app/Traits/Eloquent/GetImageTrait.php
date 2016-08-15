<?php

namespace App\Traits\Eloquent;

trait GetImageTrait
{
    public function getImageDefaultAttribute()
    {
        return isset($this->image) ? app()['glide.builder']->getUrl($this->image) : '';
    }

    public function getImageThumbnailAttribute()
    {
        return isset($this->image) ? app()['glide.builder']->getUrl($this->image, ['p' => 'thumbnail']) : '';
    }

    public function getImageSmallAttribute()
    {
        return isset($this->image) ? app()['glide.builder']->getUrl($this->image, ['p' => 'small']) : '';
    }

    public function getImageMediumAttribute()
    {
        return isset($this->image) ? app()['glide.builder']->getUrl($this->image, ['p' => 'medium']) : '';
    }

    public function getImageLargeAttribute()
    {
        return isset($this->image) ? app()['glide.builder']->getUrl($this->image, ['p' => 'large']) : '';
    }
}
