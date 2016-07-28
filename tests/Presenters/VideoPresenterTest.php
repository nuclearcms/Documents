<?php


class VideoPresenterTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Presenters\VideoPresenter',
            new Nuclear\Documents\Presenters\VideoPresenter('foo')
        );
    }

}