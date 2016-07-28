<?php


class AudioPresenterTrait extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Nuclear\Documents\Presenters\AudioPresenter',
            new Nuclear\Documents\Presenters\AudioPresenter('foo')
        );
    }

}