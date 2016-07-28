<?php


class EmbeddedMediaPresenterTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Presenters\EmbeddedMediaPresenter',
            new Nuclear\Documents\Presenters\EmbeddedMediaPresenter('foo')
        );
    }

}