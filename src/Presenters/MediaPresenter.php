<?php

namespace Nuclear\Documents\Presenters;


use Laracasts\Presenter\Presenter;
use Nuclear\Documents\Contract\Presenters\PresentsMedia as PresentsMediaContract;

class MediaPresenter extends Presenter implements PresentsMediaContract {

    use PresentsMedia, PresentsDefaultPreviews;

    /**
     * Icon classes for mimetypes
     *
     * @var array
     */
    protected $icons = [
        'text/plain' => 'document-text',
        'application/pdf' => 'document-pdf',
        'application/msword' => 'document-word',
        'application/vnd.ms-excel' => 'document-excel',
        'application/vnd.ms-powerpoint' => 'document-powerpoint',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'document-word',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'document-powerpoint',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'document-excel',
        'audio/aac' => 'document-audio',
        'audio/mp4' => 'document-audio',
        'audio/mpeg' => 'document-audio',
        'audio/ogg' => 'document-audio',
        'audio/wav' => 'document-audio',
        'audio/webm' => 'document-audio',
        'video/mp4' => 'document-video',
        'video/ogg' => 'document-video',
        'video/webm' => 'document-video'
    ];

    /**
     * Presents the thumbnail
     *
     * @return string
     */
    public function thumbnail()
    {
        // This part is because of the uploader
        if ($this->type === 'image')
        {
            return $this->wrapThumbnail(
                '<img class="document-thumbnail__image" src="' .
                url(config('imagecache.route') . '/rthumb/' . $this->path). '" alt="' . $this->alttext . '">'
            );
        }

        $icon = 'document';

        if (array_key_exists($this->mimetype, $this->icons))
        {
            $icon = $this->icons[$this->mimetype];
        }

        return $this->iconThumbnail($icon);
    }

}