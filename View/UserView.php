<?php

class UserView extends View{
    /**
     * Fonction affichage de la page d'accueil et affichage la LISTE des infos('user')
     *
     * @param [type] $listUsers
     * @return void
     */
    public function displayHome($listUsers){
        $this->page .= "<h1 class='text-center text-primary my-3'><i class='far fa-newspaper mr-2 text-success'></i>Bienvenue</h1> ";
        $this->page .= "<p><a href='index.php?controller=user&action=addForm'><button class='btn btn-primary float-right mb-3'>Ajouter</button></a></p>";
        $this->page .= "<table class='table table-striped table-bordered'>";
        $this->page .= "<tr>" . "<th>" . "Username" . "</th>" . "<th>" . "Password" .  "</th>"  .  "<th>" . "Prenom" . "</th>" .
        "<th>" . "Nom" . "</th>" . "<th>" . "Modifier" . "</th>" . "<th>" . "Supprimer" . "</th>" . "</tr>";
        foreach($listUsers as $user) {
            $this->page .= "<tr>"
            ."<td>".$user['username']."</td>"
            ."<td>".$user['password']."</td>"
            ."<td>".$user['firstname']."</td>"
            ."<td>".$user['lastname']."</td>"
            ."<td><a href='index.php?controller=user&action=updateForm&id="
            .$user['id']
            . "' class='btn btn-primary' title='update'><i class='fas fa-pen-square'></i></a></td>"
            ."<td><a href='index.php?controller=user&action=suppDB&id="
            .$user['id']
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
        $this->page .= "<h2 class='text-center text-primary my-4'>Ajout d'un utilisateur</h2>";
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{id}',"",$this->page);
        $this->page = str_replace('{username}',"",$this->page);
        $this->page = str_replace('{password}',"",$this->page);
        $this->page = str_replace('{lastname}',"",$this->page);
        $this->page = str_replace('{firstname}',"",$this->page);
        $this->displayPage();
    }
    /**
     * Fonction affichant le formulaire contenant l'info a modifier
     *
     * @param array $user
     * @return void
     */
    public function updateForm($user) {
        //var_dump($user);
        $this->page .= "<h2 class='text-center text-primary my-4'>Modification d'un utilisateur</h2>";
        $this->page .= file_get_contents('template/formUser.html');
        $this->page = str_replace('{action}','updateDB',$this->page);
        $this->page = str_replace('{id}',$user['id'],$this->page);
        $this->page = str_replace('{username}',$user['username'],$this->page);
        $this->page = str_replace('{password}',$user['password'],$this->page);
        $this->page = str_replace('{lastname}',$user['lastname'],$this->page);
        $this->page = str_replace('{firstname}',$user['firstname'],$this->page);
        $this->displayPage();
    }
}