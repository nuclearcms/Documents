<?php

class MediaTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Media',
            new Nuclear\Documents\Media\Media()
        );
    }

    /** @test */
    function it_checks_if_the_media_is_substitutable()
    {
        $this->assertFalse(
            (new Nuclear\Documents\Media\Media)->isSubstitutable()
        );
    }

}