<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 14/03/2018
 * Time: 16:14
 */

class AnimalBuilder
{
    private $data;
    private $error;

    const NAME_REF = "nomdd";
    const SPECIES_REF = "espezzce";
    const AGE_REF = "qqage";

    public function __construct($data)
    {
        $this->data = $data;
        $this->error = null;
    }

    public function createAnimal()
    {
        return new Animal($this->data[$this::NAME_REF], htmlspecialchars($this->data[$this::SPECIES_REF]),$this->data[$this::AGE_REF]);
    }

    public function isValid()
    {
        if (empty($this->data[$this::NAME_REF]) or empty($this->data[$this::SPECIES_REF]) or $this->data[$this::AGE_REF] <= 0) {
                $error = "";
            if (empty($this->data[$this::NAME_REF]))
                $error .= "Nom manquant !";
            if (empty($this->data[$this::SPECIES_REF]))
                $error .= "Espece manquante !";
            if (isset($this->data[$this::AGE_REF]) and $this->data[$this::AGE_REF] <= 0)
                $error .= "Age ne peut pas etre < 0 !";
            $this->error = $error;
            return false;
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param null $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }



}