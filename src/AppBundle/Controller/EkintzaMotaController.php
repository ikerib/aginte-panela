<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EkintzaMota;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ekintzamotum controller.
 *
 * @Route("admin/ekintzamota")
 */
class EkintzaMotaController extends Controller
{
    /**
     * Lists all ekintzaMotum entities.
     *
     * @Route("/", name="admin_ekintzamota_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ekintzaMotas = $em->getRepository('AppBundle:EkintzaMota')->findAll();

        return $this->render('ekintzamota/index.html.twig', array(
            'ekintzaMotas' => $ekintzaMotas,
        ));
    }

    /**
     * Creates a new ekintzaMotum entity.
     *
     * @Route("/new", name="admin_ekintzamota_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ekintzaMotum = new EkintzaMota();
        $form = $this->createForm('AppBundle\Form\EkintzaMotaType', $ekintzaMotum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ekintzaMotum);
            $em->flush();

            return $this->redirectToRoute('admin_ekintzamota_index');
        }

        return $this->render('ekintzamota/new.html.twig', array(
            'ekintzaMotum' => $ekintzaMotum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ekintzaMotum entity.
     *
     * @Route("/{id}", name="admin_ekintzamota_show")
     * @Method("GET")
     */
    public function showAction(EkintzaMota $ekintzaMotum)
    {
        $deleteForm = $this->createDeleteForm($ekintzaMotum);

        return $this->render('ekintzamota/show.html.twig', array(
            'ekintzaMotum' => $ekintzaMotum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ekintzaMotum entity.
     *
     * @Route("/{id}/edit", name="admin_ekintzamota_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EkintzaMota $ekintzaMotum)
    {
        $deleteForm = $this->createDeleteForm($ekintzaMotum);
        $editForm = $this->createForm('AppBundle\Form\EkintzaMotaType', $ekintzaMotum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_ekintzamota_edit', array('id' => $ekintzaMotum->getId()));
        }

        return $this->render('ekintzamota/edit.html.twig', array(
            'ekintzaMotum' => $ekintzaMotum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ekintzaMotum entity.
     *
     * @Route("/{id}", name="admin_ekintzamota_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EkintzaMota $ekintzaMotum)
    {
        $form = $this->createDeleteForm($ekintzaMotum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ekintzaMotum);
            $em->flush();
        }

        return $this->redirectToRoute('admin_ekintzamota_index');
    }

    /**
     * Creates a form to delete a ekintzaMotum entity.
     *
     * @param EkintzaMota $ekintzaMotum The ekintzaMotum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EkintzaMota $ekintzaMotum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_ekintzamota_delete', array('id' => $ekintzaMotum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
