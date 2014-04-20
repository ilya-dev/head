<?php namespace Spec\Head;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HeadSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Head\Head');
    }

    function it_registers_an_event_handler()
    {
        $this->listen('foo', function()
        {

        });
    }

    function it_fires_an_event()
    {
        $this->listen('foo', function($exception)
        {
            throw new $exception;
        });

        $this->shouldThrow($e = 'LogicException')->duringFire('foo', [$e]);
    }


    function it_throws_an_exception_if_an_event_does_not_exist()
    {
        $this->shouldThrow('UnexpectedValueException')->duringFire('bar');
    }

}

