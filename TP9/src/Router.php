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
    public function main(AnimalStorage $animalStorage)
    {
        $this->animalStorage = $animalStorage;

        $view = new View($this);
        $ctrl = new Controller($view, $animalStorage);
        if(isset($_SERVER['PATH_INFO'])) {
            $id = explode('/',$_SERVER['PATH_INFO']);
            if ($id[1] == "liste")
                $ctrl->showList();
            else if ($this->animalStorage->read($id[1]) != null)
                $ctrl->showInformation($id[1]);
            else
                $view->makeHomePage();
        }
        $view->render();
    }

    function getAnimalURL($id){
        return "/TPs-Web-L3/TP9/animaux.php/".strtolower($id);
    }
}