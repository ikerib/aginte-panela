<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Txostenadetval;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Txostenadetval controller.
 *
 * @Route("txostenadetval")
 */
class TxostenadetvalController extends Controller
{
    /**
     * Lists all txostenadetval entities.
     *
     * @Route("/", name="txostenadetval_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $txostenadetvals = $em->getRepository('AppBundle:Txostenadetval')->findAll();

        return $this->render('txostenadetval/index.html.twig', array(
            'txostenadetvals' => $txostenadetvals,
        ));
    }

    /**
     * Creates a new txostenadetval entity.
     *
     * @Route("/new", name="txostenadetval_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $txostenadetval = new Txostenadetval();
        $form = $this->createForm('AppBundle\Form\TxostenadetvalType', $txostenadetval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($txostenadetval);
            $em->flush();

            return $this->redirectToRoute('txostenadetval_show', array('id' => $txostenadetval->getId()));
        }

        return $this->render('txostenadetval/new.html.twig', array(
            'txostenadetval' => $txostenadetval,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a txostenadetval entity.
     *
     * @Route("/{id}", name="txostenadetval_show")
     * @Method("GET")
     */
    public function showAction(Txostenadetval $txostenadetval)
    {
        $deleteForm = $this->createDeleteForm($txostenadetval);

        return $this->render('txostenadetval/show.html.twig', array(
            'txostenadetval' => $txostenadetval,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing txostenadetval entity.
     *
     * @Route("/{id}/edit", name="txostenadetval_edit")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param Txostenadetval $txostenadetval
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Txostenadetval $txostenadetval)
    {
        $deleteForm = $this->createDeleteForm($txostenadetval);
        $editForm = $this->createForm('AppBundle\Form\TxostenadetvalType', $txostenadetval);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('txostenadetval_edit', array('id' => $txostenadetval->getId()));
        }

        return $this->render('txostenadetval/edit.html.twig', array(
            'txostenadetval' => $txostenadetval,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a txostenadetval entity.
     *
     * @Route("/{id}", name="txostenadetval_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Txostenadetval $txostenadetval
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Txostenadetval $txostenadetval)
    {
        $form = $this->createDeleteForm($txostenadetval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($txostenadetval);
            $em->flush();
        }

        return $this->redirectToRoute('txostenadetval_index');
    }

    /**
     * Creates a form to delete a txostenadetval entity.
     *
     * @param Txostenadetval $txostenadetval The txostenadetval entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Txostenadetval $txostenadetval)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('txostenadetval_delete', array('id' => $txostenadetval->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
