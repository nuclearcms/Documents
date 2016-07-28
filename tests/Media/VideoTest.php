<?php


class VideoTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Video',
            new Nuclear\Documents\Media\Video()
        );
    }

}