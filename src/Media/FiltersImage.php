<?php


namespace Nuclear\Documents\Media;


trait FiltersImage {

    /**
     * Returns the image url for given filter
     *
     * @param $filter
     * @return string
     */
    public function imageURLFor($filter)
    {
        return url(config('imagecache.route') . '/' . $filter . '/' . $this->getImagePath());
    }

    /**
     * Alias for imageURLFor
     *
     * @deprecated
     *
     * @param $filter
     * @return string
     */
    public function getFilteredImageUrlFor($filter)
    {
        return $this->imageURLFor($filter);
    }

}