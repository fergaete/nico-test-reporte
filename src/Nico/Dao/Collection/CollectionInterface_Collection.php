<?php

namespace Nico\Dao\Collection;

use Countable;
use IteratorAggregate;
use ArrayAccess;
use Closure;

/**
 * Interface CollectionInterface_Collection
 * @package Dao\Collection
 */
interface CollectionInterface_Collection extends Countable, IteratorAggregate, ArrayAccess {

    /**
     * @param mixed $element
     * @return boolean
     */
    public function add($element);

    /**
     * @return void
     */
    public function clear();

    /**
     * @param mixed $element
     * @return boolean
     */
    public function contains($element);

    /**
     * @return boolean
     */
    public function isEmpty();

    /**
     * @param string|integer $key
     * @return mixed
     */
    public function remove($key);

    /**
     * @param mixed $element
     * @return boolean
     */
    public function removeElement($element);

    /**
     * @param string|integer $key
     * @return boolean
     */
    public function containsKey($key);

    /**
     * @param string|integer $key
     * @return mixed
     */
    public function get($key);

    /**
     * @return array
     */
    public function getKeys();

    /**
     * @return array
     */
    public function getValues();

    /**
     * @param string|integer $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value);

    /**
     * @return array
     */
    public function toArray();

    /**
     * @return mixed
     */
    public function first();

    /**
     * @return mixed
     */
    public function last();

    /**
     * @return int|string
     */
    public function key();

    /**
     * @return mixed
     */
    public function current();

    /**
     * @return mixed
     */
    public function next();

    /**
     * @param Closure $closure
     * @return boolean
     */
    public function exists(Closure $closure);

    /**
     * @param Closure $closure
     * @return CollectionInterface_Collection
     */
    public function filter(Closure $closure);

    /**
     * @param Closure $closure
     * @return boolean
     */
    public function forAll(Closure $closure);

    /**
     * @param Closure $closure
     * @return CollectionInterface_Collection
     */
    public function map(Closure $closure);

    /**
     * @param Closure $closure
     * @return array
     */
    public function partition(Closure $closure);

    /**
     * @param mixed $element
     * @return int|string|bool
     */
    public function indexOf($element);

    /**
     * @param int $offset
     * @param int|null $length
     * @return array
     */
    public function slice($offset, $length = null);
}