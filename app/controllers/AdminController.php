<?php
class AdminController extends Controller
{
    
    private $AdminModel;

    public function __construct()
    {
        $this->AdminModel = $this->model('Admin');
    }



    public function login()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('pages/loginAdmin');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $dataAdmin = $this->AdminModel->Login($username, $password);
            // print_r($dataAdmin);
            // die();
            if ($dataAdmin == false) {
                redirect('pages/loginAdmin?error=passwordoremailnotcorrect');
            } else {
                $_SESSION['username'] = $dataAdmin->username;
                $_SESSION['id'] = $dataAdmin->id_admin;
                $_SESSION['role'] = "admin";
                redirect('pages/dashboardAdmin');
            }
        }
    }

    public function addAdmin()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataAdmin =  $_POST;
            $this->AdminModel->addAdmin($dataAdmin);
            redirect('pages/admins');
        } else {
            $this->view('pages/admins');
        }
    }

    public function updateAdmin($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataAdmin =  $_POST;
            $this->AdminModel->updateAdmin($dataAdmin, $id);
            redirect("pages/admins");
        } else {
            redirect("pages/admins");
        }
    }

    public function deleteAdmin($id)
    {
        $this->AdminModel->delete($id);
        redirect('pages/admins');
    }

    public function Logout()
    {
        session_unset();
        echo $_SESSION['username'];
        redirect('pages/loginAdmin');
    }

    public function Addjob()
    {
        //yassine
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->view('pages/dashboardAdmin');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // die(var_dump($_FILES));
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
                $folder = $_SERVER['DOCUMENT_ROOT'] . '/project-khadamat/public/images/';
                move_uploaded_file($tmpName, $folder . $newImageName);

                $job_name = $_POST['job_name'];
                // die($newImageName);

                $this->AdminModel->AddJob($job_name, $newImageName);
                redirect('pages/jobs');
            }
        }
    }
    public function Deletejob($id)
    {
        $this->AdminModel->deleteJob($id);
        redirect('pages/jobs');
    }
    public function AddCity()
    {
        $ville = $_POST['ville'];
        $this->AdminModel->AddCity($ville);
        redirect('pages/villes');
    }
    public function deleteCity($id_ville)
    {
        $this->AdminModel->DeleteCity($id_ville);
        redirect('pages/villes');
    }
    public function AddSecteur()
    {
        $id_ville = $_POST['ville'];
        $secteur = $_POST['secteur'];
        $this->AdminModel->AddSecteur($secteur, $id_ville);
        redirect('pages/secteurs');
    }
    public function DeleteSecteur($id_secteur)
    {
        $this->AdminModel->DeleteSecteur($id_secteur);
        redirect('pages/secteurs');
    }
}
