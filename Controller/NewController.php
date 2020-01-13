<?php
include 'View/NewView.php';
include 'Model/NewModel.php';

class NewController extends Controller{
    /**
     * Constructeur
     */
    public function __construct(){
        $this->view = new NewView();
        $this->model = new NewModel();
    }
    /**
     * Fonction de demarrage pour instancier le modele et la vue, construction de la page d'accueil
     *
     * @return void
     */
    public function start() {
        $model = new NewModel();
        $listNews = $this->model->getNews();
        //var_dump($listNews);
        
        $this->view->displayHome($listNews);     
    }
    /**
     * Fonction affichage formulaire d'ajout
     *
     * @return void
     */
    public function addForm() {
        $listCategories = $this->model->getCategories();
        
        $this->view->addForm($listCategories);
    }
    /**
     * Fonction d'ajout d'une info en BDD
     *
     * @return void
     */
    public function addDB() {
        $this->model->addDB();
        //$this->start();
        header('location:index.php?controller=new');
    }
    /**
     * Fonction de suppression d'une info en BDD
     *
     * @return void
     */
    public function suppDB() {
        $this->model->suppDB();
        header('location:index.php?controller=new');
    }
    /**
     * Affichage du formulaire contenant le detail de l'info selectionnee dans la liste
     *
     * @return void
     */
    public function updateForm(){
        $listCategories = $this->model->getCategories();
        $new = $this->model->getNew();
        $this->view->updateForm($new, $listCategories);
    }
    /**
     * Mise a jour de l'information dans la table
     *
     * @return void
     */
    public function updateDB(){
        $this->model->updateDB();
        header('location:index.php?controller=new');
    }
}