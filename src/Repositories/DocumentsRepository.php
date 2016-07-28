<?php


namespace Nuclear\Documents\Repositories;



class DocumentsRepository {

    /**
     * Returns the document by given id
     *
     * @param int $id
     * @return Media
     */
    public function getDocument($id)
    {
        $mediaModel = $this->getMediaModelName();

        return call_user_func_array([$mediaModel, 'find'], [$id]);
    }

    /**
     * Returns the gallery by given ids
     *
     * @param int|string|array $ids
     * @return Collection
     */
    public function getGallery($ids)
    {
        if (empty($ids) || $ids === '{}') return null;

        $ids = $this->parseGalleryIds($ids);

        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $imageModel = $this->getImageModelName();

        $gallery = call_user_func_array([$imageModel, 'whereIn'], [$ids]);
        $gallery = $gallery
            ->orderByRaw('field(id,' . $placeholders . ')', $ids)
            ->get();

        return (count($gallery) > 0) ? $gallery : null;
    }

    /**
     * Returns the cover for given ids
     *
     * @param int|string|array $ids
     * @return Media
     */
    public function getCover($ids)
    {
        if (empty($ids) || $ids === '{}') return null;

        $ids = $this->parseGalleryIds($ids);

        $id = current($ids);

        $imageModel = $this->getImageModelName();

        return call_user_func_array([$imageModel, 'find'], [$id]);
    }

    /**
     * Parses a gallery array
     *
     * @param int|string|array $ids
     * @return array
     */
    protected function parseGalleryIds($ids)
    {
        if (is_array($ids))
        {
            return $ids;
        }

        if (0 !== (int)$ids)
        {
            return (array)$ids;
        }

        return json_decode($ids, true);
    }

    /**
     * Returns the name of the media model
     *
     * @return string
     */
    protected function getMediaModelName()
    {
        return config('files.media_model', 'Nuclear\Documents\Media\Media');
    }

    /**
     * Returns the name of the image model
     *
     * @return string
     */
    protected function getImageModelName()
    {
        return config('files.image_model', 'Nuclear\Documents\Media\Image');
    }
}