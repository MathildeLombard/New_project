<?php

class NewView extends View {
    /**
     * Fonction affichage de la page d'accueil et affichage la LISTE des infos('news')
     *
     * @param [type] $listNews
     * @return void
     */
    public function displayHome($listNews){
        $this->page .= "<h1 class='text-center text-primary my-3'><i class='far fa-newspaper mr-2 text-success'></i>Bienvenue</h1> ";
        if (isset($_SESSION['user'])) {
        $this->page .= "<p><a href='index.php?controller=new&action=addForm'><button class='btn btn-primary float-right mb-3'>Ajouter</button></a></p>";
        }
        $this->page .= "<table class='table table-striped table-bordered'>";
        $this->page .= "<tr>" . "<th>" . "Titre" . "</th>" . "<th>" . "Description" . "</th>" . "<th>" . "Nom Categorie" . "</th>" .  "<th>" . "Modifier" . "</th>" .
        "<th>" . "Supprimer" . "</th>" . "</tr>";
        foreach($listNews as $new) {
            $this->page .= "<tr>"
            ."<td>".$new['titre']."</td>"
            ."<td>".$new['description']."</td>"
            ."<td>".$new['name_category']."</td>";
            if (isset($_SESSION['user'])) {
            $this->page .= "<td><a href='index.php?controller=new&action=updateForm&id="
            .$new['id']
            . "' class='btn btn-primary' title='update'><i class='fas fa-pen-square'></i></a></td>"
            ."<td><a href='index.php?controller=new&action=suppDB&id="
            .$new['id']
            . "' class='btn btn-danger' title='supprimer'><i class='fas fa-trash'></i></a></td>"
            ."</tr>";
            }
        }
        $this->page .= "</table>";
        $this->displayPage(); //Il faut systematiquement appeler cette methode a la fin de chaque methode pour afficher la page demandee
    }
    /**
     * Fonction affichage du formulaire de saisie d'une nouvelle info
     *
     * @return void
     */
    public function addForm($listCategories) {
        $this->page .= "<h2 class='text-center text-primary my-4'>Ajout d'une information</h2>";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{id}',"",$this->page);
        $this->page = str_replace('{titre}',"",$this->page);
        $this->page = str_replace('{description}',"",$this->page);
        $categories = "";
        foreach($listCategories as $category) {
            $categories .= "<option value='" . $category['id'] . "'>" . $category ['name'] . "</option>";
        }
        $this->page = str_replace('{category}', $categories, $this->page);
        $this->displayPage();
    }

    /**
     * Fonction affichant le formulaire contenant l'info a modifier
     *
     * @param array $new
     * @return void
     */
    public function updateForm($new, $listCategories) {
        //var_dump($new);
        $this->page .= "<h2 class='text-center text-primary my-4'>Modification d'une information</h2>";
        $this->page .= file_get_contents('template/formNew.html');
        $this->page = str_replace('{action}','updateDB',$this->page);
        $this->page = str_replace('{id}',$new['id'],$this->page);
        $this->page = str_replace('{titre}',$new['titre'],$this->page);
        $this->page = str_replace('{description}',$new['description'],$this->page);
        $categories = "";
        foreach($listCategories as $category) {
            $selected = "";
            if($new['category'] == $category ['id']){
                $selected = "selected";
            }
            $categories .= "<option $selected value='" . $category['id'] . "'>" . $category ['name'] . "</option>";
        }
        $this->page = str_replace('{category}', $categories, $this->page);
        $this->displayPage();
    }
}