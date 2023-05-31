<?php

class Technicien
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function GetLastTech()
    {
        $this->db->query("SELECT t.Id_tech, t.nom, t.prenom, t.email, t.phone, c.nom metier, t.adresse, v.nom_ville ville, t.secteur, t.img, t.password, t.feedback
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville
        ORDER BY t.Id_tech DESC 
        LIMIT 5;
        ");
        return $this->db->resultSet();
    }

    public function addFeedBack($idTech, $starts)
    {
        $this->db->query("INSERT INTO feedback (fk_tech,Nstart) VALUES (:fk_tech,:Nstart)");
        $this->db->bind(':fk_tech', $idTech);
        $this->db->bind(':Nstart', $starts);
        $this->db->execute();
    }

    public function getAllFeed($id)
    {
        $this->db->query("SELECT * FROM feedback WHERE fk_tech = :fk_tech");
        $this->db->bind(':fk_tech', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function getAllCity()
    {
        $this->db->query("SELECT * FROM villes;");
        return $this->db->resultSet();
    }

    public function getAllTech()
    {
        $this->db->query("SELECT t.Id_tech, t.nom, t.prenom, t.email, t.phone, c.nom metier, t.adresse, v.nom_ville,t.description ville, t.secteur, t.img, t.password, t.feedback
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville
        LEFT JOIN abonnement a ON t.Id_tech = a.Id_tech
        WHERE (a.date_expiration >= NOW())");
        return $this->db->resultSet();
    }

    public function countTech()
    {
        $this->db->query("SELECT t.Id_tech, t.nom, t.prenom, t.email, t.phone, c.nom metier, t.adresse, v.nom_ville ville, t.secteur, t.img, t.password, t.feedback
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getTechTopFeedback()
    {
        $this->db->query("SELECT t.Id_tech, t.nom, t.prenom, t.email, t.phone, c.nom AS metier, t.adresse, v.nom_ville AS ville, t.secteur, t.img, t.password, t.feedback, t.description
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville
        LEFT JOIN abonnement a ON t.Id_tech = a.Id_tech
        WHERE (a.date_expiration >= NOW())
        ORDER BY t.Id_tech DESC
        LIMIT 3;
        
        ");
        return $this->db->resultSet();
    }
    public function verfiyEmail($email)
    {
        $this->db->query('SELECT t.Id_tech, t.nom, t.prenom, t.email, t.phone, c.nom metier, t.adresse, v.nom_ville ville, t.secteur, t.img, t.password, t.feedback
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville WHERE email = :em');
        $this->db->bind(':em', $email);

        return $this->db->resultSet();
    }
    public function Register($data, $fk_cat, $imgName)
    {
        $this->db->query('SELECT count(*) FROM techniciens WHERE email = :em');
        $this->db->bind(':em', $data['email']);

        $this->db->execute();
        $res = $this->db->rowCount();

        if ($res == 1) {

            $this->db->query('START TRANSACTION;
            INSERT INTO `techniciens`(`nom`, `prenom`, `email`,`password`,`Fk_cat`,`img`,`id_ville`,`secteur`) 
            VALUES (:nom,:prenom,:email,:password,:fk_cat,:img,:ville,:sec);
            SET @id_tech = LAST_INSERT_ID();
            INSERT INTO abonnement (id_tech, date_abn, date_expiration)
            VALUES (@id_tech, NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH));
            COMMIT;');

            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':ville', $data['city']);
            $this->db->bind(':sec', $data['secteur']);
            $this->db->bind(':fk_cat', $fk_cat);
            $this->db->bind(':img', $imgName);

            $this->db->execute();
        }
    }

    public function getTech($id_tech)
    {
        $this->db->query("SELECT t.Id_tech, t.nom, t.prenom, t.email, t.phone, c.nom metier, t.adresse, v.nom_ville ville, t.secteur, t.img, t.password, t.feedback,t.description
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville WHERE id_tech = :id_tech");
        $this->db->bind(':id_tech', $id_tech);
        return $this->db->single();
    }
    public function getVille($id_tech)
    {
        $sql = "SELECT techniciens.id_ville, villes.nom_ville
        FROM techniciens
        JOIN villes ON techniciens.id_ville = villes.id_ville
        WHERE techniciens.Id_tech = :id_tech";
        $this->db->query($sql);
        $this->db->bind(':id_tech', $id_tech);
        return $this->db->single();
    }
    public function getMetier($id_tech)
    {
        $sql = "SELECT techniciens.Fk_cat, categories.nom
        FROM techniciens
        JOIN categories ON techniciens.Fk_cat = categories.id_cat
        WHERE techniciens.Id_tech = :id_tech";
        $this->db->query($sql);
        $this->db->bind(':id_tech', $id_tech);
        return $this->db->single();
    }
    public function Login($email, $password)
    {
        $this->db->query("SELECT * FROM techniciens WHERE email = '$email' ");
        return $this->db->single();
    }


    public function update($data, $id, $imgName)
    {
        $this->db->query("UPDATE `techniciens` SET nom=:nom, prenom = :prenom,
     email= :email, phone = :phone ,Fk_cat = :Fk_cat,description =:desc
     , password = :password , adresse = :adresse , id_ville = :ville , img=:img,secteur=:sec WHERE Id_tech =$id");
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':sec', $data['secteur']);

        $this->db->bind(':password', $data['password']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':ville', $data['ville']);
        $this->db->bind(':img', $imgName);
        $this->db->bind(':Fk_cat', $data['job']);
        $this->db->bind(':desc', $data['description']);
        $this->db->execute();
    }



    public function delete($idTech)
    {
        $this->db->query('DELETE FROM `techniciens` WHERE Id_tech = ' . $idTech);
        $this->db->execute();
    }


    public function searchNbr($city, $id_cat)
    {
        $this->db->query("SELECT count(*) as 'nbr' FROM techniciens WHERE ville = :city or Fk_cat = :id ");
        $this->db->bind(':city', $city);
        $this->db->bind(':id', $id_cat);

        return $this->db->resultSet();
    }
    public function search($city, $job, $secteur)
    {
        $this->db->query("SELECT t.Id_tech,t.nom,t.prenom,t.email,t.phone,t.adresse ,t.secteur,t.img,t.feedback, v.nom_ville ville, c.nom metier,t.description
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville
        LEFT JOIN abonnement a ON t.Id_tech = a.Id_tech
        WHERE (a.date_expiration >= NOW())
        and t.secteur = :sec
          AND t.id_ville = :city
          AND t.Fk_cat = :job;
        ");
        $this->db->bind(':city', $city);
        $this->db->bind(':job', $job);
        $this->db->bind(':sec', $secteur);
        return $this->db->resultSet();
    }
    public function chercher($city, $job)
    {
        $this->db->query("SELECT t.Id_tech,t.nom,t.prenom,t.email,t.phone,t.adresse ,t.secteur,t.img,t.feedback, v.nom_ville ville, c.nom metier
        FROM techniciens t
        JOIN categories c ON t.Fk_cat = c.id_cat
        JOIN villes v ON t.id_ville = v.id_ville
        LEFT JOIN abonnement a ON t.Id_tech = a.Id_tech
        WHERE (a.date_expiration >= NOW())
        and t.id_ville = :city
          AND t.Fk_cat = :job;
        ");
        $this->db->bind(':city', $city);
        $this->db->bind(':job', $job);
        return $this->db->resultSet();
    }

    public function getNumTechCat($countCat)
    {
        $nTech = [];
        for ($i = 1; $i <= $countCat + 1; $i++) {
            $this->db->query("SELECT * FROM techniciens WHERE Fk_cat = $i");
            $this->db->execute();
            $numTech[$i] = $this->db->rowCount();
            $nTech[] = $numTech[$i];
        }

        return $nTech;
    }


    public function getTechTopFedback()
    {
        $this->db->query("SELECT * FROM techniciens");
        return $this->db->resultSet();
    }
    // public function search($search_name){
    //     $search_name = "%".$search_name."%";
    //     $this->db->query("SELECT * FROM Admins WHERE username LIKE :name OR full_name LIKE :name");
    //     $this->db->bind(':name' ,$search_name);
    //     return $this->db->resultSet();
    // }


    public function insertFeedback($idTech, $starts)
    {
        $this->db->query("UPDATE techniciens SET feedback = :Nstart WHERE Id_tech = :id");
        $this->db->bind(':id', $idTech);
        $this->db->bind(':Nstart', $starts);
        $this->db->execute();
    }

    public function insertWork($id, $img, $des)
    {

        $this->db->query('INSERT INTO `images`(`img`,`description`, `fk_tech`) VALUES (:img,:description,:fk_tech)');
        $this->db->bind(':fk_tech', $id);
        $this->db->bind(':img', $img);
        $this->db->bind(':description', $des);
        $this->db->execute();
    }
    public function getWorks($id)
    {
        $this->db->query("SELECT * FROM images Where fk_tech = $id ");
        return $this->db->resultSet();
    }

    public function deleteWork($id)
    {

        $this->db->query('DELETE FROM `images` WHERE id_img = ' . $id);
        $this->db->execute();
    }
    public function deleteReview($id)
    {

        $this->db->query('DELETE FROM `reviews` WHERE id_review = ' . $id);
        $this->db->execute();
    }
    public function addReview($from, $to, $content)
    {
        $this->db->query('INSERT INTO `reviews`(`from_id`,`to_id`, `content`) VALUES (:from,:to,:content)');
        $this->db->bind(':from', $from);
        $this->db->bind(':to', $to);
        $this->db->bind(':content', $content);
        $this->db->execute();
    }
    public function getReviewsforuser($id)
    {
        $this->db->query("SELECT `id_review`, `from_id`, `to_id`, `content`,`nom`,`prenom`,`img` FROM `reviews`,techniciens WHERE to_id = $id AND `techniciens`.`Id_tech` = `reviews`.`from_id` GROUP BY `id_review`");
        return $this->db->resultSet();
    }
    public function searching($search)
    {
        $this->db->query("SELECT * FROM technecien WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%' OR ville LIKE '%$search%' OR metier LIKE '%$search%'");
        return $this->db->resultSet();
    }
    public function IsSubscribed($id)
    {
        $this->db->query("SELECT date_expiration FROM abonnement WHERE id_tech = :id");
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
    }
    public function Subscribe($id)
    {
        $this->db->query("UPDATE abonnement
        SET date_expiration = 
            CASE 
                WHEN date_expiration >= DATE(NOW()) 
                    THEN DATE_ADD(date_expiration, INTERVAL 1 MONTH)
                ELSE DATE_ADD(DATE(NOW()), INTERVAL 1 MONTH)
            END
        WHERE id_tech = :id
        ");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    public function AddSub()
    {

        $this->db->query("INSERT INTO Subs (date_sub) VALUES (CURRENT_TIMESTAMP);");
        $this->db->execute();
    }
    public function Getsubs()
    {
        $this->db->query("SELECT MONTH(date_sub) AS month, YEAR(date_sub) AS year, COUNT(*) AS subs_count FROM Subs GROUP BY YEAR(date_sub), MONTH(date_sub)");
        return $this->db->resultSet();
    }
    public function getStripe()
    {
        $this->db->query("SELECT * FROM stripe");
        return $this->db->resultSet();
    }
}
