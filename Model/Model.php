<?php

abstract class Model{
    // déclaration en local
    //const SERVER = "localhost";
    //const USER = "root";
    //const PASSWORD = "";
    //const BASE = "news";
    // déclaration serveur distant
    const SERVER = "sqlprive-pc2372-001.privatesql.ha.ovh.net";
    const USER = "cefiidev932";
    const PASSWORD = "828BasFt";
    const BASE = "cefiidev932";
    /**
     * Constructeur, mise en place de la connexion vers la BDD a partir des instances
     */
    public function __construct() {

    //connexion
    try
    {
     $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
     $this->connexion->exec("SET NAMES 'UTF-8'");
    }
     catch (Exception $e)
    {
     echo 'Erreur : ' . $e->getMessage();
    }
    //var_dump($this->connexion);
    }
    /**
     * Fonction pour renvoyer la valeur d'un des attributs de l'objet
     *
     * @return array
     */
    public function getCategories() {
        $requete = "SELECT* FROM category";
        $result = $this->connexion->query($requete);
        $listCategories = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($listCategories);
        return $listCategories;
    }
}    