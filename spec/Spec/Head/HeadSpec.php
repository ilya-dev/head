<?php namespace Spec\Head;

use PhpSpec\ObjectBehavior;

class HeadSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Head\Head');
    }

    function it_registers_an_event_handler()
    {
        $this->listen('foo', 'Spec\Head\dummy');
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

    function it_unregisters_all_event_handlers_for_a_specific_event()
    {
        $this->listen('foo', 'Spec\Head\dummy');

        $this->shouldNotThrow('UnexpectedValueException')->duringFire('foo');
        $this->off('foo');
        $this->shouldThrow('UnexpectedValueException')->duringFire('foo');
    }

    function it_unregisters_exact_event_handler()
    {
        $this->listen('foo', 'Spec\Head\dummy');
        $this->listen('foo', 'Spec\Head\bad_dummy');

        $this->off('foo', 'Spec\Head\dummy');

        $this->shouldThrow('LogicException')->duringFire('foo');
    }

}

function dummy()
{

}

function bad_dummy()
{
    throw new \LogicException;
}

