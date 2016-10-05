<?php

namespace IGBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use IGBundle\Entity\GroupIG;
use IGBundle\Form\GroupIGType;

/**
 * GroupIG controller.
 *
 * @Route("/groupig")
 */
class GroupIGController extends Controller
{
    /**
     * Lists all GroupIG entities.
     *
     * @Route("/", name="groupig_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupIGs = $em->getRepository('IGBundle:GroupIG')->findAll();

        return $this->render('groupig/index.html.twig', array(
            'groupIGs' => $groupIGs,
        ));
    }

    /**
     * Creates a new GroupIG entity.
     *
     * @Route("/new", name="groupig_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupIG = new GroupIG();
        $form = $this->createForm('IGBundle\Form\GroupIGType', $groupIG);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupIG);
            $em->flush();

            return $this->redirectToRoute('groupig_show', array('id' => $groupIG->getId()));
        }

        return $this->render('groupig/new.html.twig', array(
            'groupIG' => $groupIG,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a GroupIG entity.
     *
     * @Route("/{id}", name="groupig_show")
     * @Method("GET")
     */
    public function showAction(GroupIG $groupIG)
    {
        $deleteForm = $this->createDeleteForm($groupIG);

        return $this->render('groupig/show.html.twig', array(
            'groupIG' => $groupIG,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing GroupIG entity.
     *
     * @Route("/{id}/edit", name="groupig_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GroupIG $groupIG)
    {
        $deleteForm = $this->createDeleteForm($groupIG);
        $editForm = $this->createForm('IGBundle\Form\GroupIGType', $groupIG);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupIG);
            $em->flush();

            return $this->redirectToRoute('groupig_edit', array('id' => $groupIG->getId()));
        }

        return $this->render('groupig/edit.html.twig', array(
            'groupIG' => $groupIG,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a GroupIG entity.
     *
     * @Route("/{id}", name="groupig_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GroupIG $groupIG)
    {
        $form = $this->createDeleteForm($groupIG);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupIG);
            $em->flush();
        }

        return $this->redirectToRoute('groupig_index');
    }

    /**
     * Creates a form to delete a GroupIG entity.
     *
     * @param GroupIG $groupIG The GroupIG entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupIG $groupIG)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupig_delete', array('id' => $groupIG->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
