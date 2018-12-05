<?php

namespace App;

use Iterator;

class Collection implements Iterator
{
    /**
     * The collection contents.
     *
     * @var array
     */
    protected $items;
    /**
     * Create a new counter instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        $this->items = $items;
    }
    /**
     * Fetch the current item.
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->items);
    }
    /**
     * Get the key for the current item.
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->items);
    }
    /**
     * Move the pointer to the next item.
     *
     * @return mixed
     */
    public function next()
    {
        return next($this->items);
    }
    /**
     * Rewind the pointer to the first item.
     *
     * @return integer
     */
    public function rewind()
    {
        return reset($this->items);
    }
    /**
     * Determine if there are more items to iterate over.
     *
     * @return boolean
     */
    public function valid()
    {
        return current($this->items);
    }
}