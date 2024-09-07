<?php

use PHPUnit\Framework\TestCase;
use SkySportsTechTask\EventProcessor;
use SkySportsTechTask\Interfaces\EventInterface;
use SkySportsTechTask\Interfaces\EventStorageInterface;
use SkySportsTechTask\Events\FootballEvent;

class EventProcessorTest extends TestCase
{
    const PREFIX = 'test_';

    private $storageMock;
    private $eventMock;
    private EventProcessor $eventProcessor;
    private FootballEvent $footballEvent;

    protected function setUp(): void
    {
        $this->storageMock = $this->createMock(EventStorageInterface::class);
        $this->eventMock = $this->createMock(EventInterface::class);

        $this->eventProcessor = new EventProcessor($this->storageMock);
        $this->footballEvent = new FootballEvent();
    }

    public function test_event_processor_returns_true_using_football_event_and_storage()
    {
        $sport = $this->footballEvent->getSport();
        $type = $this->footballEvent->getRandomType();

        $this->eventMock->expects($this->once())->method('getSport')->willReturn($sport);
        $this->eventMock->expects($this->once())->method('getEventType')->willReturn($type);
        $this->storageMock->expects($this->once())->method('store')->with($this->eventMock)->willReturn(true);

        $this->assertTrue($this->eventProcessor->processEvent($this->eventMock, $this->footballEvent));
    }

    public function test_event_processor_throws_exception_if_event_sport_does_not_exist()
    {
        $this->eventMock->expects($this->once())->method('getSport')->willReturn(uniqid());
        $this->eventMock->expects($this->never())->method('getEventType');
        $this->storageMock->expects($this->never())->method('store');
        $this->expectException(InvalidArgumentException::class);

        $this->eventProcessor->processEvent($this->eventMock, $this->footballEvent);
    }

    public function test_event_processor_throws_exception_if_event_type_does_not_exist_using_football_event()
    {
        $sport = $this->footballEvent->getSport();

        $this->eventMock->expects($this->once())->method('getSport')->willReturn($sport);
        $this->eventMock->expects($this->once())->method('getEventType')->willReturn(uniqid());
        $this->storageMock->expects($this->never())->method('store');
        $this->expectException(InvalidArgumentException::class);

        $this->eventProcessor->processEvent($this->eventMock, $this->footballEvent);
    }
}
