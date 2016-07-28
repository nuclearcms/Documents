<?php

namespace Nuclear\Documents\Media;


use Kenarkose\Files\Substitute\Substitutes;

class Video extends Media {

    use Substitutes;

    /**
     * @var string
     */
    protected $mediaType = 'video';

    /**
     * Presenter for the model
     *
     * @var string
     */
    protected $presenter = 'Nuclear\Documents\Presenters\VideoPresenter';

    /**
     * Substitutable
     *
     * @param bool
     */
    protected $substitutable = true;

}