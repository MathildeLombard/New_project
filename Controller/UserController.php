<?php
include 'View/UserView.php';
include 'Model/UserModel.php';

class UserController extends Controller{
    /**
     * Constructeur
     */
    public function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();
    }
    /**
     * Fonction de demarrage pour instancier le modele et la vue, construction de la page d'accueil
     *
     * @return void
     */
    public function start() {
        
        $listUsers = $this->model->getUsers();
        //var_dump($listNews);
        
        $this->view->displayHome($listUsers);     
    }
    /**
     * Fonction d'ajout d'une info en BDD
     *
     * @return void
     */
    public function addDB() {
        $this->model->addDB();
        //$this->start();
        header('location:index.php?controller=user');
    }
    /**
     * Fonction de suppression d'une info en BDD
     *
     * @return void
     */
    public function suppDB() {
        $this->model->suppDB();
        header('location:index.php?controller=user');
    }
    /**
     * Affichage du formulaire contenant le detail de l'info selectionnee dans la liste
     *
     * @return void
     */
    public function updateForm(){
        $user = $this->model->getUser();
        $this->view->updateForm($user);
    }
    /**
     * Mise a jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB(){
        $this->model->updateDB();
        header('location:index.php?controller=user');
    }
}