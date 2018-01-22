<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ProductNumber", type="string", length=25, unique=true)
     */
    private $productNumber;

    /**
     * @var bool
     *
     * @ORM\Column(name="MakeFlag", type="boolean")
     */
    private $makeFlag;

    /**
     * @var bool
     *
     * @ORM\Column(name="FinishedGoods", type="boolean")
     */
    private $finishedGoods;

    /**
     * @var string
     *
     * @ORM\Column(name="Color", type="string", length=15, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="ListPrice", type="string", length=255)
     */
    private $listPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="Weight", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $weight;


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
     * Set productNumber
     *
     * @param string $productNumber
     * @return Product
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;

        return $this;
    }

    /**
     * Get productNumber
     *
     * @return string 
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * Set makeFlag
     *
     * @param boolean $makeFlag
     * @return Product
     */
    public function setMakeFlag($makeFlag)
    {
        $this->makeFlag = $makeFlag;

        return $this;
    }

    /**
     * Get makeFlag
     *
     * @return boolean 
     */
    public function getMakeFlag()
    {
        return $this->makeFlag;
    }

    /**
     * Set finishedGoods
     *
     * @param boolean $finishedGoods
     * @return Product
     */
    public function setFinishedGoods($finishedGoods)
    {
        $this->finishedGoods = $finishedGoods;

        return $this;
    }

    /**
     * Get finishedGoods
     *
     * @return boolean 
     */
    public function getFinishedGoods()
    {
        return $this->finishedGoods;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Product
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set listPrice
     *
     * @param string $listPrice
     * @return Product
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * Get listPrice
     *
     * @return string 
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Set weight
     *
     * @param string $weight
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string 
     */
    public function getWeight()
    {
        return $this->weight;
    }
}
