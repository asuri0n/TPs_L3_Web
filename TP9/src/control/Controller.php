<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 21/02/2018
 * Time: 13:29
 */

require_once("model/Animal.php");

class Controller
{
    private $view;
    private $animalsTab;
    private $animalStorage;

    public function __construct(View $v, AnimalStorage $animalStorage) {
        $this->animalStorage = $animalStorage;
        $this->view = $v;
        $this->animalsTab = array(
            'medor' => new Animal('Medor','chien',15),
            'felix' => new Animal('Félix','chat',15),
            'denver' => new Animal('Denver','dinosaure',15)
        );
    }

    public function showInformation($id)
    {
        $animal = $this->animalStorage->read($id);
        if($animal != null){
            $this->view->makeAnimalPage($animal);
        } else {
            $this->view->makeUnknownAnimalPage();
        }
    }

    public function showList()
    {
        $animalList = $this->animalStorage->readAll();
        $this->view->makeListPage($animalList);
    }
}