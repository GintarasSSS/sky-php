<?php

namespace SkySportsTechTask\Abstracts;

use SkySportsTechTask\Interfaces\AvailableEventInterface;

class AvailableEventAbstract implements AvailableEventInterface
{
    protected string $sport;
    protected array $types;

    public function isValidSport(string $sport): bool
    {
        return !empty($this->sport) && $sport === $this->sport;
    }

    public function isValidType(string $type): bool
    {
        return !empty($this->types) && in_array($type, $this->types);
    }

    public function getSport(): string
    {
        return $this->sport ?? '';
    }

    public function getRandomType(): string
    {
        return !empty($this->types) ? $this->types[array_rand($this->types)] : '';
    }
}
