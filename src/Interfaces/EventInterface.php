<?php

namespace SkySportsTechTask\Interfaces;

interface EventInterface
{
    public function getSport(): string;
    public function getEventType(): string;
}
