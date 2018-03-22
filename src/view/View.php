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
    private $menu;
    private $feedback;

    /**
     * View constructor.
     * @param $routeur
     */
    public function __construct($routeur, $feedback)
    {
        $this->routeur = $routeur;
        $this->feedback = $feedback;
        $this->menu = array(
            "http://localhost/TPs_L3_Web/animaux.php" => "Accueil",
            "http://localhost/TPs_L3_Web/animaux.php/action/nouveau" => "Ajouter",
            "http://localhost/TPs_L3_Web/animaux.php/liste" => "Liste",
            "http://localhost/TPs_L3_Web/animaux.php/action/login" => "Login"
        );
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
        $this->content = "";
        $this->content .= $animal->getNom()." est un animal de l'espèce ".$animal->getEspece();
        $this->content .= "<br> Il est agé de ".$animal->getAge()." ans";
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
    }

    public function makeListPage(array $array)
    {
        $this->title = "liste";
        foreach ($array as $key => $subarray){
            $this->content .= "<a href='".$this->routeur->getAnimalURL($key)."'>".$subarray->getNom()."</a><br>";
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

    public function makeAnimalCreationPage(AnimalBuilder $ab)
    {
        $this->title = "Nouvel animal";
        $this->content = "<form action='".$this->routeur->getAnimalSaveURL('action/sauvernouveau')."' method='post'>";

        if($ab->getData() != null){
            if($ab->getError() != null) {
                $this->content .= "<span style='color:red'>".$ab->getError()."</span><br>";
                $nom = $ab->getData()[$ab::NAME_REF];
                $espece = $ab->getData()[$ab::SPECIES_REF];
                $age = $ab->getData()[$ab::AGE_REF];
            }

            $this->content .= "<input type='text' name='".$ab::NAME_REF."' placeholder='Nom' value='$nom'>";
            $this->content .= "<input type='text' name='".$ab::SPECIES_REF."' placeholder='Espèce' value='$espece'>";
            $this->content .= "<input type='text' name='".$ab::AGE_REF."' placeholder='Age' value='$age'>";
        } else {
            $this->content .= "<input type='text' name='".$ab::NAME_REF."' placeholder='Nom'>";
            $this->content .= "<input type='text' name='".$ab::SPECIES_REF."' placeholder='Espèce'>";
            $this->content .= "<input type='text' name='".$ab::AGE_REF."' placeholder='Age' >";
        }
        $this->content .= "<input type='submit' name='subNewAnimal'>";
        $this->content .= "</form>";
    }

    public function makeSauverNouveauAnimal()
    {
        $this->title = "Nouvel animal";
    }

    public function displayAnimalCreationSuccess($id){
        $this->routeur->POSTredirect($this->routeur->getAnimalURL($id), "Annimal ajouté");
    }

    public function displayAnimalCreationFailure(){
        $this->routeur->POSTredirect($this->routeur->getAnimalCreationURL(), "Veuillez vérifier les données saisies ");
    }

    public function makeLoginFormPage(){
        $this->title = "Connexion";
        $this->content = "<form action='".$this->routeur->getAnimalSaveURL('action/sauvernouveau')."' method='post'>";

        if($ab->getData() != null){
            if($ab->getError() != null) {
                $this->content .= "<span style='color:red'>".$ab->getError()."</span><br>";
                $nom = $ab->getData()[$ab::NAME_REF];
                $espece = $ab->getData()[$ab::SPECIES_REF];
                $age = $ab->getData()[$ab::AGE_REF];
            }

            $this->content .= "<input type='text' name='".$ab::NAME_REF."' placeholder='Nom' value='$nom'>";
            $this->content .= "<input type='text' name='".$ab::SPECIES_REF."' placeholder='Espèce' value='$espece'>";
            $this->content .= "<input type='text' name='".$ab::AGE_REF."' placeholder='Age' value='$age'>";
        } else {
            $this->content .= "<input type='text' name='".$ab::NAME_REF."' placeholder='Nom'>";
            $this->content .= "<input type='text' name='".$ab::SPECIES_REF."' placeholder='Espèce'>";
            $this->content .= "<input type='text' name='".$ab::AGE_REF."' placeholder='Age' >";
        }
        $this->content .= "<input type='submit' name='subNewAnimal'>";
        $this->content .= "</form>";
    }
}