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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="invoiceCorrected", type="string", length=255, unique=true)
     */
    private $invoiceCorrected;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255)
     */
    private $comments;


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
}
