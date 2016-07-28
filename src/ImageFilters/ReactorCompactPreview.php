<?php


namespace Nuclear\Documents\ImageFilters;


use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ReactorCompactPreview implements FilterInterface {

    /**
     * Applies filter to given image
     *
     * @param  Image $image
     * @return Image
     */
    public function applyFilter(Image $image)
    {
        if ($image->width() >= $image->height())
        {
            return $image->resize(272, null, function ($constraint)
            {
                $constraint->aspectRatio();
            });
        }

        return $image->resize(null, 272, function ($constraint)
        {
            $constraint->aspectRatio();
        });
    }
}