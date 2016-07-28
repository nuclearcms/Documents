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
     * @param $filter
     * @return string
     */
    public function filteredImageWith($filter)
    {
        return $this->wrapImage($this->entity->getFilteredImageUrlFor($filter));
    }

    /**
     * Wraps the image url with the necessary html
     *
     * @param string $url
     * @return string
     */
    public function wrapImage($url)
    {
        return '<img class="document-thumbnail__image" src="' .
            $url . '" alt="' . $this->alttext . '">';
    }

}