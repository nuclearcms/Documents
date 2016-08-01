<?php

if ( ! function_exists('get_nuclear_document'))
{
    /**
     * Returns the document for given id
     *
     * @param int $id
     * @return Media
     */
    function get_nuclear_documents($id)
    {
        return app(Nuclear\Documents\Repositories\DocumentsRepository::class)
            ->getDocuments($id);
    }
}

if ( ! function_exists('get_nuclear_gallery'))
{
    /**
     * Returns the gallery for given id
     *
     * @param int|string|array $ids
     * @return Collection
     */
    function get_nuclear_gallery($ids)
    {
        return app(Nuclear\Documents\Repositories\DocumentsRepository::class)
            ->getGallery($ids);
    }
}

if ( ! function_exists('get_nuclear_cover'))
{
    /**
     * Returns the cover for given ids
     *
     * @param int|string|array $ids
     * @return Media
     */
    function get_nuclear_cover($ids)
    {
        return app(Nuclear\Documents\Repositories\DocumentsRepository::class)
            ->getCover($ids);
    }
}