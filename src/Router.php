<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 21/02/2018
 * Time: 12:54
 */

require_once("view/View.php");
require_once("control/Controller.php");

class Router
{
    private $animalStorage;
    private $view;
    private $ctrl;

    function __construct(AnimalStorage $animalStorage)
    {
        $this->animalStorage = $animalStorage;
    }

    public function main()
    {
        session_start();

        $feedback = key_exists('feedback', $_SESSION) ? $_SESSION['feedback'] : '';
        $_SESSION['feedback'] = '';

        $this->view = new View($this, $feedback);
        $this->ctrl = new Controller($this->view, $this->animalStorage);

        if(isset($_SERVER['PATH_INFO'])) {
            $page = explode('/', $_SERVER['PATH_INFO']);
            if (isset($page[1]) and !empty($page[1]))
            {
                switch ($page[1])
                {
                    case ($this->animalStorage->read($page[1]) != null):
                        $this->ctrl->showInformation($page[1]);
                        break;
                    case "liste":
                        $this->ctrl->showList();
                        break;
                    case "action":
                        if (isset($page[2]) and !empty($page[2]))
                        {
                            switch ($page[2]) {
                                case "sauvernouveau":
                                    $this->ctrl->saveNewAnimal($_POST);
                                    break;
                                case "nouveau":
                                    $ab = $this->ctrl->newAnimal();
                                    $this->view->makeAnimalCreationPage($ab);
                                    break;
                                default :
                                    $this->view->makeUnknownActionPage();
                            }
                        } else
                            $this->view->makeUnknownActionPage();
                        break;
                    case "login":
                        $this->view->makeLoginFormPage();
                        break;
                    default :
                        $this->view->makeHomePage();
                }
            } else
                $this->view->makeHomePage();
        }
        $this->view->render();
    }
    function getAnimalURL($id){
        return "/TPs_L3_Web/animaux.php/".strtolower($id);
    }
    function getAnimalCreationURL(){
        return "/TPs_L3_Web/animaux.php/action/nouveau";
    }
    function getAnimalSaveURL(){
        return "/TPs_L3_Web/animaux.php/action/sauvernouveau";
    }
    function POSTredirect($url, $feedback){
        $_SESSION['feedback'] = $feedback;
        session_write_close();
        header("HTTP/1.1 303 See Other");
        header("Location: ".$url);
    }
}