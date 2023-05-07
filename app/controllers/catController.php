<?php
    class catController extends Controller{
        

        public function __construct()
        {
            $this->categorieModel = $this->model('Categorie');
           
        }

        function getCategories(){
            $categories = $this->categorieModel->getCategories();
            return $categories;
        }
        public function chercherSec()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ville'])) {
                
                $secteurs=$this->categorieModel->getSecteurs($_POST['ville']);
                header('Content-type: application/json');
                echo json_encode($secteurs);
              } else {
                die('Invalid request');
              }
           
           return $secteurs;
        }
    }
