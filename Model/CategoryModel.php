<?php

class CategoryModel extends Model{   
    /**
     * Fonction d'ajout via formulaire de donnees dans la table
     *
     * @return void
     */
    public function addDB(){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $requete = $this->connexion->prepare("INSERT INTO category
        VALUES (NULL, :name, :description)");
        $requete->bindParam(':name', $name);
        $requete->bindParam(':description', $description);
        $result = $requete->execute();
        //var_dump($result);
    }
    /**
     * Fonction de suppression de donnees dans la table
     *
     * @return void
     */
    public function suppDB(){
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM category
        WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        //var_dump($requete->errorInfo());
        //var_dump($result);
    }
    /**
     * Extraction d'une information de la table
     *
     * @return void
     */
    public function getNew(){
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT* FROM category
        WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $new = $requete->fetch(PDO::FETCH_ASSOC);
        //var_dump($new);
        return $new;
    }
    /**
     * Mise a jour de l'info dans la table
     *
     * @return void
     */
    public function updateDB(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $requete = $this->connexion->prepare("UPDATE category
        SET name = :name, description = :description
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':name', $name);
        $requete->bindParam(':description', $description);
        $result = $requete->execute();
        //var_dump($result);        
    }
}