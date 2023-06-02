<?php

class Admin
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    //aaa

    // public function Login($username,$password){
    //     $this->db->query("SELECT * FROM admins WHERE username = '$username' and password = '$password'");
    //     return $this->db->single();
    // }


    public function Login($username, $password)
    {
        $this->db->query("SELECT * FROM admins WHERE username = '$username' and password = '$password'");
        return $this->db->single();
    }

    public function getAllAdmin()
    {
        $this->db->query("SELECT * FROM admins;");
        return $this->db->resultSet();
    }

    public function countAdmin()
    {
        $this->db->query("SELECT * FROM admins;");
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function addAdmin($dataAdmin)
    {
        $this->db->query('INSERT INTO `Admins`(`username`, `phone`, `password`) VALUES (:username,:phone,:password)');
        $this->db->bind(':username', $dataAdmin['username']);
        $this->db->bind(':phone', $dataAdmin['phone']);
        $this->db->bind(':password', $dataAdmin['password']);
        $this->db->execute();
    }


    public function delete($idAdmin)
    {
        $this->db->query('DELETE FROM `admins` WHERE id_admin = ' . $idAdmin);
        $this->db->execute();
    }

    public function updateAdmin($dataAdmin, $idAdmin)
    {
        $this->db->query("UPDATE `admins` SET username=:username, phone = :phone, password= :password WHERE id_admin =$idAdmin");
        $this->db->bind(':username', $dataAdmin['username']);
        $this->db->bind(':phone', $dataAdmin['phone']);
        $this->db->bind(':password', $dataAdmin['password']);
        $this->db->execute();
    }
    public function AddJob($nom, $finalimg)
    {
        $this->db->query('INSERT INTO `Categories`(`nom`, `description`, `img`) VALUES (:nom,:descr,:img)');
        $this->db->bind(':nom', $nom);
        $this->db->bind(':descr', $nom);
        $this->db->bind(':img', $finalimg);
        $this->db->execute();
    }

    public function deleteJob($id)
    {
        $this->db->query('DELETE FROM `categories` WHERE id_cat = ' . $id);
        $this->db->execute();
    }
    //  yassine fhad tables jdad back-end o anoir front
    public function villes()
    {
        $this->db->query("SELECT * FROM villes");
        return $this->db->resultSet();
    }
    public function AddCity($ville)
    {
        $this->db->query('INSERT INTO `villes`(`nom_ville`) VALUES (:ville)');
        $this->db->bind(':ville', $ville);
        $this->db->execute();
    }
    public function DeleteCity($idville)
    {
        $this->db->query('DELETE FROM `villes` WHERE id_ville = ' . $idville);
        $this->db->execute();
    }
    ////////////////////////////////////////////////////
    public function secteurs()
    {
        $this->db->query("SELECT secteurs.secteur, villes.nom_ville ,secteurs.id_secteur
       FROM secteurs 
       INNER JOIN villes ON secteurs.id_ville = villes.id_ville;
       ");
        return $this->db->resultSet();
    }
    public function AddSecteur($secteur, $id_ville)
    {
        $this->db->query('INSERT INTO `secteurs`(`secteur`, `id_ville`) VALUES (:sec,:id)');
        $this->db->bind(':sec', $secteur);
        $this->db->bind(':id', $id_ville);
        $this->db->execute();
    }
    public function DeleteSecteur($idSecteur)
    {
        $this->db->query('DELETE FROM `secteurs` WHERE id_secteur = ' . $idSecteur);
        $this->db->execute();
    }
    public function updateStripe($id, $dataAdmin)
    {
        $this->db->query("UPDATE `stripe` SET secret=:secret, price_id = :price_id WHERE id =$id");
        $this->db->bind(':secret', $dataAdmin['secret']);
        $this->db->bind(':price_id', $dataAdmin['price_id']);

        $this->db->execute();
    }
    public function updateLogo($id, $logo_src)
    {
        $this->db->query("UPDATE `logo` SET logo_src=:logo WHERE id =$id");
        $this->db->bind(':logo', $logo_src);
        

        $this->db->execute();
    }
    public function getlogo()
    {
        $this->db->query("SELECT * FROM logo");
        return $this->db->resultSet();
    }
}
