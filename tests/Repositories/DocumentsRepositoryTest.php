<?php


use Nuclear\Documents\Media\Media;

class DocumentsRepositoryTest extends TestBase {

    protected function getNewMedia($attributes = [
        'path' => 'foo.jpg',
        'name' => 'Foo',
        'extension' => 'jpg',
        'mimetype' => 'image/jpeg',
        'size' => 0
    ])
    {
        $media = new Media($attributes);
        $media->user_id = 1;
        $media->save();
        return $media;
    }

    protected function getRepository()
    {
        return $this->app->make('Nuclear\Documents\Repositories\DocumentsRepository');
    }

    /** @test */
    function it_gets_a_document()
    {
        $repository = $this->getRepository();
        $media = $this->getNewMedia();

        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            $repository->getDocuments($media->getKey())
        );

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $repository->getDocuments([$media->getKey()])
        );

        $this->assertNull(
            $repository->getDocuments(0)
        );
    }

    /** @test */
    function it_gets_a_gallery()
    {
        // Will not be tested due to SQLite missing field function
    }

    /** @test */
    function it_gets_a_cover()
    {
        $repository = $this->getRepository();
        $media = $this->getNewMedia();

        // By single integer
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            $repository->getCover($media->getKey())
        );

        // By array
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            $repository->getCover([$media->getKey()])
        );

        // By json string
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            $repository->getCover('[' . $media->getKey() . ']')
        );

        // Null
        $this->assertNull(
            $repository->getCover(null)
        );

        // Non-existant id
        $this->assertNull(
            $repository->getCover(1337)
        );
    }

}