<?php

class UserModel extends Model{
    /**
     * Extraction d'une information de la table
     *
     * @return void
     */
    public function getUsers(){
        
        $requete = $this->connexion->prepare("SELECT* FROM user");
        $result = $requete->execute();
        $listUsers = $requete->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($user);
        return $listUsers;
    }
    /**
     * Fonction d'ajout via formulaire de donnees dans la table
     *
     * @return void
     */
    public function addDB(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];

        $requete = $this->connexion->prepare("INSERT INTO user
        VALUES (NULL, :username, :password, :lastname, :firstname)");
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $requete->bindParam(':lastname', $lastname);
        $requete->bindParam(':firstname', $firstname);
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

        $requete = $this->connexion->prepare("DELETE FROM user
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
    public function getUser(){
        $id = $_GET['id'];
        $requete = $this->connexion->prepare("SELECT* FROM user
        WHERE id=:id");
        $requete->bindParam(':id', $id);
        $result = $requete->execute();
        $user = $requete->fetch(PDO::FETCH_ASSOC);
        //var_dump($new);
        return $user;
    }
    /**
     * Mise a jour de l'info dans la table
     *
     * @return void
     */
    public function updateDB(){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];

        $requete = $this->connexion->prepare("UPDATE user
        SET username = :username, password = :password, lastname = :lastname, firstname = :firstname
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $requete->bindParam(':lastname', $lastname);
        $requete->bindParam(':firstname', $firstname);
        $result = $requete->execute();
        //var_dump($requete->errorInfo());
        //var_dump($result);
        //var_dump($requete);        
    }
}