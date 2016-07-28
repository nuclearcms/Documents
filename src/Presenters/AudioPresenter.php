<?php


namespace Nuclear\Documents\Presenters;


use Laracasts\Presenter\Presenter;
use Nuclear\Documents\Contract\Presenters\PresentsMedia as PresentsMediaContract;

class AudioPresenter extends Presenter implements PresentsMediaContract {

    use PresentsMedia, PresentsHtmlMedia;

    /**
     * Presents the thumbnail
     *
     * @return string
     */
    public function thumbnail()
    {
        return $this->iconThumbnail('document-audio');
    }

    /**
     * Presents the full preview of the media
     *
     * @return string
     */
    public function preview()
    {
        return $this->wrapPreview($this->presentHtmlMedia('audio'));
    }

    /**
     * Presents a compact preview of the media
     *
     * @return string
     */
    public function compactPreview()
    {
        return $this->wrapPreview($this->presentHtmlMedia('audio'), true);
    }

}