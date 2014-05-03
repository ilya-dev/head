<?php namespace Spec\Head;

use PhpSpec\ObjectBehavior;

class HeadSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Head\Head');
    }

    function it_registers_an_event_handler()
    {
        $this->listen('foo', 'trim');
    }

    function it_fires_an_event()
    {
        $this->listen('foo', function($exception)
        {
            throw $exception;
        });

        $this->shouldThrow('LogicException')->duringFire('foo', [
            new \LogicException
        ]);
    }

    function it_throws_an_exception_if_an_event_does_not_exist()
    {
        $this->shouldThrow('UnexpectedValueException')->duringFire('bar');
    }

    function it_unregisters_an_event()
    {
        $this->listen('foo', 'error_reporting');

        $this->shouldNotThrow('UnexpectedValueException')->duringFire('foo');
        $this->off('foo');
        $this->shouldThrow('UnexpectedValueException')->duringFire('foo');
    }

}

