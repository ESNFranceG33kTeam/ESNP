<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserRestController extends FOSRestController
{
    /**
     * List all users
     *
     * @ApiDoc(
     *     resource=true,
     *     section="users",
     *     statusCodes={
     *         200="All users"
     *     },
     *     output={
     *         "class"="array<UserBundle\Entity\User>",
     *         "groups"={"user"}
     *     },
     *     tags={
     *         "stable" = "#006600"
     *      },
     *      views={ "default", "esnp" }
     * )
     *
     * @Get("/users")
     *
     * @return JsonResponse
     */
    public function getArticleAction()
    {
        $view = $this->view($this->getDoctrine()->getRepository('UserBundle:User')->findAll(), 200);
        //$view->setContext($view->getContext()->setGroups(array('article', 'name')));
        return $this->handleView($view);
    }
}
