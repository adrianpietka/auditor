<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AppController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) : JsonResponse
    {
        return $this->json([], Response::HTTP_OK);
    }
}
