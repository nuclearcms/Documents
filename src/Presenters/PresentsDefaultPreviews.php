<?php


namespace Nuclear\Documents\Presenters;


trait PresentsDefaultPreviews {

    /**
     * Presents the full preview of the media
     *
     * @return string
     */
    public function preview()
    {
        return $this->wrapPreview(
            $this->name() . $this->originalLink() . $this->metaDescription()
        );
    }

    /**
     * Presents a compact preview of the media
     *
     * @return string
     */
    public function compactPreview()
    {
        return $this->wrapPreview(
            $this->name() . $this->originalLink() . $this->metaDescription(),
            true);
    }

}