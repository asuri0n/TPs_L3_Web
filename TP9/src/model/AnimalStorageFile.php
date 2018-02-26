<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 23/02/2018
 * Time: 11:41
 */

require_once("FileStore.php");

class AnimalStorageFile implements AnimalStorage
{
    private $db;
    private $nextId;
    private $filestore;

    /* Construit une nouvelle instance, qui s'enregistrera
    * dans le fichier donné en paramètre. */
    public function __construct($file) {
        $this->filestore = new FileStore($file);
        if (file_exists($file)) {
            /* le fichier existe : on récupère notre tableau
             * et notre nextId, qui y ont été stockés */
            $storedData = $this->filestore->loadData();
            $this->db = $storedData['db'];
            $this->nextId = $storedData['nextId'];
        } else {
            /* le fichier n'existe pas, on crée une «base» vide */
            $this->db = array();
            $this->nextId = 1;
        }
    }

    /* Enregistre la base dans le fichier avant de détruire l'instance. */
    public function __destruct() {
        $dataToBeStored = array('db' => $this->db, 'nextId' => $this->nextId);
        $this->filestore->saveData($dataToBeStored);
    }

    public function reinit(){
        $this->db = array(
            'medor' => new Animal('Medor','chien',15),
            'felix' => new Animal('Félix','chat',15),
            'denver' => new Animal('Denver','dinosaure',15)
        );
        $this->nextId = 4;
    }

    function read($id)
    {
        if(array_key_exists($id,$this->db))
            return $this->db[$id];
        else
            return null;
    }

    function readAll(): array
    {
        return $this->db;
    }

    function create(Animal $a)
    {
        array_push($this->db,$a);
        $this->nextId++;
        $dataToBeStored = array('db' => $this->db, 'nextId' => $this->nextId);
        $this->filestore->saveData($dataToBeStored);
        var_dump($this->db);
    }
}