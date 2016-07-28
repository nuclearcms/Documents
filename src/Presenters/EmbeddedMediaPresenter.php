<?php

namespace Nuclear\Documents\Presenters;


use Laracasts\Presenter\Presenter;
use Nuclear\Documents\Contract\Presenters\PresentsMedia as PresentsMediaContract;
use Simexis\Oembed\OembedFacade as Oembed;

class EmbeddedMediaPresenter extends Presenter implements PresentsMediaContract {

    use PresentsFilteredImage;

    use PresentsMedia
    {
        metaDescription as _metadataDescription;
    }

    /**
     * Presents the thumbnail
     *
     * @return string
     */
    public function thumbnail()
    {
        if (is_null($thumbnailURL = $this->entity->getImagePath()))
        {
            return $this->iconThumbnail('document');
        }

        return $this->wrapThumbnail(
            $this->filteredImageWith('rthumb')
        );
    }

    /**
     * Presents meta description of the media
     *
     * @return mixed
     */
    public function metaDescription()
    {
        return $this->wrapMetaDescription(
            sprintf('<span>%s</span><span>%s</span>',
                $this->created_at->formatLocalized('%b %e, %Y @ %H:%M'),
                $this->mimetype
            ));
    }

    /**
     * Presents a compact preview of the media
     *
     * @return string
     */
    public function preview()
    {
        return $this->wrapPreview($this->getEmbedHtml());
    }

    /**
     * Presents the full preview of the media
     *
     * @return string
     */
    public function compactPreview()
    {
        return $this->wrapPreview($this->getEmbedHtml(), false);
    }

    /**
     * Returns the embed HTML for the media
     *
     * @return string
     */
    public function getEmbedHtml()
    {
        return Oembed::cache($this->path, ['lifetime' => 432000])->code;
    }
}