<?php namespace Head;

use UnexpectedValueException;

trait Behaviour {

    /**
     * The event handlers.
     *
     * @var array
     */
    protected $handlers = [];

    /**
     * Attach an event handler.
     *
     * @param string $event
     * @param callable $handler
     * @return void
     */
    public function listen($event, callable $handler)
    {
        $this->handlers[$event][] = $handler;
    }

    /**
     * Fire off all event handlers for a specific event.
     *
     * @throws UnexpectedValueException
     * @param string $event
     * @param array $context
     * @return void
     */
    public function fire($event, array $context = [])
    {
        if ( ! isset ($this->handlers[$event]))
        {
            throw new UnexpectedValueException("Event {$event} does not exist");
        }

        foreach ($this->handlers[$event] as $handler)
        {
            call_user_func_array($handler, $context);
        }
    }

    /**
     * Unregister event handlers for a specific event.
     *
     * @param string $event
     * @param callable|null $handler
     * @return void
     */
    public function off($event, callable $handler = null)
    {
        if (is_null($handler))
        {
            unset ($this->handlers[$event]);

            return null;
        }

        foreach ($this->handlers[$event] as $key => $eachHandler)
        {
            if ($handler === $eachHandler)
            {
                unset ($this->handlers[$event][$key]);
            }
        }
    }

}

