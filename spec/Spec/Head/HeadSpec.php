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
        $this->listen('foo', function(array $context)
        {

        });
    }

    function it_fires_an_event()
    {
        $this->listen('foo', function(array $context)
        {
            throw new $context[1];
        });

        $this->shouldThrow($e = 'LogicException')->duringFire('foo', [null, $e]);
    }

}

