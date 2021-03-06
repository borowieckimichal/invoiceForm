<?php

namespace invoiceFormBundle\Controller;

use invoiceFormBundle\Entity\InvoiceCorrective;
use invoiceFormBundle\Entity\Invoice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Invoicecorrective controller.
 *
 * @Route("invoicecorrective")
 */
class InvoiceCorrectiveController extends Controller
{
    /**
     * Lists all invoiceCorrective entities.
     *
     * @Route("/", name="invoicecorrective_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $invoiceCorrectives = $em->getRepository('invoiceFormBundle:InvoiceCorrective')->findAll();

        return $this->render('invoicecorrective/index.html.twig', array(
            'invoiceCorrectives' => $invoiceCorrectives,
        ));
    }

    /**
     * Creates a new invoiceCorrective entity.
     *
     * @Route("/{Id_invoice}/new", name="invoicecorrective_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $Id_invoice)
    {
        $em =$this->getDoctrine()->getManager();
        $invoice = $em->getRepository('invoiceFormBundle:Invoice')->find($Id_invoice);
        
        $invoiceCorrective = new Invoicecorrective();
        $form = $this->createForm('invoiceFormBundle\Form\InvoiceCorrectiveType', $invoiceCorrective->setInvoiceCorrected($invoice->getNumber())
                ->setCompany($invoice->getCompany())->setCustomer($invoice->getCustomer())->setInvoices($invoice));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($invoiceCorrective);
            $invoicePositions = $invoiceCorrective->getPositions();
            foreach ($invoicePositions as $invoicePosition) {
                $invoicePosition->setInvoice($invoiceCorrective);
            }
            
                       
            $em->flush();

            return $this->redirectToRoute('invoicecorrective_show', array('id' => $invoiceCorrective->getId()));
        }

        return $this->render('invoicecorrective/new.html.twig', array(
            'invoiceCorrective' => $invoiceCorrective,
            'form' => $form->createView(),
            'invoice' => $invoice,
        ));
    }

    /**
     * Finds and displays a invoiceCorrective entity.
     *
     * @Route("/{id}", name="invoicecorrective_show", requirements={"id"=".+"})
     * @Method("GET")
     */
    public function showAction(InvoiceCorrective $invoiceCorrective)
    {
        $deleteForm = $this->createDeleteForm($invoiceCorrective);
        
        $em =$this->getDoctrine()->getManager();
        $invoiceRepo = $em->getRepository('invoiceFormBundle:Invoice');
        $invoice = $invoiceRepo->find($invoiceCorrective->getInvoices());
        return $this->render('invoicecorrective/show.html.twig', array(
            'invoiceCorrective' => $invoiceCorrective,
            'delete_form' => $deleteForm->createView(),
            'invoice' => $invoice,
        ));
    }

    /**
     * Displays a form to edit an existing invoiceCorrective entity.
     *
     * @Route("/{id}/edit", name="invoicecorrective_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, InvoiceCorrective $invoiceCorrective)
    {
        $deleteForm = $this->createDeleteForm($invoiceCorrective);
        $editForm = $this->createForm('invoiceFormBundle\Form\InvoiceCorrectiveType', $invoiceCorrective);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('invoicecorrective_edit', array('id' => $invoiceCorrective->getId()));
        }

        return $this->render('invoicecorrective/edit.html.twig', array(
            'invoiceCorrective' => $invoiceCorrective,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a invoiceCorrective entity.
     *
     * @Route("/{id}", name="invoicecorrective_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, InvoiceCorrective $invoiceCorrective)
    {
        $form = $this->createDeleteForm($invoiceCorrective);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($invoiceCorrective);
            $em->flush();
        }

        return $this->redirectToRoute('invoicecorrective_index');
    }

    /**
     * Creates a form to delete a invoiceCorrective entity.
     *
     * @param InvoiceCorrective $invoiceCorrective The invoiceCorrective entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(InvoiceCorrective $invoiceCorrective)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('invoicecorrective_delete', array('id' => $invoiceCorrective->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
