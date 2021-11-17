<?php

declare(strict_types=1);

class HistoryCollection implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @var list<BattleHistory>
     */
    private array $items = [];

    /**
     * @param list<BattleHistory> $ships
     */
    public function __construct(array $battleHistory)
    {
        foreach ($battleHistory as $history) {
            $this->add($history);
        }
    }

    public function add(BattleHistory $history): self
    {
        $this->items[] = $history;
        return $this;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function remove(int $offset): self
    {
        unset($this->items[$offset]);
        return $this;
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        /** @var BattleHistory $item */
        foreach ($this->items as $item) {
            if ($item->getId() === (int) $offset) {
                return $item;
            }
        }
        return null;
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}
