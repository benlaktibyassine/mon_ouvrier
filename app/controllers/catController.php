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

    }
?>