<?php

namespace AppBundle\Controller;

use AuditorBundle\Command\CreateNewProjectCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends AppController
{
    /**
     * @Route("/projects", name="projects_list")
     * @Method("GET")
     * @return JsonResponse
     */
    public function listAction() : JsonResponse
    {
        return $this->json([], Response::HTTP_OK);
    }

    /**
     * @Route("/projects", name="projects_create")
     * @Method("POST")
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request) : JsonResponse
    {
        $this->commandBus()->handle(new CreateNewProjectCommand(
            (string)$request->request->get('name')
        ));

        return $this->json(null, Response::HTTP_CREATED);
    }
}
