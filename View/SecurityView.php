<?php

class SecurityView extends View{
    /**
     * Fonction affichage du formulaire d'authentification'
     *
     * @return void
     */
    public function addForm() {
        $this->page .= "<h2 class='text-center text-primary my-4'>S'authentifier</h2>";
        $this->page .= file_get_contents('template/formLogin.html');
        $this->page = str_replace('{action}','addDB',$this->page);
        $this->page = str_replace('{username}',"",$this->page);
        $this->page = str_replace('{password}',"",$this->page);
        $this->displayPage();
    }
    
}