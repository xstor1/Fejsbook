<?php


class TokenRepository {
    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function getTokenByEmail($email, $device_id) {
        $sql = 'SELECT t.Token_, t.ID, t.valid_to, t.device_id, t.IDUser FROM tbTokens t inner join tbProfiles p on p.ID=t.IDUser where p.Email = :email and t.device_id= :device_id';
                
        return $this->db->selectOne($sql,[':email'=>$email, ':device_id'=>$device_id]);
    }
    function updateToken($id,$date)
    {
        $sql = 'UPDATE tbTokens SET valid_to= :date WHERE ID = :id';
          return $this->db->update($sql, [':date'=>$date, ':id'=>$id]);
    }
      function addToken($token,$device_id,$valid_to,$IDUser) {
        $sql = 'INSERT INTO tbTokens VALUES(default, :IDUser, :Token, :valid_to,:device_id)';
        $data = [
            ':IDUser' => $IDUser,
            ':Token'=> $token,
            ':valid_to'=>$valid_to,
            ':device_id'=>$device_id
            
           
        ];

        return $this->db->insert($sql, $data);
    }

}
