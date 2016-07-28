<?php

namespace Nuclear\Documents\Media;


use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image as InterventionImage;
use Nuclear\Documents\Contract\Media\FiltersImage as FiltersImageContract;
use Uploader;

class Image extends Media implements FiltersImageContract {

    use FiltersImage;

    /**
     * @var string
     */
    protected $mediaType = 'image';

    /**
     * Presenter for the model
     *
     * @var string
     */
    protected $presenter = 'Nuclear\Documents\Presenters\ImagePresenter';

    /**
     * Edits image according to given action
     *
     * @param string $action
     */
    public function editImage($action)
    {
        $image = $this->loadImage();

        $path = $this->processImage($action, $image);

        $this->changeImagePath($path);
    }

    /**
     * Loads the associated image with the model
     *
     * @return Image
     */
    protected function loadImage()
    {
        return ImageFacade::make(
            $this->getFilePath()
        );
    }

    /**
     * Processes the image with given action
     *
     * @param string $action
     * @param InterventionImage $image
     * @return string
     */
    protected function processImage($action, InterventionImage $image)
    {
        list($method, $param) = explode('_', $action);

        if ($method === 'crop')
        {
            $params = explode(',', $param);

            call_user_func_array([$image, 'crop'], $params);
        } else
        {
            call_user_func([$image, $method], $param);
        }

        return $this->saveImage($image);
    }

    /**
     * Saves the processed image
     *
     * @param InterventionImage $image
     * @return string
     */
    protected function saveImage(InterventionImage $image)
    {
        $filename = Uploader::getNewFileName($this->getFileExtension());

        list($absolutePath, $relativePath) = Uploader::getUploadPath();

        $image->save($absolutePath . '/' . $filename);

        $this->refreshImageMetadata($image);

        return $relativePath . '/' . $filename;
    }

    /**
     * Refreshes the image metadata
     *
     * @param InterventionImage $image
     */
    protected function refreshImageMetadata(InterventionImage $image)
    {
        $this->setMetadata('width', $image->width());
        $this->setMetadata('height', $image->height());
    }

    /**
     * Removes the old image file and sets new image path
     *
     * @param string $path
     */
    protected function changeImagePath($path)
    {
        $this->deleteFile();

        $this->update(compact('path'));
    }

    /**
     * Getter for the image path
     *
     * @return string
     */
    public function getImagePath()
    {
        return $this->path;
    }

    /**
     * Checks if the image is horizontal
     *
     * @return bool
     */
    public function isHorizontal()
    {
        return ($this->getMetadata('width') >= $this->getMetadata('height'));
    }

    /**
     * Checks if the image is vertical
     *
     * @return bool
     */
    public function isVertical()
    {
        return ($this->getMetadata('width') < $this->getMetadata('height'));
    }

}