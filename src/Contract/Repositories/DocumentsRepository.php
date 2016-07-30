<?php


namespace Nuclear\Documents\Contract\Repositories;


interface DocumentsRepository {

    /**
     * Returns the document by given id
     *
     * @param int $id
     * @return Media
     */
    public function getDocuments($id);

    /**
     * Returns the gallery by given ids
     *
     * @param int|string|array $ids
     * @return Collection
     */
    public function getGallery($ids);

    /**
     * Returns the cover for given ids
     *
     * @param int|string|array $ids
     * @return Media
     */
    public function getCover($ids);

}