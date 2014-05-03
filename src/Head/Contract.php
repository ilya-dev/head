<?php namespace Head;

interface Contract {

    /**
     * Attach an event handler.
     *
     * @param string $event
     * @param callable $handler
     * @return void
     */
    public function listen($event, callable $handler);

    /**
     * Fire off all event handlers for a specific event.
     *
     * @throws UnexpectedValueException
     * @param string $event
     * @param array $context
     * @return void
     */
    public function fire($event, array $context = []);

    /**
     * Unregister event handlers for a specific event.
     *
     * @param string $event
     * @param callable|null $handler
     * @return void
     */
    public function off($event, callable $handler = null);

}

