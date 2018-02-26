<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 23/02/2018
 * Time: 11:10
 */

require_once("AnimalStorage.php");

class AnimalStorageStub implements AnimalStorage
{

    private $animalsTab;

    public function __construct() {
        $this->animalsTab = array(
            'medor' => new Animal('Medor','chien',15),
            'felix' => new Animal('Félix','chat',15),
            'denver' => new Animal('Denver','dinosaure',15)
        );
    }

    function read($id)
    {
        if(is_numeric($id) and $id < sizeof($this->animalsTab)){
            return $this->animalsTab[array_keys($this->animalsTab)[$id]];
        } else if (!is_numeric($id) and key_exists($id,$this->animalsTab)){
            return $this->animalsTab[$id];
        } else {
            return null;
        }
    }

    function readAll(): array
    {
        return $this->animalsTab;
    }

    function create(Animal $a)
    {
        // TODO: Implement create() method.
    }
}