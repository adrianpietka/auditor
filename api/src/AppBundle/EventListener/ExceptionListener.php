<?php

namespace AppBundle\EventListener;

use AuditorBundle\Exception\ResourceDoesNotExistException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    protected $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function onKernelException(GetResponseForExceptionEvent $event) : void
    {
        $this->setupApiException($event);
    }

    private function mapExceptionToStatusCode(\Exception $exception) : int
    {
        if ($exception instanceof ResourceDoesNotExistException) {
            return Response::HTTP_NOT_FOUND;
        }

        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    private function mapExceptionToResponseContent(\Exception $exception) : string
    {
        $message = ['error' => $exception->getMessage()];

        if ($this->kernel->getEnvironment() === 'dev') {
            $message['class'] = get_class($exception);
            $message['file'] = $exception->getLine();
            $message['line'] = $exception->getLine();
            $message['trace'] = $exception->getTrace();
        }

        return json_encode($message, JSON_PRETTY_PRINT);
    }

    private function setupApiException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof HttpExceptionInterface) {
            return;
        }

        $response = new Response();
        $response->setContent($this->mapExceptionToResponseContent($exception));
        $response->setStatusCode($this->mapExceptionToStatusCode($exception));

        $event->setResponse($response);
    }
}