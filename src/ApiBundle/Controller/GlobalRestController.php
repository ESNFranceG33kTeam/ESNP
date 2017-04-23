<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\JsonResponse;

class GlobalRestController extends FOSRestController
{
    /**
     * Get global informations
     *
     * @ApiDoc(
     *     resource=true,
     *     section="Global",
     *     statusCodes={
     *         200="OK"
     *     },
     *     views={ "default" }
     * )
     *
     * @Get("/esnp")
     *
     * @return JsonResponse
     */
    public function getGlobalInformationAction()
    {
        $view = $this->view($this->getDoctrine()->getRepository('AppBundle:Event')->findAll(), 200);

        $view->setContext($view->getContext()->setGroups(array('global')));
        return $this->handleView($view);
    }
}
