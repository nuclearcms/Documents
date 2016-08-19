<?php

namespace Nuclear\Documents\Presenters;


trait PresentsMedia {

    /**
     * Presents the title
     *
     * @return string
     */
    public function title()
    {
        return '<p class="preview__title">' . $this->title . '</p>';
    }

    /**
     * Presents the caption
     *
     * @return string
     */
    public function caption()
    {
        return '<p class="preview__caption">' . $this->caption . '</p>';
    }

    /**
     * Presents the caption
     *
     * @return string
     */
    public function description()
    {
        return '<p class="preview__description">' . $this->description . '</p>';
    }

    /**
     * Returns an icon thumbnail
     *
     * @param string $icon
     * @return string
     */
    public function iconThumbnail($icon)
    {
        return $this->wrapThumbnail('<i class="document-thumbnail__icon icon-' . $icon . '"></i>');
    }

    /**
     * Wraps the thumbnail
     *
     * @param string $thumbnail
     * @return string
     */
    public function wrapThumbnail($thumbnail)
    {
        return '<div class="document-thumbnail">' . $thumbnail . '</div>';
    }

    /**
     * Presents the original link
     *
     * @return string
     */
    public function originalLink()
    {
        return '<a href="' . $this->entity->getPublicURL() . '" target="_blank" class="preview__original-link">' . $this->title . '</a>';
    }

    /**
     * Presents meta description of the media
     *
     * @return mixed
     */
    public function metaDescription()
    {
        return $this->wrapMetaDescription(
            sprintf('<span>%s</span><span>%s</span><span>%s</span>',
                $this->created_at->formatLocalized('%b %e, %Y @ %H:%M'),
                $this->mimetype,
                readable_size($this->size)
        ));
    }

    /**
     * Wraps the meta description
     *
     * @param string $description
     * @return string
     */
    public function wrapMetaDescription($description)
    {
        return '<p class="preview__meta-description">' . $description . '</p>';
    }

    /**
     * Wraps the preview
     *
     * @param string $preview
     * @param bool $compact
     * @return string
     */
    public function wrapPreview($preview, $compact = false)
    {
        return '<div class="preview' . ($compact ? 'preview--compact' : '') . '">' .
            $preview . '</div>';
    }

}