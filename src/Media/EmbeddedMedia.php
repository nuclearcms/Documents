<?php


namespace Nuclear\Documents\Media;


use Nuclear\Documents\Contract\Media\FiltersImage as FiltersImageContract;
use Simexis\Oembed\OembedFacade as Oembed;

class EmbeddedMedia extends Media implements FiltersImageContract {

    use FiltersImage;

    /**
     * @var string
     */
    protected $mediaType = 'embedded';

    /**
     * Presenter for the model
     *
     * @var string
     */
    protected $presenter = 'Nuclear\Documents\Presenters\EmbeddedMediaPresenter';

    /**
     * Populates default data with oEmbed data
     */
    public function populateDefaultMetadata()
    {
        $oEmbed = Oembed::cache($this->path, ['lifetime' => 432000]);

        $this->type = $this->mediaType;
        $this->mimetype = mb_strtolower($oEmbed->providerName);
        $this->size = 0;

        $this->name = $oEmbed->title;
        $this->caption = $oEmbed->title;
        $this->description = $oEmbed->description;

        $this->setMetadata('media_type', $oEmbed->type);

        $this->setMetadata('provider_url', $oEmbed->providerUrl);
        $this->setMetadata('provider_icon', $oEmbed->providerIcon);

        if ( ! is_null($oEmbed->image))
        {
            $destination = 'embedded/' . $this->mimetype . '_' . md5($oEmbed->image);
            copy($oEmbed->image, upload_path($destination));

            $this->setMetadata('thumbnail_original', $oEmbed->image);
            $this->setMetadata('thumbnail_url', $destination);
            $this->setMetadata('thumbnail_width', $oEmbed->imageWidth);
            $this->setMetadata('thumbnail_height', $oEmbed->imageHeight);
        }

        if ( ! is_null($oEmbed->authorName))
        {
            $this->setMetadata('author_name', $oEmbed->authorName);
            $this->setMetadata('author_url', $oEmbed->authorUrl);
        }
    }

    /**
     * Getter for file path
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->path;
    }

    /**
     * Public url accessor
     *
     * @return string
     */
    public function getPublicURL()
    {
        return $this->path;
    }

    /**
     * Deletes the file from the filesystem
     * (this method is an override for the delete method on Deletable)
     *
     * @return bool
     */
    protected function deleteFile()
    {
        return true;
    }

    /**
     * Getter for the image path
     *
     * @return string
     */
    public function getImagePath()
    {
        return $this->getMetadata('thumbnail_url');
    }

}