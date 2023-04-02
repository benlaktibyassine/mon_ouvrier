<?php

class Admin
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


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
    // public function search($search_name){
    //     $search_name = "%".$search_name."%";
    //     $this->db->query("SELECT * FROM Admins WHERE username LIKE :name OR full_name LIKE :name");
    //     $this->db->bind(':name' ,$search_name);
    //     return $this->db->resultSet();
    // }

}
