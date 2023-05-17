<?php

class PagesController extends Controller
{

  public function __construct()
  {
    $this->categorieModel = $this->model('Categorie');
    $this->technicienModel = $this->model('technicien');
    $this->adminModel = $this->model('admin');
  }

  public function index()
  {
    $categories = $this->categorieModel->getCategories();
    $AllCity = $this->technicienModel->getAllCity();
    $AllTech = $this->technicienModel->getAllTech();
    $topFedBack = $this->technicienModel->getTechTopFeedback();


    $data = [
      ["title" => "home"],
      $categories, $AllCity, $AllTech, $topFedBack
    ];

    $this->view('pages/index', $data);
  }

  public function register()
  {
    $categories = $this->categorieModel->getCategories();
    $AllCity = $this->technicienModel->getAllCity();


    $data = [
      ["title" => "register"],
      $categories,$AllCity
    ];
    $this->view('pages/register', $data);
  }

  public function login()
  {
    $data = [
      ["title" => "login"]
    ];
    $this->view('pages/login', $data);
  }

  public function dashboardAdmin()
  {

    if ($_SESSION['role'] == "admin") {
      $countCategories = $this->categorieModel->countCategories();
      $countTech = $this->technicienModel->countTech();
      $countAdmin = $this->adminModel->countAdmin();
      $lastTech = $this->technicienModel->GetLastTech();
      $subs = $this->technicienModel->Getsubs();
      $categories = $this->categorieModel->getCategories();
      $nTech = $this->technicienModel->getNumTechCat($countCategories);


      $data = [
        ["title" => "dashboardAdmin"],
        $countTech, $countAdmin, $countCategories, $lastTech, $categories, $nTech,$subs
      ];

      $this->view('pages/dashboardAdmin', $data);
    } else {
      redirect('pages/loginAdmin');
    }
  }

  public function users()
  {
    if (!$_SESSION['username']) {
      redirect('pages/loginAdmin');
    } else {
      $AllTech = $this->technicienModel->getAllTech();
      $data = [
        ["title" => "dashboardAdmin"],
        $AllTech
      ];
      $this->view('pages/users', $data);
    }
  }

  public function admins()
  {
    if (!$_SESSION['role'] == "admin") {
      redirect('pages/loginAdmin');
    } else {
      $dataAdmins = $this->adminModel->getAllAdmin();
      $data = [
        ["title" => "dashboardAdmin"],
        $dataAdmins
      ];
      $this->view('pages/admins', $data);
    }
  }
  public function jobs()
  {
    if (!$_SESSION['role'] == "admin") {
      redirect('pages/loginAdmin');
    } else {
      $cats = $this->categorieModel->getCategories();
      $data = [
        ["title" => "Add Jobs"],
        $cats
      ];
      $this->view('pages/jobs', $data);
    }
  }

  // dashboard admin page
  public function IsSubscribed($id)
  {
    $date_expiration = $this->technicienModel->IsSubscribed($id)[0]->date_expiration;
    $date_expiration = new DateTime($date_expiration);


    $current_date = new DateTime();


    if ($date_expiration >= $current_date) {
      return true;
      // die("Subscription is active.");
    } else {
      return false;

      // die("Subscription has expired.");
    }
  }
  public function dashboardUser()
  {
    if ($_SESSION['role'] == "user") {
      $dataTech = $this->technicienModel->getTech($_SESSION['id']);
      $ville = $this->technicienModel->getVille($_SESSION['id']);
      $metier = $this->technicienModel->getMetier($_SESSION['id']);
      $sub = $this->IsSubscribed($_SESSION['id']);
      $categories = $this->categorieModel->getCategories();

      $AllCity = $this->technicienModel->getAllCity();

      $data = [
        ["title" => "dashboardUser"],
        $dataTech, $categories, $AllCity, $ville, $metier, $sub
      ];
      $this->view('pages/dashboardUser', $data);
    } else {
      redirect('pages/login');
    }
  }

  public function loginAdmin()
  {
    $data = [
      ["title" => "loginAdmin"]
    ];
    $this->view('pages/loginAdmin', $data);
  }
  public function techSearch()
  {
    $categories = $this->categorieModel->getCategories();
    $AllCity = $this->technicienModel->getAllCity();
    $data = [
      ["title" => "Search"],
      $categories, $AllCity
    ];
    $this->view('pages/techSearch', $data);
  }
  public function profile()
  {

    if (!$_SESSION['role'] == "user") {
      redirect('pages/login');
    } else {
      $dataTech = $this->technicienModel->getTech($_SESSION['id']);
      $dataWorks = $this->technicienModel->getWorks($_SESSION['id']);
      $data = [
        ["title" => "Works"],
        $dataTech, $dataWorks
      ];
      $this->view('pages/works', $data);
    }
  }
  public function pageProfile($id)
  {
    $tech = $this->technicienModel->getTech($id);
    $dataWorks = $this->technicienModel->getWorks($id);
    $reviews = $this->technicienModel->getReviewsforuser($id);


    $data = [
      ["title" => "ProfilePage"],
      $tech,
      $dataWorks,
      $reviews

    ];

    $this->view('pages/pageProfile', $data);
  }
  public function payement()
  {
    if (!$_SESSION['role'] == "user") {
      redirect('pages/login');
    } else {
      $data = [
        ["title" => "payement"]
      ];
      $this->view('pages/checkout', $data);
    }
  }
  public function villes()
  {
    $AllCity = $this->adminModel->villes();
    $data = [
      ["title" => "Villes"],
      $AllCity
    ];
    $this->view('pages/villes', $data);
  }
  public function secteurs()
  {
    $secteurs = $this->adminModel->secteurs();
    $AllCity = $this->adminModel->villes();
    $data = [
      ["title" => "Secteurs"],
      $secteurs,
      $AllCity
    ];
    $this->view('pages/secteurs', $data);
  }
}
