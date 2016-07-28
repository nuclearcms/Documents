<?php


class MediaPresenterTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Presenters\MediaPresenter',
            new Nuclear\Documents\Presenters\MediaPresenter('foo')
        );
    }

}