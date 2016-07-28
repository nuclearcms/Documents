<?php


namespace Nuclear\Documents\Contract\Media;


interface FiltersImage {

    /**
     * Getter for the image path
     *
     * @return string
     */
    public function getImagePath();

    /**
     * Returns the image url for given filter
     *
     * @param $filter
     * @return string
     */
    public function getFilteredImageUrlFor($filter);

}