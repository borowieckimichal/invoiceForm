<?php

namespace invoiceFormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Positions
 *
 * @ORM\Table(name="positions")
 * @ORM\Entity(repositoryClass="invoiceFormBundle\Repository\PositionsRepository")
 */
class Positions
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
     * @ORM\Column(name="productName", type="string", length=255)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="string", length=255)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="unitMeasure", type="string", length=255)
     */
    private $unitMeasure;

    /**
     * @var string
     *
     * @ORM\Column(name="priceNet", type="string", length=255)
     */
    private $priceNet;

    /**
     * @var string
     *
     * @ORM\Column(name="valueNet", type="string", length=255)
     */
    private $valueNet;

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="string", length=255)
     */
    private $vat;

    /**
     * @var string
     *
     * @ORM\Column(name="valueGross", type="string", length=255)
     */
    private $valueGross;
    
    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="positions")
     * @ORM\JoinColumn(name="invoice_id", referencedColumnName="id", onDelete="CASCADE", nullable=true) 
     */
    private $invoice;
    
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
     * Set productName
     *
     * @param string $productName
     * @return Positions
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     * @return Positions
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitMeasure
     *
     * @param string $unitMeasure
     * @return Positions
     */
    public function setUnitMeasure($unitMeasure)
    {
        $this->unitMeasure = $unitMeasure;

        return $this;
    }

    /**
     * Get unitMeasure
     *
     * @return string 
     */
    public function getUnitMeasure()
    {
        return $this->unitMeasure;
    }

    /**
     * Set priceNet
     *
     * @param string $priceNet
     * @return Positions
     */
    public function setPriceNet($priceNet)
    {
        $this->priceNet = $priceNet;

        return $this;
    }

    /**
     * Get priceNet
     *
     * @return string 
     */
    public function getPriceNet()
    {
        return $this->priceNet;
    }

    /**
     * Set valueNet
     *
     * @param string $valueNet
     * @return Positions
     */
    public function setValueNet($valueNet)
    {
        $this->valueNet = $valueNet;

        return $this;
    }

    /**
     * Get valueNet
     *
     * @return string 
     */
    public function getValueNet()
    {
        return $this->valueNet;
    }

    /**
     * Set vat
     *
     * @param string $vat
     * @return Positions
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Get vat
     *
     * @return string 
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set valueGross
     *
     * @param string $valueGross
     * @return Positions
     */
    public function setValueGross($valueGross)
    {
        $this->valueGross = $valueGross;

        return $this;
    }

    /**
     * Get valueGross
     *
     * @return string 
     */
    public function getValueGross()
    {
        return $this->valueGross;
    }

    /**
     * Set invoice
     *
     * @param \invoiceFormBundle\Entity\Invoice $invoice
     * @return Positions
     */
    public function setInvoice(\invoiceFormBundle\Entity\Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \invoiceFormBundle\Entity\Invoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}
