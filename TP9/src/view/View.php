<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 21/02/2018
 * Time: 12:56
 */

class View
{
    private $title;
    private $content;
    private $routeur;

    /**
     * View constructor.
     * @param $routeur
     */
    public function __construct($routeur)
    {
        $this->routeur = $routeur;
    }


    public function render()
    {
        include_once 'squelette.php';
    }

    public function makeTestPage()
    {
        $this->title = "Titre";
        $this->content = "Content";
    }

    public function makeAnimalPage(Animal $animal)
    {
        $this->title = "Page sur ".$animal->getNom();
        $this->content = $animal->getNom()." est un animal de l'espèce ".$animal->getEspece();
        $this->content .= "\n Il est agé de ".$animal->getAge()." ans";
    }

    public function makeUnknownAnimalPage()
    {
        $this->title = "Erreur";
        $this->content = "Animal inconnu";
    }

    public function makeHomePage()
    {
        $this->title = "Accueil";
        $this->content = "Page Accueil<br>";
        $this->content .= "<a href='".$this->routeur->getAnimalCreationURL()."'>Ajouter un animal</a>";
    }

    public function makeListPage(array $array)
    {
        $this->title = "liste";
        foreach ($array as $subarray){
            $this->content .= "<a href='".$this->routeur->getAnimalURL($subarray->getNom())."'>".$subarray->getNom()."</a><br>";
        }
    }

    public function makeDebugPage($variable) {
        $this->title = 'Debug';
        $this->content = '<pre>'.var_export($variable, true).'</pre>';
    }

    public function makeUnknownActionPage()
    {
        $this->title = "Erreur";
        $this->content = "Action inconnue";
    }

    public function makeAnimalCreationPage()
    {
        $this->title = "Nouvel animal";
        $this->content = "<form action='".$this->routeur->getAnimalSaveURL('action/sauvernouveau')."' method='post'>";
        $this->content .= "<input type='text' name='nom' placeholder='Nom'>";
        $this->content .= "<input type='text' name='espece' placeholder='Espèce'>";
        $this->content .= "<input type='text' name='age' placeholder='Age'>";
        $this->content .= "<input type='submit' name='subNewAnimal'>";
        $this->content .= "</form>";
    }

    public function makeSauverNouveauAnimal()
    {
        $this->title = "Nouvel animal";
        $this->makeDebugPage($_POST);
    }
}