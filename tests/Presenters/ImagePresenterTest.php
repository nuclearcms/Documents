<?php


class ImagePresenterTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Presenters\ImagePresenter',
            new Nuclear\Documents\Presenters\ImagePresenter('foo')
        );
    }

}