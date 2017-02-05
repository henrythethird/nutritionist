<?php

namespace AppBundle\Serialize;


interface ArraySerializable
{
    public function toArray();
    public function fromArray(array $array);
}