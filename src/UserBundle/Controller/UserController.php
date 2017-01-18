<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user")
 *
 * Class UserController
 * @package UserBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @Route("/", name="user_homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render("UserBundle:user:index.html.twig");
    }
}
