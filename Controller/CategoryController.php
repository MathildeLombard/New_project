<?php
include 'View/CategoryView.php';
include 'Model/CategoryModel.php';

class CategoryController extends Controller{
    /**
     * Constructeur
     */
    public function __construct(){
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }
    /**
     * Fonction de demarrage pour instancier le modele et la vue, construction de la page d'accueil
     *
     * @return void
     */
    public function start() {
        
        $listCategories = $this->model->getCategories();
        //var_dump($listNews);
        
        $this->view->displayHome($listCategories);     
    }
    /**
     * Fonction d'ajout d'une info en BDD
     *
     * @return void
     */
    public function addDB() {
        $this->model->addDB();
        //$this->start();
        header('location:index.php?controller=category');
    }
    /**
     * Fonction de suppression d'une info en BDD
     *
     * @return void
     */
    public function suppDB() {
        $this->model->suppDB();
        header('location:index.php?controller=category');
    }
    /**
     * Affichage du formulaire contenant le detail de l'info selectionnee dans la liste
     *
     * @return void
     */
    public function updateForm(){
        $new = $this->model->getNew();
        $this->view->updateForm($new);
    }
    /**
     * Mise a jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB(){
        $this->model->updateDB();
        header('location:index.php?controller=category');
    }
}