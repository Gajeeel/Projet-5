<?php

namespace Ent;

class Category {

    private $id;
    private $name;

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

    public function hydrate($data){
        foreach ($data as $key => $value){
            $method = "set".ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

}