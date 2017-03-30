<?php

namespace AppBundle\Controller;

use AppBundle\Query\ListsProjectQuery;
use AppBundle\Query\Util\Pagination;
use AuditorBundle\Command\CreateNewProjectCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends AppController
{
    /**
     * @Route("/projects", name="projects_list")
     * @Method("GET")
     * @param Request $request
     * @return JsonResponse
     */
    public function listAction(Request $request) : JsonResponse
    {
        $page = (int)$request->query->get('page', Pagination::DEFAULT_PAGE);
        $limit = (int)$request->query->get('limit', Pagination::DEFAULT_LIMIT);

        $projects = $this->queryDispatcher()->execute(new ListsProjectQuery(
            new Pagination($page, $limit)
        ));

        return $this->json($projects, Response::HTTP_OK);
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
