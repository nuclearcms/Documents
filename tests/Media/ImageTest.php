<?php

class ImageTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Image',
            new Nuclear\Documents\Media\Image()
        );
    }

}