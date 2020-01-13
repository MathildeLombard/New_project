<?php
include 'View/SecurityView.php';
include 'Model/SecurityModel.php';

class SecurityController extends Controller{
    /**
     * Constructeur
     */
    public function __construct(){
        $this->view = new SecurityView();
        $this->model = new SecurityModel();
    }
    /**
     * Fonction d'affichage du formulaire de login
     *
     * @return void
     */
    public function formLogin(){
        $this->view->addForm();
    }
    /**
     * Fonction d'authentification
     *
     * @return void
     */
    public function login(){
        $user = $this->model->testLogin();
        if ($user != false){
            header ('location:index.php?controller=new');
        } else {
            header ('location:index.php?controller=security&action=formLogin');
        }
    }
    /**
     * Fonction de deconnection
     *
     * @return void
     */
    public function logout(){
        $this->model->logout();
        header('location:index.php?controller=new');
    }

}