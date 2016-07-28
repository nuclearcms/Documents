<?php

class DocumentsServiceProviderTest extends TestBase {

    /** @test */
    function it_registers_upload_service()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Repositories\DocumentsRepository',
            app()->make('Nuclear\Documents\Repositories\DocumentsRepository')
        );
    }

}