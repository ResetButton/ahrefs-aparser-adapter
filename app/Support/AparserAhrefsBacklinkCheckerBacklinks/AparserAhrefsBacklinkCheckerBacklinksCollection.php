<?php

namespace App\Support\AparserAhrefsBacklinkCheckerBacklinks;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class AparserAhrefsBacklinkCheckerBacklinksCollection implements IteratorAggregate
{
    private array $items = [];

    public function push(AparserAhrefsBacklinkCheckerBacklinksData $item): void
    {
        $this->items[] = $item;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}
