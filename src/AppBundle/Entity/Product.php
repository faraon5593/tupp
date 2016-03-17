<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @Groups({"productList"})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_szczecinek", type="integer", nullable=false)
     */
    private $quantitySzczecinek;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_wroclaw", type="integer", nullable=false)
     */
    private $quantityWroclaw;

    /**
     * @var string
     *
     * @ORM\Column(name="base_price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $basePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="avaliable", type="boolean", nullable=false)
     */
    private $avaliable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="avaliable_from", type="date", nullable=true)
     */
    private $avaliableFrom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="avaliable_until", type="date", nullable=true)
     */
    private $avaliableUntil;

    /**
     * @var string
     *
     * @ORM\Column(name="external_url", type="string", length=255, nullable=true)
     */
    private $externalUrl;



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
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set quantitySzczecinek
     *
     * @param integer $quantitySzczecinek
     *
     * @return Product
     */
    public function setQuantitySzczecinek($quantitySzczecinek)
    {
        $this->quantitySzczecinek = $quantitySzczecinek;

        return $this;
    }

    /**
     * Get quantitySzczecinek
     *
     * @return integer
     */
    public function getQuantitySzczecinek()
    {
        return $this->quantitySzczecinek;
    }

    /**
     * Set quantityWroclaw
     *
     * @param integer $quantityWroclaw
     *
     * @return Product
     */
    public function setQuantityWroclaw($quantityWroclaw)
    {
        $this->quantityWroclaw = $quantityWroclaw;

        return $this;
    }

    /**
     * Get quantityWroclaw
     *
     * @return integer
     */
    public function getQuantityWroclaw()
    {
        return $this->quantityWroclaw;
    }

    /**
     * Set basePrice
     *
     * @param string $basePrice
     *
     * @return Product
     */
    public function setBasePrice($basePrice)
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    /**
     * Get basePrice
     *
     * @return string
     */
    public function getBasePrice()
    {
        return $this->basePrice;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set avaliable
     *
     * @param boolean $avaliable
     *
     * @return Product
     */
    public function setAvaliable($avaliable)
    {
        $this->avaliable = $avaliable;

        return $this;
    }

    /**
     * Get avaliable
     *
     * @return boolean
     */
    public function getAvaliable()
    {
        return $this->avaliable;
    }

    /**
     * Set avaliableFrom
     *
     * @param \DateTime $avaliableFrom
     *
     * @return Product
     */
    public function setAvaliableFrom($avaliableFrom)
    {
        $this->avaliableFrom = $avaliableFrom;

        return $this;
    }

    /**
     * Get avaliableFrom
     *
     * @return \DateTime
     */
    public function getAvaliableFrom()
    {
        return $this->avaliableFrom;
    }

    /**
     * Set avaliableUntil
     *
     * @param \DateTime $avaliableUntil
     *
     * @return Product
     */
    public function setAvaliableUntil($avaliableUntil)
    {
        $this->avaliableUntil = $avaliableUntil;

        return $this;
    }

    /**
     * Get avaliableUntil
     *
     * @return \DateTime
     */
    public function getAvaliableUntil()
    {
        return $this->avaliableUntil;
    }

    /**
     * Set externalUrl
     *
     * @param string $externalUrl
     *
     * @return Product
     */
    public function setExternalUrl($externalUrl)
    {
        $this->externalUrl = $externalUrl;

        return $this;
    }

    /**
     * Get externalUrl
     *
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->externalUrl;
    }
}
