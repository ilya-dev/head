<?php namespace Head;

trait Behaviour {

    /**
     * Event handlers.
     * Stored as {event} => [{handler}, ...]
     *
     * @var array
     */
    protected $handlers = [];

    /**
     * {@inheritdoc}
     */
    public function listen($event, callable $handler)
    {
        $this->handlers[$event][] = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public function fire($event, array $context = [])
    {
        if ( ! isset($this->handlers[$event]))
        {
            $message = "Event {$event} does not exist";

            throw new \UnexpectedValueException($message);
        }

        foreach ($this->handlers[$event] as $handler)
        {
            \call_user_func_array($handler, $context);
        }
    }

}

