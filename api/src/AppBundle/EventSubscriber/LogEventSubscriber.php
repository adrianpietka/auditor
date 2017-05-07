<?php

namespace AppBundle\EventSubscriber;

use AuditorBundle\Event\CreatedNewProjectEvent;
use CqrsBundle\Eventing\EventInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LogEventSubscriber implements EventSubscriberInterface
{
    private $eventLogFile;

    public function __construct(string $logsDirectory)
    {
        $this->eventLogFile = $logsDirectory . DIRECTORY_SEPARATOR . 'event.log';
    }

    public static function getSubscribedEvents()
    {
        return [
            CreatedNewProjectEvent::class => 'handle'
        ];
    }

    public function handle(EventInterface $event)
    {
        file_put_contents($this->eventLogFile, serialize($event) . PHP_EOL, FILE_APPEND);
    }
}