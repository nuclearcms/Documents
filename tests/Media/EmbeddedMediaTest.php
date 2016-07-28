<?php


class EmbeddedMediaTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\EmbeddedMedia',
            new Nuclear\Documents\Media\EmbeddedMedia()
        );
    }

}