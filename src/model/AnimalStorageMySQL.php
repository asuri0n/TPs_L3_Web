<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 14/03/2018
 * Time: 16:43
 */

require_once("AnimalStorage.php");

class AnimalStorageMySQL implements AnimalStorage
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function create(Animal $a)
    {
        $stmt = $this->pdo->prepare("INSERT INTO animals (name, species, age) VALUES (?,?,?)");
        $stmt->execute(array($a->getNom(),$a->getEspece(),$a->getAge()));
        return $this->pdo->lastInsertId();
    }

    function read($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM animals WHERE id = ? or lower(name) = ?");
        $stmt->execute(array($id,$id));
        $annimalarray = $stmt->fetch();
        if($annimalarray)
            return new Animal($annimalarray['name'],$annimalarray['species'],$annimalarray['age']);
        return null;
    }

    function readAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM animals");
        $stmt->execute();
        $annimalsarray = $stmt->fetchAll();
        foreach ($annimalsarray as $key => $annimal){
            $annimalsarray[$key] = new Animal($annimal['name'],$annimal['species'],$annimal['age']);
        }
        return $annimalsarray;
    }
}