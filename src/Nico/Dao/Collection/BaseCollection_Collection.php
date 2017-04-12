<?php

namespace Nico\Dao\Collection;

use Closure;
use ArrayIterator;

/**
 * Class BaseCollection_Collection
 * @package Dao\Collection
 */
abstract class BaseCollection_Collection implements CollectionInterface_Collection {

    /**
     * @var array
     */
    private $elements;

    /**
     * ArrayCollection_Utils_Collection constructor.
     * @param array $elements
     */
    public function __construct(array $elements = array()) {
        $this->elements = $elements;
    }

    /**
     * @param array $elements
     * @return static
     */
    protected function createFrom(array $elements) {
        return new static($elements);
    }

    /**
     * @return array
     */
    public function toArray() {
        return $this->elements;
    }

    /**
     * @return mixed
     */
    public function first() {
        return reset($this->elements);
    }

    /**
     * @return mixed
     */
    public function last() {
        return end($this->elements);
    }

    /**
     * @return mixed
     */
    public function key() {
        return key($this->elements);
    }

    /**
     * @return mixed
     */
    public function next() {
        return next($this->elements);
    }

    /**
     * @return mixed
     */
    public function current() {
        return current($this->elements);
    }

    /**
     * @param int|string $key
     * @return mixed|null
     */
    public function remove($key) {
        if ( ! isset($this->elements[$key]) && ! array_key_exists($key, $this->elements)) {
            return null;
        }
        $removed = $this->elements[$key];
        unset($this->elements[$key]);
        return $removed;
    }

    /**
     * @param mixed $element
     * @return bool
     */
    public function removeElement($element) {
        $key = array_search($element, $this->elements, true);
        if ($key === false) {
            return false;
        }
        unset($this->elements[$key]);
        return true;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return $this->containsKey($offset);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset) {
        return $this->get($offset);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return bool
     */
    public function offsetSet($offset, $value) {
        if (!isset($offset)) {
            return $this->add($value);
        }
        $this->set($offset, $value);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetUnset($offset) {
        return $this->remove($offset);
    }

    /**
     * @param int|string $key
     * @return bool
     */
    public function containsKey($key) {
        return isset($this->elements[$key]) || array_key_exists($key, $this->elements);
    }

    /**
     * @param mixed $element
     * @return bool
     */
    public function contains($element) {
        return in_array($element, $this->elements, true);
    }

    /**
     * @param Closure $closure
     * @return bool
     */
    public function exists(Closure $closure) {
        foreach ($this->elements as $key => $element) {
            if ($closure($key, $element)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param mixed $element
     * @return mixed
     */
    public function indexOf($element) {
        return array_search($element, $this->elements, true);
    }

    /**
     * @param int|string $key
     * @return mixed|null
     */
    public function get($key) {
        return isset($this->elements[$key]) ? $this->elements[$key] : null;
    }

    /**
     * @return array
     */
    public function getKeys() {
        return array_keys($this->elements);
    }

    /**
     * @return array
     */
    public function getValues() {
        return array_values($this->elements);
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->elements);
    }

    /**
     * @param int|string $key
     * @param mixed $value
     */
    public function set($key, $value) {
        $this->elements[$key] = $value;
    }

    /**
     * @param mixed $element
     * @return bool
     */
    public function add($element) {
        $this->elements[] = $element;
        return true;
    }

    /**
     * @return bool
     */
    public function isEmpty() {
        return empty($this->elements);
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator() {
        return new ArrayIterator($this->elements);
    }

    /**
     * @param Closure $closure
     * @return BaseCollection_Collection
     */
    public function map(Closure $closure) {
        return $this->createFrom(array_map($closure, $this->elements));
    }

    /**
     * @param Closure $closure
     * @return BaseCollection_Collection
     */
    public function filter(Closure $closure) {
        return $this->createFrom(array_filter($this->elements, $closure));
    }

    /**
     * @param Closure $closure
     * @return bool
     */
    public function forAll(Closure $closure) {
        foreach ($this->elements as $key => $element) {
            if (!$closure($key, $element)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param Closure $closure
     * @return array
     */
    public function partition(Closure $closure) {
        $matches = $noMatches = array();
        foreach ($this->elements as $key => $element) {
            if ($closure($key, $element)) {
                $matches[$key] = $element;
            } else {
                $noMatches[$key] = $element;
            }
        }
        return array($this->createFrom($matches), $this->createFrom($noMatches));
    }

    /**
     * @return string
     */
    public function __toString() {
        return __CLASS__ . '@' . spl_object_hash($this);
    }

    /**
     * @return void
     */
    public function clear() {
        $this->elements = array();
    }

    /**
     * @param int $offset
     * @param null $length
     * @return array
     */
    public function slice($offset, $length = null) {
        return array_slice($this->elements, $offset, $length, true);
    }
}