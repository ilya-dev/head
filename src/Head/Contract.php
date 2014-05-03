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
     * @param string $event
     * @param array $context
     * @return void
     */
    public function fire($event, array $context = []);

}

