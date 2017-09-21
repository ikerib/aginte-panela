<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Txostenadet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Txostenadet controller.
 *
 * @Route("txostenadet")
 */
class TxostenadetController extends Controller
{
    /**
     * Lists all txostenadet entities.
     *
     * @Route("/", name="txostenadet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $txostenadets = $em->getRepository('AppBundle:Txostenadet')->findAll();

        return $this->render('txostenadet/index.html.twig', array(
            'txostenadets' => $txostenadets,
        ));
    }

    /**
     * Creates a new txostenadet entity.
     *
     * @Route("/new", name="txostenadet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $txostenadet = new Txostenadet();
        $form = $this->createForm('AppBundle\Form\TxostenadetType', $txostenadet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($txostenadet);
            $em->flush();

            return $this->redirectToRoute('txostenadet_show', array('id' => $txostenadet->getId()));
        }

        return $this->render('txostenadet/new.html.twig', array(
            'txostenadet' => $txostenadet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a txostenadet entity.
     *
     * @Route("/{id}", name="txostenadet_show")
     * @Method("GET")
     */
    public function showAction(Txostenadet $txostenadet)
    {
        $deleteForm = $this->createDeleteForm($txostenadet);

        return $this->render('txostenadet/show.html.twig', array(
            'txostenadet' => $txostenadet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing txostenadet entity.
     *
     * @Route("/{id}/edit", name="txostenadet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Txostenadet $txostenadet)
    {
        $deleteForm = $this->createDeleteForm($txostenadet);
        $editForm = $this->createForm('AppBundle\Form\TxostenadetType', $txostenadet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('txostenadet_edit', array('id' => $txostenadet->getId()));
        }

        return $this->render('txostenadet/edit.html.twig', array(
            'txostenadet' => $txostenadet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a txostenadet entity.
     *
     * @Route("/{id}", name="txostenadet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Txostenadet $txostenadet)
    {
        $form = $this->createDeleteForm($txostenadet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($txostenadet);
            $em->flush();
        }

        return $this->redirectToRoute('txostenadet_index');
    }

    /**
     * Creates a form to delete a txostenadet entity.
     *
     * @param Txostenadet $txostenadet The txostenadet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Txostenadet $txostenadet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('txostenadet_delete', array('id' => $txostenadet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
