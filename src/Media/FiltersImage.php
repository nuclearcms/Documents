<?php


namespace Nuclear\Documents\Media;


trait FiltersImage {

    /**
     * Returns the image url for given filter
     *
     * @param $filter
     * @return string
     */
    public function getFilteredImageUrlFor($filter)
    {
        return url(config('imagecache.route') . '/' . $filter . '/' . $this->getImagePath());
    }

}