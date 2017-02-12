<?php

namespace AppBundle\Collection;

use AppBundle\Entity\IdentifiableInterface;

class IdentifiableCollection
{
    /** @var IdentifiableInterface[] */
    private $elements = [];

    public function add(IdentifiableInterface $identifiable)
    {
        $this->elements[$identifiable->getId()] = $identifiable;
    }

    public function remove(IdentifiableInterface $identifiable)
    {
        unset($this->elements[$identifiable->getId()]);
    }

    public function clear()
    {
        $this->elements = [];
    }

    /**
     * @return IdentifiableInterface[]
     */
    public function toArray()
    {
        return $this->elements;
    }
}