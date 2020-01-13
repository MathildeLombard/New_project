<?php

abstract class Controller{
    protected $view;
    protected $model;
    
    /**
     * Fonction affichage formulaire d'ajout
     *
     * @return void
     */
    public function addForm() {
        
        $this->view->addForm();
    }
}