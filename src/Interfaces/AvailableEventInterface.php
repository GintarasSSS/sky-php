<?php

namespace SkySportsTechTask\Interfaces;

interface AvailableEventInterface
{
    public function isValidSport(string $sport): bool;
    public function isValidType(string $type): bool;

    public function getSport(): string;
    public function getRandomType(): string;
}
