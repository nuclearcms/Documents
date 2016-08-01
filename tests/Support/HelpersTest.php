<?php


use Nuclear\Documents\Media\Media;

class HelpersTest extends TestBase {

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

    /** @test */
    function it_gets_a_nuclear_document()
    {
        $media = $this->getNewMedia();

        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            get_nuclear_documents($media->getKey())
        );

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            get_nuclear_documents([$media->getKey()])
        );

        $this->assertNull(
            get_nuclear_documents(0)
        );
    }

    /** @test */
    function it_gets_a_nuclear_gallery()
    {
        // Will not be tested due to SQLite missing field function
    }

    /** @test */
    function it_gets_a_nuclear_cover()
    {
        $media = $this->getNewMedia();

        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            get_nuclear_cover($media->getKey())
        );

        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            get_nuclear_cover([$media->getKey()])
        );

        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            get_nuclear_cover('[' . $media->getKey() . ']')
        );
    }

}