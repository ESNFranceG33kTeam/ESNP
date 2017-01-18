<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="landingpage")
     */
    public function indexAction(Request $request)
    {
        if ($this->getUser()) {
            $route = $this->getUser()->hasRole('ROLE_ADMIN') ? "admin" : "user";
            $route .= "_homepage";

            return $this->redirectToRoute($route);
        }

        return $this->render('AppBundle::landing.html.twig');
    }
}
