<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 21/02/2018
 * Time: 13:29
 */

require_once("model/Animal.php");
require_once("model/AnimalBuilder.php");

class Controller
{
    private $view;
    private $animalsTab;
    private $animalStorage;

    public function __construct(View $v, AnimalStorage $animalStorage) {
        $this->animalStorage = $animalStorage;
        $this->view = $v;
        $this->animalsTab = array(
            0 => new Animal('Medor','chien',15),
            1 => new Animal('Félix','chat',15),
            2 => new Animal('Denver','dinosaure',15)
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

    public function newAnimal(){
        $currentNewAnimal = key_exists('currentNewAnimal', $_SESSION) ? $_SESSION['currentNewAnimal'] : null;
        if(!$currentNewAnimal)
            return new AnimalBuilder(null);
        else
            return $currentNewAnimal;
    }

    function saveNewAnimal(array $data)
    {

        $animalBuilder = new AnimalBuilder($data);
        if(!$animalBuilder->isValid()) {
            $_SESSION['currentNewAnimal'] = $animalBuilder;
            $this->view->displayAnimalCreationFailure();
        } else {
            unset($_SESSION['currentNewAnimal']);
            $id = $this->animalStorage->create($animalBuilder->createAnimal());
            $this->view->displayAnimalCreationSuccess($id);
        }
    }

}