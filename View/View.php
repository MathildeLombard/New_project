<?php

abstract class View{ //verrouillage (abstract) de l'instanciation de cette classe
    protected $page;
    /**
     * Constructeur, ajout de l'entete de la page et mise en place des options de session
     */
    public function __construct() {
        $this->page = file_get_contents('template/head.html');
        $this->page .= file_get_contents('template/nav.html');
        //var_dump($_SESSION);  
        if (isset($_SESSION['user'])){
            $optionConnect = "<a class='nav-link activ text-light' href='index.php?controller=security&action=logout'>Logout</a>";
            $optionAuth = "<a class='nav-link active text-light' href='index.php?controller=category'>Category</a></li>
            <li class='nav-item'>
            <a class='nav-link active text-light' href='index.php?controller=user'>User</a>";
        } else {
            $optionConnect = "<a class='nav-link activ text-light' href='index.php?controller=security&action=formLogin'>Login</a>";
            $optionAuth = "";
        }
        $this->page = str_replace('{optionConnect}', $optionConnect, $this->page); 
        $this->page = str_replace('{optionAuth}', $optionAuth, $this->page);  
    }
   
    /**
     * Fonction affichage attribut page avec footer. Fonction prive qui reste en interne depuis la classe
     *
     * @return void
     */
    protected function displayPage(){
        $this->page .= file_get_contents('template/footer.html');
        echo $this->page;
    }   
}