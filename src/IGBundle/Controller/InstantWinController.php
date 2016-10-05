<?php

namespace IGBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IGBundle\Entity\InstantWin;
use IGBundle\Form\InstantWinType;

/**
 * InstantWin controller.
 *
 * @Route("/instantwin")
 */
class InstantWinController extends Controller
{
    /**
     * Lists all InstantWin entities.
     *
     * @Route("/", name="instantwin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $instantWins = $em->getRepository('IGBundle:InstantWin')->findAll();

        return $this->render('instantwin/index.html.twig', array(
            'instantWins' => $instantWins,
        ));
    }

    /**
     * Creates a new InstantWin entity.
     *
     * @Route("/new", name="instantwin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $instantWin = new InstantWin();
        $form = $this->createForm('IGBundle\Form\InstantWinType', $instantWin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instantWin);
            $em->flush();

            return $this->redirectToRoute('instantwin_show', array('id' => $instantWin->getId()));
        }

        return $this->render('instantwin/new.html.twig', array(
            'instantWin' => $instantWin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a InstantWin entity.
     *
     * @Route("/{id}", name="instantwin_show")
     * @Method("GET")
     */
    public function showAction(InstantWin $instantWin)
    {
        $deleteForm = $this->createDeleteForm($instantWin);

        return $this->render('instantwin/show.html.twig', array(
            'instantWin' => $instantWin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing InstantWin entity.
     *
     * @Route("/{id}/edit", name="instantwin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InstantWin $instantWin)
    {
        $deleteForm = $this->createDeleteForm($instantWin);
        $editForm = $this->createForm('IGBundle\Form\InstantWinType', $instantWin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instantWin);
            $em->flush();

            return $this->redirectToRoute('instantwin_edit', array('id' => $instantWin->getId()));
        }

        return $this->render('instantwin/edit.html.twig', array(
            'instantWin' => $instantWin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a InstantWin entity.
     *
     * @Route("/{id}", name="instantwin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InstantWin $instantWin)
    {
        $form = $this->createDeleteForm($instantWin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($instantWin);
            $em->flush();
        }

        return $this->redirectToRoute('instantwin_index');
    }

    /**
     * Creates a form to delete a InstantWin entity.
     *
     * @param InstantWin $instantWin The InstantWin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InstantWin $instantWin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('instantwin_delete', array('id' => $instantWin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
