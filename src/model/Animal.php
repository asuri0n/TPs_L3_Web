<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 22/02/2018
 * Time: 09:17
 */

class Animal
{
    private $nom;
    private $espece;
    private $age;

    /**
     * Animal constructor.
     * @param $nom
     * @param $espece
     * @param $age
     */
    public function __construct($nom, $espece, $age)
    {
        $this->nom = $nom;
        $this->espece = $espece;
        $this->age = intval($age);
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getEspece()
    {
        return $this->espece;
    }

    /**
     * @param mixed $espece
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


}