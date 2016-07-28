<?php


class AudioTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Audio',
            new Nuclear\Documents\Media\Audio()
        );
    }

}