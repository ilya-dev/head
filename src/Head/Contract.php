<?php namespace Head;

interface Contract {

    /**
     * Listen to an event / Attach an event listener
     *
     * @param string $event
     * @param callable $handler
     * @return void
     */
    public function listen($event, callable $handler);

    /**
     * Fire all event handlers associated with the given name
     *
     * @param string $event
     * @param array $context
     * @return void
     */
    public function fire($event, array $context = []);

}

