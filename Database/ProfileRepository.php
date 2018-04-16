<?php
require_once '../Database/Profile.php';
class ProfileRepository {

    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function getProfiles() {
        $sql = 'SELECT ID,Name,Surname,ProfilePhoto,Email,BornDate,Sex,Admin '
                . 'FROM tbProfiles ';
                
        return $this->db->selectAll($sql);
    }

    function addProfile(Profile $profile) {
        $sql = 'INSERT INTO tbProfiles VALUES(default, :name, :surname, :ProfilePhoto,:Email, :Password, :BornDate, :Sex, :Admin)';
        $data = [
            ':name' => $profile->Name,
            ':surname'=> $profile ->Surname,
            ':ProfilePhoto'=>$profile->ProfilePhoto,
            ':Email'=>$profile->Email,
            ':Password'=>$profile->Password,
            'BornDate'=>$profile->BornDate,
            ':Sex'=>$profile->Sex,
            ':Admin'=>$profile->Admin
           
        ];

        return $this->db->insert($sql, $data);
    }

    function getProfile($id) {
        $sql = 'SELECT * FROM tbProfiles WHERE ID = :id';
        return $this->db->selectOne($sql, [
                    ':id' => $id
        ]);
    }
      function getProfileByEmail($email) {
        $sql = 'SELECT * FROM tbProfiles WHERE Email = :email';
        return $this->db->selectOne($sql, [
                    ':email' => $email
        ]);
    }
    
    function deleteProfile($id)
    {
        $sql="DELETE FROM tbProfiles WHERE ID= :id";
        return $this->db->delete($sql, 
                [
                    ':id' =>$id
                ]); 
    }
    function  liked ($idProfile, $idPost)
    {
        $sql='select * from tbLikes where IDContribution= :idpost and IDProfile= :idprofile';
        return $this->db->selectOne($sql, [':idpost'=>$idPost,':idprofile'=>$idProfile]);   
        
    }
            function LikePost($idProfile, $idPost)
        {
            $sql='INSERT INTO tbLikes VALUES (:idPost, :idProfile)';
            return $this->db->insert($sql, [':idPost'=>$idPost,':idProfile'=>$idProfile]);
            
        } 
         function UnLikePost($idProfile, $idPost)
        {
            $sql='DELETE FROM tbLikes WHERE IDContribution= :idpost and IDProfile= :idprofile';
            return $this->db->delete($sql, [':idpost'=>$idPost,':idprofile'=>$idProfile]);            
        } 
    
function addFriend($id1,$id2)
{
    $sql ='INSERT INTO tbFriends VALUES(:id1, :id2, 1)';
    return $this->db->insert($sql, [':id1'=>$id1,':id2'=>$id2]);
    
}
    function updateCategory(Profile $profile) {
        $sql = 'UPDATE tbProfiles '
                . 'SET Name = :name, Surname = :surname, ProfilePhoto = :ProfilePhoto,Email = :Email, Password = :Password, BornDate = :BornDate, Sex = :Sex , Admin = :Admin '
                . 'WHERE ID = :id';
        
        return $this->db->update($sql, [
            ':Name' => $profile->Name,            
            ':id' => $profile->ID,
            ':Surname' => $profile->Surname,
            ':ProfikePhoto'=> $profile->ProfilePhoto,
            ':Email' => $profile->Email,
            ':Passwrod' => $profile->Password,
            ':BornDate' => $profile->BornDate,
            ':Sex'=>$profile->Sex,
            ':Admin'=>$profile->Admin
            ]);
    }
    function getAllProfileContribution()
    {
       $sql ='select * from tbProfiles p inner join tbContributions c on p.ID=c.IDPROFILE';
       return $this->db->selectAll($sql);
    }
    function getAllFriendsbyid($id)
    {
        $sql ='SELECT * FROM `tbFriends` WHERE IDProfile1 = :id or IDProfile2 = :id and Accepted=1';
        return $this->db->selectAll($sql,[':id'=>$id]);
    }
   
}
