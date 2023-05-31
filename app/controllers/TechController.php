<?php
// require './vendor/autoload.php';

// use PayPal\Rest\ApiContext;
// use PayPal\Auth\OAuthTokenCredential;

// $clientId = 'AULxBiEldH594Du0ilr1nn37UqUS43DN3PVMgrgXvoIVc7Cxn6IMDLDmNz-WyIn-ieQmtDh3YMlqPzT-';
// $clientSecret = 'EBOQNfh7HIMe0_n2yogowmSbjlZfKc7kNmHHNaO30d6d9Krm2G53udBYQQzjW7UVGyKSNaNxwS-tkJWo';

// $apiContext = new ApiContext(new OAuthTokenCredential($clientId, $clientSecret));

// $apiContext->setConfig([
//     'mode' => 'sandbox',
//     'log.LogEnabled' => true,
//     'log.FileName' => 'PayPal.log',
//     'log.LogLevel' => 'DEBUG',
// ]);


class TechController extends Controller
{
    private $img;
    private $nom;
    private $prenom;
    private $phone;
    private $email;
    private $ville;
    private $adresse;
    private $metier;
    private $password;
    private $feedback;

    public function __construct()
    {

        $this->TechModel = $this->model('technicien');
        $this->CatModel = $this->model('Categorie');
    }

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $dataTech =  $_POST;
            $data = [
                'nom' => trim($dataTech['nom']),
                'prenom' => trim($dataTech['prenom']),
                'email' => trim($dataTech['email']),
                'password' => trim($dataTech['password']),
                'Cpassword' => trim($dataTech['Cpassword']),
                'job' => trim($dataTech['job']),
                'city' => trim($dataTech['city']),
                'secteur' => trim($dataTech['secteur']),
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'password_err' => '',
                'Cpassword_err' => '',
            ];
            $cate = $dataTech['job'];
            //validation email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            //validation nom
            if (empty($data['nom'])) {
                $data['nom_err'] = 'Please enter nom';
            }
            //validation password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 charachters';
            }
            // validation conmfirm Password
            if (empty($data['Cpassword'])) {
                $data['Cpassword_err'] = 'Please confirm password';
            } else {
                if ($data["password"] != $data["Cpassword"]) {
                    $data["Cpassword_err"] = 'Passwords not match';
                } else {
                    # yassine : hna kan kaytdar nefs email idkhel l database db zedt validation & zedt fct f model  
                    $verfiyemail =  $this->TechModel->verfiyEmail($data['email']);

                    if (count($verfiyemail) > 0) {
                        $data["email_err"] = "Email already taken";
                    }
                }
            }
            if (empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['Cpassword_err'])) {
                $page = 'register';
                $imgSrc = $this->checkImg($page);
                // $idCat = $this->CatModel->getIdCatSelect($dataTech['job']);
                $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
                $this->TechModel->Register($data, $cate, $imgSrc);

                $data = $this->TechModel->getTech($data['nom']);

                $this->view('pages/login', [['title' => 'login']]);
            } else {
                $cat = $this->CatModel->getCategories();

                $this->view('pages/register', [['title' => 'register'], $cat, $dataTech]);
            }
        } else {
            $data = [
                'nom' => '',
                'prenom' => '',
                'email' => '',
                'password' => '',
                'Cpassword' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'password_err' => '',
                'Cpassword_err' => '',
            ];
            redirect('pages/register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data = [];
            $data[0]['title'] = "Login";
            $this->view('pages/login', $data);
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $dataTech = $this->TechModel->Login($email, $password);
            $data = [];
            $data[0]['title'] = "Login";
            $data[0]['error'] = "email or password not match";

            // die(var_dump($_POST));
            if (!$dataTech || !password_verify($password, $dataTech->password)) {
                $data = [
                    'title' => 'Login',
                    'error' => 'Email or password incorrect'
                ];
                $this->view('pages/login', $data);
            } else {
                $_SESSION['username'] = $dataTech->nom . ' ' . $dataTech->prenom;
                $_SESSION['id'] = $dataTech->Id_tech;
                $_SESSION['role'] = 'user';
                redirect('pages/dashboardUser');
            }
        }
    }


    public function Logout()
    {
        session_unset();
        echo $_SESSION['username'];
        redirect('pages/index');
    }



    public function updateTech($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('pages/dashboardUser');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['password'] == '') {
                $_POST['password'] = $this->TechModel->getTech($id)->password;
            } else {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }

            $data = $_POST;
            $page = 'update';

            $imgName = $this->checkImg($page, $id);
            $this->TechModel->update($data, $id, $imgName);
            redirect('pages/dashboardUser');
        }
    }

    public function deleteUser($id)
    {
        $this->TechModel->delete($id);
        redirect('pages/users');
    }


    public function searchTech()
    {
        if (isset($_GET['search'])) {
            $city = $_GET['city'];
            $secteur = $_GET['secteur'];
            $job = $_GET['job'];
            // $nbr = $this->TechModel->searchNbr($city, $job)[0]->nbr;
            // $dataPageno = $this->paginaion($nbr);
            // $offset = $dataPageno['offset'];
            $techSearch = $this->TechModel->search($city, $job, $secteur);
            // die(var_dump( $techSearch));
            $categories = $this->CatModel->getCategories();
            $AllCity = $this->TechModel->getAllCity();
            $data = [
                ['title' => "Result page"],
                $categories,
                $AllCity,
                $techSearch

            ];
            $this->view('pages/techSearch', $data);
        }
    }
    public function searchTechn()
    {
        if (isset($_GET['search'])) {
            $city = $_GET['city'];
            $job = $_GET['job'];
            $techSearch = $this->TechModel->chercher($city, $job);
            $categories = $this->CatModel->getCategories();
            $AllCity = $this->TechModel->getAllCity();
            $data = [
                ['title' => "Result page"],
                $categories,
                $AllCity,
                $techSearch
            ];
            $this->view('pages/techSearch', $data);
        }
    }
    public function paginaion($num)
    {
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $total_rows = $num;
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $data = [
            "pageno" => $pageno,
            "offset" => $offset,
            "tota_pages" => $total_pages,
        ];
        return $data;
    }

    public function getTechTopFedback()
    {
        $techTopFedback = $this->TechModel->getTechTopFedback();
        return $techTopFedback;
    }

    public function addFeedBack($idTech)
    {
        $starts = $_GET['starts'];
        $this->TechModel->addFeedBack($idTech, $starts);
        $starts = $this->TechModel->getAllFeed($idTech);
        $this->TechModel->insertFeedback($idTech, $starts);
        redirect('pages/index');
    }

    public function checkImg($page, $id = 0)
    {
        //anoir
        if ($_FILES["img"]["name"] == "") {
            if ($page == 'register') {

                return $_FILES["img"]["name"] = "imgdefault.png";
            } else {
                $data = $this->TechModel->getTech($id);
                var_dump($data);
                echo $data->img;
                return $_FILES["img"]["name"] = $data->img;
            }
        }

        if ($_FILES["img"]["error"] == 4) {
            echo
            "<script> alert('Image Does Not Exist'); </script>";
        } else {
            $fileName = $_FILES["img"]["name"];
            $fileSize = $_FILES["img"]["size"];
            $tmpName = $_FILES["img"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'jfif'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                echo
                "
                  <script>
                    alert('Invalid Image Extension');
                  </script>
                  ";
            } else if ($fileSize > 1000000000) {
                echo
                "
                  <script>
                    alert('Image Size Is Too Large');
                  </script>
                  ";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/project-khadamat/public/upload/';
                move_uploaded_file($tmpName, $folder . $newImageName);
                return $newImageName;
            }
        }
    }
    public function insertMultiplImg($id)
    {
        //yassine
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('pages/dashboardAdmin');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // die(var_dump($_FILES));
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'jfif'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                $error_msg = "Le type de l'image est insuportable !? (essayez: 'jpg', 'jpeg', 'png', 'jfif')";
                redirect('pages/profile?error=' . urlencode($error_msg));
            } else if ($fileSize > 1000000000) {
                $error_msg = "La taille de l'image est trop large !?";

                // Redirect with the error message
                redirect('pages/profile?error=' . urlencode($error_msg));
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/project-khadamat/public/images/';
                move_uploaded_file($tmpName, $folder . $newImageName);

                $description = $_POST['description'];
                // die($newImageName);
                $error_msg = "Ajouter avec succes";
                $this->TechModel->insertWork($id, $newImageName, $description);
                redirect('pages/profile?succes=' . urlencode($error_msg));
            }
        }
    }

    public function deleteWork($id)
    {
        $this->TechModel->deleteWork($id);
        redirect('pages/profile');
    }
    public function deleteReview()
    {
        $id = $_GET['rev'];
        $tech = $_GET['id_tech'];
        $this->TechModel->deleteReview($id);
        redirect('PagesController/pageProfile/' . $tech);
    }
    public function addReview($id)
    {
        if ($_SESSION) {


            if ($_SESSION['role'] == 'admin') {
                echo "<script>window.alert('Admins can not write reviews')</script>";
                redirect('PagesController/pageProfile/' . $id);
            } else {
                if ($_SESSION['role'] == 'user') {
                    if ($_POST) {

                        $content = $_POST['content'];
                        $from = $_SESSION['id'];
                        $to = $id;
                        $this->TechModel->addReview($from, $to, $content);
                        redirect('PagesController/pageProfile/' . $id);
                    }
                }
            }
        } else {
            redirect('pages/login');
        }
    }
    public function searching()
    {
        $serachinput = $_GET['q'];
        return $this->TechModel->searching($serachinput);
    }
    public function Abonner()
    {
        require_once "../vendor/autoload.php";
        $stripe_data = $this->TechModel->getStripe();
        $secret = $stripe_data[0]->secret;
        $product_price_id = $stripe_data[0]->price_id;

        
        $stripeSecretKey = $secret;
        \Stripe\Stripe::setApiKey($stripeSecretKey);
        header('Content-Type: application/json');

        $YOUR_DOMAIN = 'http://localhost/project-khadamat';

        $priceId = $product_price_id; // had id dyal produit katcreeh f stripe

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $priceId,

                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/TechController/sub',
            'cancel_url' => $YOUR_DOMAIN . '/PagesController/payement',
        ]);
        header("HTTP/1.1 303 See Other");

        header("Location: " . $checkout_session->url);
    }
    public function Sub()
    {

        $id = $_SESSION['id'];
        $this->TechModel->Subscribe($id);
        $this->TechModel->AddSub();
        redirect('pages/dashboardUser');
    }
    public function IsSubscribed($id)
    {
        $date_expiration = $this->TechModel->IsSubscribed($id)[0]->date_expiration;
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
}
