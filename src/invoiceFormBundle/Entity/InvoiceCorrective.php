<?php

namespace invoiceFormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceCorrective
 *
 * @ORM\Table(name="invoice_corrective")
 * @ORM\Entity(repositoryClass="invoiceFormBundle\Repository\InvoiceCorrectiveRepository")
 */
class InvoiceCorrective extends Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="invoiceCorrected", type="string", length=255, unique=true)
     */
    protected $invoiceCorrected;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255)
     */
    protected $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="correction")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     */
    protected $invoices;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set invoiceCorrected
     *
     * @param integer $invoiceCorrected
     * @return InvoiceCorrective
     */
    public function setInvoiceCorrected($invoiceCorrected)
    {
        $this->invoiceCorrected = $invoiceCorrected;

        return $this;
    }

    /**
     * Get invoiceCorrected
     *
     * @return integer 
     */
    public function getInvoiceCorrected()
    {
        return $this->invoiceCorrected;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return InvoiceCorrective
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set invoices
     *
     * @param \invoiceFormBundle\Entity\Invoice $invoices
     * @return InvoiceCorrective
     */
    public function setInvoices(\invoiceFormBundle\Entity\Invoice $invoices = null)
    {
        $this->invoices = $invoices;

        return $this;
    }

    /**
     * Get invoices
     *
     * @return \invoiceFormBundle\Entity\Invoice 
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * Add correction
     *
     * @param \invoiceFormBundle\Entity\InvoiceCorrective $correction
     * @return InvoiceCorrective
     */
    public function addCorrection(\invoiceFormBundle\Entity\InvoiceCorrective $correction)
    {
        $this->correction[] = $correction;

        return $this;
    }

    /**
     * Remove correction
     *
     * @param \invoiceFormBundle\Entity\InvoiceCorrective $correction
     */
    public function removeCorrection(\invoiceFormBundle\Entity\InvoiceCorrective $correction)
    {
        $this->correction->removeElement($correction);
    }

    /**
     * Get correction
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCorrection()
    {
        return $this->correction;
    }
}
