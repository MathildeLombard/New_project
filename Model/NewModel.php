<?php
class NewModel extends Model{
    /**
     * Fonction pour renvoyer la valeur d'un des attributs de l'objet
     *
     * @return array
     */
    public function getNews() {
        $requete = "SELECT news.*, category.id as id_category, category.name as name_category, category.description as description_category
        FROM news
        LEFT JOIN category
        ON news.category = category.id";
        $result = $this->connexion->query($requete);
        $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($listNews);
        return $listNews;
    }
    /**
     * Fonction d'ajout via formulaire de donnees dans la table
     *
     * @return void
     */
    public function addDB(){
        $title = $_POST['titre'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if (empty($category)) {
            $category=NULL;
        }

        $requete = $this->connexion->prepare("INSERT INTO news
        VALUES (NULL, :titre, :description, :category)");
        $requete->bindParam(':titre', $title);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':category', $category);
        $result = $requete->execute();
        //var_dump($requete);
        //var_dump($result);
               
    }
    /**
     * Fonction de suppression de donnees dans la table
     *
     * @return void
     */
    public function suppDB(){
        $id = $_GET['id'];

        $requete = $this->connexion->prepare("DELETE FROM news
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
        $requete = $this->connexion->prepare("SELECT* FROM news
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
        $title = $_POST['titre'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if (empty($category)){
            $category=NULL;
        }

        $requete = $this->connexion->prepare("UPDATE news
        SET titre = :titre, description = :description, category = :category
        WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->bindParam(':titre', $title);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':category', $category);
        $result = $requete->execute();
        //var_dump($result);        
    }
}