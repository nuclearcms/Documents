<?php


namespace Nuclear\Documents\Contract\Presenters;


interface PresentsMedia {

    /**
     * Presents the title
     *
     * @return string
     */
    public function title();

    /**
     * Presents the caption
     *
     * @return string
     */
    public function caption();

    /**
     * Presents the caption
     *
     * @return string
     */
    public function description();

    /**
     * Presents the thumbnail
     *
     * @return string
     */
    public function thumbnail();

    /**
     * Presents the original link
     *
     * @return string
     */
    public function originalLink();

    /**
     * Presents meta description of the media
     *
     * @return mixed
     */
    public function metaDescription();

    /**
     * Presents the full preview of the media
     *
     * @return string
     */
    public function preview();

    /**
     * Presents a compact preview of the media
     *
     * @return string
     */
    public function compactPreview();

}