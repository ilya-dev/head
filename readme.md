# Head

Head is a micro event dispatcher for PHP.

## Use

### Create

```php

$head = new \Head\Head;

// or

class MyOwnHead implements \Head\Contract {

    use \Head\Behaviour;

    // do what you want

}

```

### Attach

```php

$head->listen('foo', function($foo, $bar, $baz)
{
    // do something
});

// also valid:
// $head->listen('foo', 'valid_function');
// $head->listen('foo', ['SomeClass', 'someMethod');
// $head->listen('foo', [new SomeClass, 'someMethod']);
// and so on...

```

### Fire

```php

$head->fire('my_epic_event', ['pass', 'the', 'context']);

```

## License

Head is licensed under the MIT license.

