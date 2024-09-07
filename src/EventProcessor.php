<?php

namespace SkySportsTechTask;

use SkySportsTechTask\Interfaces\AvailableEventInterface;
use SkySportsTechTask\Interfaces\EventInterface;
use SkySportsTechTask\Interfaces\EventStorageInterface;

class EventProcessor
{
    private EventStorageInterface $eventStorage;

    public function __construct(EventStorageInterface $eventStorage)
    {
        $this->eventStorage = $eventStorage;
    }

    public function processEvent(EventInterface $event, AvailableEventInterface $availableEvent): bool
    {
        if (!$availableEvent->isValidSport($event->getSport())) {
            throw new \InvalidArgumentException("Invalid event sport");
        }

        if (!$availableEvent->isValidType($event->getEventType())) {
            throw new \InvalidArgumentException("Invalid event type");
        }

        return $this->eventStorage->store($event);
    }
}
