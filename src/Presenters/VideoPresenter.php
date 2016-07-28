<?php


namespace Nuclear\Documents\Presenters;


use Laracasts\Presenter\Presenter;
use Nuclear\Documents\Contract\Presenters\PresentsMedia as PresentsMediaContract;

class VideoPresenter extends Presenter implements PresentsMediaContract {

    use PresentsMedia, PresentsHtmlMedia;

    /**
     * Presents the thumbnail
     *
     * @return string
     */
    public function thumbnail()
    {
        return $this->iconThumbnail('document-video');
    }

    /**
     * Presents the full preview of the media
     *
     * @return string
     */
    public function preview()
    {
        return $this->wrapPreview($this->presentHtmlMedia('video'));
    }

    /**
     * Presents a compact preview of the media
     *
     * @return string
     */
    public function compactPreview()
    {
        return $this->wrapPreview($this->presentHtmlMedia('video'), true);
    }

}