<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ekintzamotadet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ekintzamotadet controller.
 *
 * @Route("admin/ekintzamotadet")
 */
class EkintzamotadetController extends Controller
{
    /**
     * Lists all ekintzamotadet entities.
     *
     * @Route("/", name="admin_ekintzamotadet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ekintzamotadets = $em->getRepository('AppBundle:Ekintzamotadet')->findAll();

        return $this->render('ekintzamotadet/index.html.twig', array(
            'ekintzamotadets' => $ekintzamotadets,
        ));
    }

    /**
     * Creates a new ekintzamotadet entity.
     *
     * @Route("/new", name="admin_ekintzamotadet_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param $ekintzamotaid
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request, $ekintzamotaid='')
    {
        $em = $this->getDoctrine()->getManager();
        $ekintzamotadet = new Ekintzamotadet();

        if ( $ekintzamotaid !== '') {
            $ekintzamota = $em->getRepository('AppBundle:EkintzaMota')->find($ekintzamotaid);
            $ekintzamotadet->setEkintzamota($ekintzamota);
        }




        $form = $this->createForm('AppBundle\Form\EkintzamotadetType', $ekintzamotadet);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ekintzamotadet);
            $em->flush();

            return $this->redirectToRoute('admin_ekintzamota_show', array('id' => $ekintzamotadet->getEkintzamota()->getId()));
        }

        return $this->render('ekintzamotadet/new.html.twig', array(
            'ekintzamotadet' => $ekintzamotadet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ekintzamotadet entity.
     *
     * @Route("/{id}", name="admin_ekintzamotadet_show")
     * @Method("GET")
     */
    public function showAction(Ekintzamotadet $ekintzamotadet)
    {
        $deleteForm = $this->createDeleteForm($ekintzamotadet);

        return $this->render('ekintzamotadet/show.html.twig', array(
            'ekintzamotadet' => $ekintzamotadet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ekintzamotadet entity.
     *
     * @Route("/{id}/edit", name="admin_ekintzamotadet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ekintzamotadet $ekintzamotadet)
    {
        $deleteForm = $this->createDeleteForm($ekintzamotadet);
        $editForm = $this->createForm('AppBundle\Form\EkintzamotadetType', $ekintzamotadet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_ekintzamota_show', array('id' => $ekintzamotadet->getEkintzamota()->getId()));
        }

        return $this->render('ekintzamotadet/edit.html.twig', array(
            'ekintzamotadet' => $ekintzamotadet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ekintzamotadet entity.
     *
     * @Route("/{id}", name="admin_ekintzamotadet_delete")
     * @Method("DELETE")
     * @param Request $request
     * @param Ekintzamotadet $ekintzamotadet
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Ekintzamotadet $ekintzamotadet)
    {
        $miid = $ekintzamotadet->getEkintzamota()->getId();
        $form = $this->createDeleteForm($ekintzamotadet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ekintzamotadet);
            $em->flush();
        }

        return $this->redirectToRoute('admin_ekintzamota_show', array('id' => $miid));
    }

    /**
     * Creates a form to delete a ekintzamotadet entity.
     *
     * @param Ekintzamotadet $ekintzamotadet The ekintzamotadet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ekintzamotadet $ekintzamotadet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_ekintzamotadet_delete', array('id' => $ekintzamotadet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
