<?php

namespace Nuclear\Documents\Media;


use Dimsav\Translatable\Translatable;
use Intervention\Image\Facades\Image as ImageFacade;
use Kenarkose\Files\Determine\AutoDeterminesType;
use Kenarkose\Ownable\AutoAssociatesOwner;
use Kenarkose\Ownable\Ownable;
use Kenarkose\Sortable\Sortable;
use Kenarkose\Transit\File\File as TransitFile;
use Laracasts\Presenter\PresentableTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class Media extends TransitFile {

    use Ownable, AutoAssociatesOwner, AutoDeterminesType,
        Sortable, SearchableTrait, PresentableTrait, Translatable;

    /**
     * @var string
     */
    protected $table = 'media';

    /**
     * The fillable fields for the model.
     *
     * @var  array
     */
    protected $fillable = [
        'extension', 'mimetype', 'size', 'name', 'path',
        'caption', 'alttext', 'description'
    ];

    /**
     * Translatable
     */
    public $translatedAttributes = ['caption', 'alttext', 'description'];
    public $translationModel = 'Nuclear\Documents\Media\MediaTranslation';
    public $translationForeignKey = 'media_id';

    /**
     * Presenter for the model
     *
     * @var string
     */
    protected $presenter = 'Nuclear\Documents\Presenters\MediaPresenter';

    /**
     * Sortable columns
     *
     * @var array
     */
    protected $sortableColumns = ['created_at'];

    /**
     * Default sortable key
     *
     * @var string
     */
    protected $sortableKey = 'created_at';

    /**
     * Default sortable direction
     *
     * @var string
     */
    protected $sortableDirection = 'desc';

    /**
     * Searchable columns.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name'                       => 10,
            'mimetype'                   => 10,
            'media_translations.caption' => 10,
        ],
        'joins'   => [
            'translations' => ['media.id', 'media_translations.media_id'],
        ],
    ];

    /**
     * Substitutable
     *
     * @param bool
     */
    protected $substitutable = false;

    /**
     * Boot the model
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($embeddedMedia)
        {
            $embeddedMedia->populateDefaultMetadata();
        });
    }

    /**
     * Populates default metadata
     */
    public function populateDefaultMetadata()
    {
        if ($this->type === 'image')
        {
            $this->setImageMetadata();
        }
    }

    /**
     * Path accessor
     *
     * @param string $value
     * @return string
     */
    public function getPathAttribute($value)
    {
        return $value;
    }

    /**
     * Getter for file path
     *
     * @return string
     */
    public function getFilePath()
    {
        return upload_path($this->getAttribute('path'));
    }

    /**
     * Public url accessor
     *
     * @return string
     */
    public function getPublicURL()
    {
        return uploaded_asset($this->path);
    }

    /**
     * Checks if the media is an image
     *
     * @return bool
     */
    public function isImage()
    {
        return ($this->type === 'image');
    }

    /**
     * Checks if the media is substitutable
     *
     * @return bool
     */
    public function isSubstitutable()
    {
        return $this->substitutable;
    }

    /**
     * Converts model attributes to array
     *
     * @param bool $withImageHTML
     * @return array
     */
    public function toArray($withImageHTML = true)
    {
        return array_merge(parent::toArray(), [
            'thumbnail' => $this->present()->thumbnail
        ]);
    }

    /**
     * Sets the image metadata
     */
    protected function setImageMetadata()
    {
        $image = ImageFacade::make(
            $this->getFilePath()
        );

        $this->setMetadata('width', $image->width());
        $this->setMetadata('height', $image->height());
    }

}