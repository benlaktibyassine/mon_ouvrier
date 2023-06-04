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
    $logo = $this->adminModel->getlogo();


    $data = [
      [
        "title" => "home",
        "logo" => $logo,
      ],
      $categories, $AllCity, $AllTech, $topFedBack
    ];

    $this->view('pages/index', $data);
  }

  public function register()
  {
    $categories = $this->categorieModel->getCategories();
    $AllCity = $this->technicienModel->getAllCity();
    $logo = $this->adminModel->getlogo();


    $data = [
      [
        "title" => "register",
        "logo" => $logo,
      ],
      $categories, $AllCity
    ];
    $this->view('pages/register', $data);
  }

  public function login()
  {
    $logo = $this->adminModel->getlogo();

    $data = [
      [
        "title" => "login", "logo" => $logo
      ]
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
      $logo = $this->adminModel->getlogo();


      $data = [
        [
          "title" => "dashboardAdmin",
          "logo" => $logo,
        ],
        $countTech, $countAdmin, $countCategories, $lastTech, $categories, $nTech, $subs
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
      $logo = $this->adminModel->getlogo();

      $data = [
        [
          "title" => "dashboardAdmin",
          "logo" => $logo,
        ],
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
      $logo = $this->adminModel->getlogo();

      $data = [
        [
          "title" => "dashboardAdmin",
          "logo" => $logo,
        ],
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
      $logo = $this->adminModel->getlogo();

      $cats = $this->categorieModel->getCategories();
      $data = [
        [
          "title" => "Add Jobs",
          "logo" => $logo,
        ],
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
      $logo = $this->adminModel->getlogo();

      $AllCity = $this->technicienModel->getAllCity();

      $data = [
        [
          "title" => "dashboardUser",
          "logo" => $logo,
        ],
        $dataTech, $categories, $AllCity, $ville, $metier, $sub
      ];
      $this->view('pages/dashboardUser', $data);
    } else {
      redirect('pages/login');
    }
  }

  public function loginAdmin()
  {
    $logo = $this->adminModel->getlogo();

    $data = [
      [
        "title" => "loginAdmin",
        "logo" => $logo,
      ]
    ];
    $this->view('pages/loginAdmin', $data);
  }
  public function techSearch()
  {
    $categories = $this->categorieModel->getCategories();
    $AllCity = $this->technicienModel->getAllCity();
    $logo = $this->adminModel->getlogo();

    $data = [
      [
        "title" => "Search",
        "logo" => $logo,

      ],
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
      $logo = $this->adminModel->getlogo();

      $data = [
        [
          "title" => "Works",        "logo" => $logo,
        ],
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

    $logo = $this->adminModel->getlogo();

    $data = [
      [
        "title" => "ProfilePage",        "logo" => $logo,
      ],
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
    if (!$_SESSION['role'] == "admin") {
      redirect('pages/loginAdmin');
    } else {
      $AllCity = $this->adminModel->villes();
      $logo = $this->adminModel->getlogo();

      $data = [
        [
          "title" => "Villes",
          "logo" => $logo,
        ],
        $AllCity
      ];
      $this->view('pages/villes', $data);
    }
  }
  public function secteurs()
  {
    $secteurs = $this->adminModel->secteurs();
    $AllCity = $this->adminModel->villes();
    $logo = $this->adminModel->getlogo();

    $data = [
      [
        "title" => "Secteurs",
        "logo" => $logo,
      ],
      $secteurs,
      $AllCity
    ];
    $this->view('pages/secteurs', $data);
  }
  public function stripe()
  {
    if (!$_SESSION['role'] == "admin") {
      redirect('pages/loginAdmin');
    } else {
      $logo = $this->adminModel->getlogo();

      $infos = $this->technicienModel->getStripe();
      $data = [
        [
          "title" => "Stripe infos",
          "logo" => $logo,

        ],
        $infos,
      ];

      $this->view('pages/stripe', $data);
    }
  }
  public function logo()
  {
    if (!$_SESSION['role'] == "admin") {
      redirect('pages/loginAdmin');
    } else {
      $logo = $this->adminModel->getlogo();

      $data = [
        [
          "title" => "Logo",
          "logo" => $logo,

        ],
        $logo

      ];
      $this->view('pages/logo', $data);
    }
  }
}
