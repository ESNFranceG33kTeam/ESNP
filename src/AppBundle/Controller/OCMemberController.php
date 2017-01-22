<?php

namespace AppBundle\Controller;

use AppBundle\Entity\OCMember;
use AppBundle\Form\OCMemberType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/ocmember")
 *
 * Class OCMemberController
 * @package AppBundle\Controller
 */
class OCMemberController extends Controller
{
    /**
     * @Route("/new", name="new_oc_member")
     */
    public function newAction(Request $request)
    {
        $ocmember = new OCMember();

        $form = $this->createForm(OCMemberType::class, $ocmember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $ocmember->getPicture();
            $fileName = $this->get('app.file_uploader')->upload($file);
            $ocmember->setPicture($fileName);

            $this->getDoctrine()->getManager()->persist($ocmember);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('user_homepage'));
        }

        return $this->render('AppBundle:ocmember:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
