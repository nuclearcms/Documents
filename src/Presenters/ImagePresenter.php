<?php

namespace Nuclear\Documents\Presenters;


use Laracasts\Presenter\Presenter;
use Nuclear\Documents\Contract\Presenters\PresentsMedia as PresentsMediaContract;

class ImagePresenter extends Presenter implements PresentsMediaContract {

    use PresentsFilteredImage;

    use PresentsMedia {
        metaDescription as _metaDescription;
    }

    /**
     * Presents the original
     *
     * @return string
     */
    public function original()
    {
        return $this->wrapImage($this->entity->getPublicURL());
    }

    /**
     * Presents the thumbnail
     *
     * @return string
     */
    public function thumbnail()
    {
        return $this->wrapThumbnail($this->filteredImageWith('rthumb', 'document-thumbnail__image'));
    }

    /**
     * Presents meta description of the media
     *
     * @return mixed
     */
    public function metaDescription()
    {
        return $this->wrapMetaDescription(
            sprintf('<span>%s</span><span>%s</span><span>%s</span><span>%s</span>',
                $this->created_at->formatLocalized('%b %e, %Y @ %H:%M'),
                $this->mimetype,
                readable_size($this->size),
                $this->entity->getMetadata('width') . ' x ' . $this->entity->getMetadata('height')
            ));
    }

    /**
     * Presents the full preview of the media
     *
     * @return string
     */
    public function preview()
    {
        return $this->wrapPreview(
            $this->original()
        );
    }

    /**
     * Presents a compact preview of the media
     *
     * @return string
     */
    public function compactPreview()
    {
        return $this->previewWithFilter('rcompact', true);
    }
}