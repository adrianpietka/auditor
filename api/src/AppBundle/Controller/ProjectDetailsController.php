<?php

namespace AppBundle\Controller;

use AppBundle\Query\GetProjectByIdQuery;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProjectDetailsController extends AppController
{
    /**
     * @Route("/projects/{id}", name="project_index", requirements={"id": "\d+"})
     * @Method("GET")
     * @param int $id
     * @return JsonResponse
     */
    public function indexAction(int $id) : JsonResponse
    {
        $project = $this->queryDispatcher()->execute(new GetProjectByIdQuery((int)$id));

        return $this->json($project, Response::HTTP_OK);
    }
}
