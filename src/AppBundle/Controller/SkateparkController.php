<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Skatepark;
use AppBundle\Form\SkateparkType;

/**
 * Skatepark controller.
 *
 */
class SkateparkController extends Controller
{
    /**
     * Lists all Skatepark entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $skateparks = $em->getRepository('AppBundle:Skatepark')->findAll();

        return $this->render('skatepark/index.html.twig', array(
            'skateparks' => $skateparks,
        ));
    }

    /**
     * Creates a new Skatepark entity.
     *
     */
    public function newAction(Request $request)
    {
        $skatepark = new Skatepark();
        $form = $this->createForm('AppBundle\Form\SkateparkType', $skatepark);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skatepark);
            $em->flush();

            return $this->redirectToRoute('skatepark_show', array('id' => $skatepark->getId()));
        }

        return $this->render('skatepark/new.html.twig', array(
            'skatepark' => $skatepark,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Skatepark entity.
     *
     */
    public function showAction(Skatepark $skatepark)
    {
        $deleteForm = $this->createDeleteForm($skatepark);

        return $this->render('skatepark/show.html.twig', array(
            'skatepark' => $skatepark,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Skatepark entity.
     *
     */
    public function editAction(Request $request, Skatepark $skatepark)
    {
        $deleteForm = $this->createDeleteForm($skatepark);
        $editForm = $this->createForm('AppBundle\Form\SkateparkType', $skatepark);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skatepark);
            $em->flush();

            return $this->redirectToRoute('skatepark_edit', array('id' => $skatepark->getId()));
        }

        return $this->render('skatepark/edit.html.twig', array(
            'skatepark' => $skatepark,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Skatepark entity.
     *
     */
    public function deleteAction(Request $request, Skatepark $skatepark)
    {
        $form = $this->createDeleteForm($skatepark);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($skatepark);
            $em->flush();
        }

        return $this->redirectToRoute('skatepark_index');
    }

    /**
     * Creates a form to delete a Skatepark entity.
     *
     * @param Skatepark $skatepark The Skatepark entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Skatepark $skatepark)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('skatepark_delete', array('id' => $skatepark->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
}
