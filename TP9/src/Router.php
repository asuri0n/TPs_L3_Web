<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 21/02/2018
 * Time: 12:54
 */

require_once("view/View.php");
require_once("control/Controller.php");
require_once("model/AnimalStorageStub.php");

class Router
{
    private $animalStorage;
    private $view;
    private $ctrl;

    function __construct(AnimalStorage $animalStorage)
    {
        $this->animalStorage = $animalStorage;
        $this->view = new View($this);
        $this->ctrl = new Controller($this->view, $this->animalStorage);
    }

    public function main()
    {
        if(isset($_SERVER['PATH_INFO'])) {
            $id = explode('/', $_SERVER['PATH_INFO']);
            if (isset($id[1]))
            {
                switch ($id[1])
                {
                    case ($this->animalStorage->read($id[1]) != null):
                        $this->ctrl->showInformation($id[1]);
                        break;
                    case "liste":
                        $this->ctrl->showList();
                        break;
                    case "action":
                        if (isset($id[2])) {
                            switch ($id[2]) {
                                case "sauvernouveau":
                                    $this->saveNewAnimal($_POST);
                                    break;
                                case "nouveau":
                                    $this->view->makeAnimalCreationPage();
                                    break;
                                default :
                                    $this->view->makeUnknownActionPage();
                            }
                        } else
                            $this->view->makeUnknownActionPage();
                        break;
                        break;
                    default :
                        $this->view->makeHomePage();
                }
            } else
                $this->view->makeHomePage();
        }
        $this->view->render();
    }

    function saveNewAnimal(array $data){
        $a = new Animal($data['nom'], $data['espece'],$data['age']);
        $this->animalStorage->create($a);
        $this->ctrl->showInformation($data['nom']);
    }

    function getAnimalURL($id){
        return "/TPs_L3_Web/TP9/animaux.php/".strtolower($id);
    }
    function getAnimalCreationURL(){
        return "/TPs_L3_Web/TP9/animaux.php/action/nouveau";
    }
    function getAnimalSaveURL(){
        return "/TPs_L3_Web/TP9/animaux.php/action/sauvernouveau";
    }
}