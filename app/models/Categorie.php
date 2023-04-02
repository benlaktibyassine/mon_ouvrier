<?php

class Categorie
{

    private $db;
    public function __construct( )    {
    $this->db = new Database;
}


public function getCategories(){
$this->db->query("SELECT * FROM Categories");
return $this->db->resultSet();
}


public function countCategories(){
    $this->db->query("SELECT * FROM Categories");
    $this->db->execute();
    return $this->db->rowCount();
}

public function getIdCatSelect($job){
    $this->db->query("SELECT id_cat FROM Categories Where nom = :nom");
    $this->db->bind(':nom',$job);
    $id = $this->db->single();
    return $id->id_cat;
}


}