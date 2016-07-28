<?php

class DocumentTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Media\Document',
            new Nuclear\Documents\Media\Document()
        );
    }

}