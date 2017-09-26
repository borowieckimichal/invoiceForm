<?php

namespace invoiceFormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="invoiceFormBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @ORM\Column(name="number", type="string", length=255, unique=true)
     */
    private $number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="issueDate", type="date")
     */
    private $issueDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="saleDate", type="date")
     */
    private $saleDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="date", nullable=true)
     */
    private $dueDate;

    /**
     * @var string
     *
     * @ORM\Column(name="paymentCondition", type="string", length=255)
     */
    private $paymentCondition;

    /**
     * @var int
     *
     * @ORM\Column(name="iban", type="integer")
     */
    private $iban;
    
    /**
     * @var int
     * 
     * @ORM\Column(name="totalGross", type="integer")
     */
    private $totalGross;
    
    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="invoices")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;
    
    /**
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="invoices")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="Positions", mappedBy="invoice", cascade={"persist"})
     */
    private $positions;
    
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
     * Set number
     *
     * @param string $number
     * @return Invoice
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set issueDate
     *
     * @param \DateTime $issueDate
     * @return Invoice
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * Get issueDate
     *
     * @return \DateTime 
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * Set saleDate
     *
     * @param \DateTime $saleDate
     * @return Invoice
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    /**
     * Get saleDate
     *
     * @return \DateTime 
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Invoice
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set paymentCondition
     *
     * @param string $paymentCondition
     * @return Invoice
     */
    public function setPaymentCondition($paymentCondition)
    {
        $this->paymentCondition = $paymentCondition;

        return $this;
    }

    /**
     * Get paymentCondition
     *
     * @return string 
     */
    public function getPaymentCondition()
    {
        return $this->paymentCondition;
    }

    /**
     * Set iban
     *
     * @param integer $iban
     * @return Invoice
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return integer 
     */
    public function getIban()
    {
        return $this->iban;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->positions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set company
     *
     * @param \invoiceFormBundle\Entity\Company $company
     * @return Invoice
     */
    public function setCompany(\invoiceFormBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \invoiceFormBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set customer
     *
     * @param \invoiceFormBundle\Entity\Customer $customer
     * @return Invoice
     */
    public function setCustomer(\invoiceFormBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \invoiceFormBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Add positions
     *
     * @param \invoiceFormBundle\Entity\Positions $positions
     * @return Invoice
     */
    public function addPosition(\invoiceFormBundle\Entity\Positions $positions)
    {
        $this->positions[] = $positions;

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \invoiceFormBundle\Entity\Positions $positions
     */
    public function removePosition(\invoiceFormBundle\Entity\Positions $positions)
    {
        $this->positions->removeElement($positions);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set totalGross
     *
     * @param integer $totalGross
     * @return Invoice
     */
    public function setTotalGross($totalGross)
    {
        $this->totalGross = $totalGross;

        return $this;
    }

    /**
     * Get totalGross
     *
     * @return integer 
     */
    public function getTotalGross()
    {
        return $this->totalGross;
    }
}
