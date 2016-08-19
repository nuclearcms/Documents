<?php


namespace Nuclear\Documents\Presenters;


trait PresentsFilteredImage {

    /**
     * Previews the image with given filter
     *
     * @param string $filter
     * @param bool $compact
     * @return string
     */
    public function previewWithFilter($filter, $compact = false)
    {
        return $this->wrapPreview(
            $this->filteredImageWith($filter),
            $compact
        );
    }

    /**
     * Returns the image html for given filter
     *
     * @param string $filter
     * @param string $class
     * @return string
     */
    public function filteredImageWith($filter, $class = '')
    {
        return $this->wrapImage($this->entity->getFilteredImageUrlFor($filter), $class);
    }

    /**
     * Wraps the image url with the necessary html
     *
     * @param string $url
     * @param string $class
     * @return string
     */
    public function wrapImage($url, $class = '')
    {
        return '<img class="' . $class . '" src="' .
            $url . '" alt="' . $this->alttext . '">';
    }

}