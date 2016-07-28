<?php

namespace Nuclear\Documents\ImageFilters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ReactorThumbnail implements FilterInterface
{
    /**
     * Applies filter to given image
     *
     * @param  Image $image
     * @return Image
     */
    public function applyFilter(Image $image)
    {
        return $image->fit(180, 180);
    }
}