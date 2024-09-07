<?php

namespace SkySportsTechTask\Interfaces;

interface EventStorageInterface
{
    public function store(EventInterface $event): bool;
}
