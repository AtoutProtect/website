<?php

class ProductController
{

    private $id;
    private $name;
    private $categorie;
    private $base_price;
    private $coeffTypeLicence;
    private $totalProductPrice;
    private $description;

    public function getCoeffTypeLicence()
    {
        return $this->coeffTypeLicence;
    }

    public function getTotalProductPrice()
    {
        return $this->totalProductPrice;
    }

    public function setCoeffTypeLicence($coeffTypeLicence)
    {
        $this->coeffTypeLicence = $coeffTypeLicence;
    }

    public function setTotalProductPrice($totalProductPrice)
    {
        $this->totalProductPrice = $totalProductPrice;
    }

    public function getBasePrice()
    {
        return $this->base_price;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setBasePrice($base_price)
    {
        $this->base_price = $base_price;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

}