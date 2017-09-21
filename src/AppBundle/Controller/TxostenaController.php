<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Txostena;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Txostena controller.
 *
 * @Route("txostena")
 */
class TxostenaController extends Controller
{
    /**
     * Lists all txostena entities.
     *
     * @Route("/", name="txostena_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $txostenas = $em->getRepository('AppBundle:Txostena')->findAll();

        return $this->render('txostena/index.html.twig', array(
            'txostenas' => $txostenas,
        ));
    }

    /**
     * Creates a new txostena entity.
     *
     * @Route("/new", name="txostena_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $txostena = new Txostena();
        $form = $this->createForm('AppBundle\Form\TxostenaType', $txostena);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($txostena);
            $em->flush();

            return $this->redirectToRoute('txostena_show', array('id' => $txostena->getId()));
        }

        return $this->render('txostena/new.html.twig', array(
            'txostena' => $txostena,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a txostena entity.
     *
     * @Route("/{id}", name="txostena_show")
     * @Method("GET")
     * @param Txostena $txostena
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Txostena $txostena)
    {
        $deleteForm = $this->createDeleteForm($txostena);

        $em = $this->getDoctrine()->getManager();
        $ekintzamotak = $em->getRepository('AppBundle:EkintzaMota')->findAll();

        return $this->render('txostena/show.html.twig', array(
            'txostena' => $txostena,
            'ekintzamotak' => $ekintzamotak,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing txostena entity.
     *
     * @Route("/{id}/edit", name="txostena_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Txostena $txostena)
    {
        $deleteForm = $this->createDeleteForm($txostena);
        $editForm = $this->createForm('AppBundle\Form\TxostenaType', $txostena);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('txostena_edit', array('id' => $txostena->getId()));
        }

        return $this->render('txostena/edit.html.twig', array(
            'txostena' => $txostena,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a txostena entity.
     *
     * @Route("/{id}", name="txostena_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Txostena $txostena)
    {
        $form = $this->createDeleteForm($txostena);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($txostena);
            $em->flush();
        }

        return $this->redirectToRoute('txostena_index');
    }

    /**
     * Creates a form to delete a txostena entity.
     *
     * @param Txostena $txostena The txostena entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Txostena $txostena)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('txostena_delete', array('id' => $txostena->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
