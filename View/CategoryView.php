<?php

class CategoryView extends View{
    /**
     * Fonction affichage de la page d'accueil et affichage la LISTE des infos('categorie')
     *
     * @param [type] $listNews
     * @return void
     */
    public function displayHome($listNews){
        $this->page .= "<h1 class='text-center text-primary my-3'><i class='far fa-newspaper mr-2 text-success'></i>Bienvenue</h1> ";
        $this->page .= "<p><a href='index.php?controller=category&action=addForm'><button class='btn btn-primary float-right mb-3'>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-bordered'>";
        $this->page .= "<tr>" . "<th>" . "Nom" . "</th>" . "<th>" . "Description" .  "</th>"  .  "<th>" . "Modifier" . "</th>" .
        "<th>" . "Supprimer" . "</th>" . "</tr>";
        foreach($listNews as $new) {
            $this->page .= "<tr>"
            ."<td>".$new['name']."</td>"
            ."<td>".$new['description']."</td>"
            ."<td><a href='index.php?controller=category&action=updateForm&id="
            .$new['id']
            . "' class='btn btn-primary' title='update'><i class='fas fa-pen-square'></i></a></td>"
            ."<td><a href='index.php?controller=category&action=suppDB&id="
            .$new['id']
            . "' class='btn btn-danger' title='supprimer'><i class='fas fa-trash'></i></a></td>"
            ."</tr>";
        }
        $this->page .= "</table>";
        $this->displayPage(); //Il faut systematiquement appeler cette methode a la fin de chaque methode pour afficher la page demandee
    }
    /**
     * Fonction affichage du formulaire de saisie d'une nouvelle info
     *
     * @return void
     */
    public function addForm() {
        $this->page .= "<h2 class='text-center text-primary my-4'>Ajout d'une categorie</h2>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{id}',"",$this->page);
        $this->page = str_replace('{name}',"",$this->page);
        $this->page = str_replace('{description}',"",$this->page);
        $this->displayPage();
    }
    /**
     * Fonction affichant le formulaire contenant l'info a modifier
     *
     * @param array $category
     * @return void
     */
    public function updateForm($new) {
        //var_dump($category);
        $this->page .= "<h2 class='text-center text-primary my-4'>Modification d'une information</h2>";
        $this->page .= file_get_contents('template/formCategory.html');
        $this->page = str_replace('{action}','updateDB',$this->page);
        $this->page = str_replace('{id}',$new['id'],$this->page);
        $this->page = str_replace('{name}',$new['name'],$this->page);
        $this->page = str_replace('{description}',$new['description'],$this->page);
        $this->displayPage();
    }

}