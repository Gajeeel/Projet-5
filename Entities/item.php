<?php

namespace Ent;

class Item {

    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $category;
    private $quantite;

    /**
     * Billet constructor.
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $titre
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $datetime_post
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $image
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

     /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $id
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function hydrate($data){
        foreach ($data as $key => $value){
            $method = "set".ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

}