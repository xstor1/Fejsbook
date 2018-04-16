<?php
require_once '../Database/Contribution.php';
class ContributionRepository {

    private $db;

    function __construct(Database $db) {
        $this->db = $db;
    }

    function getContributions() {
        $sql = 'SELECT c.ID, c.IDProfile, c.Title, c.Date, c.Text, p.Name, p.Surname  '
                . 'FROM tbContributions c inner join tbProfiles p on p.ID=c.IDProfile ';
                
        return $this->db->selectAll($sql);
    }

    function addContribution(Contribution $contribution) {
        $sql = 'INSERT INTO tbContributions VALUES(default, :IDProfile, :Title, :Date, :Text)';
        $data = [
            ':IDProfile' => $contribution->IDProfile,
            ':Title'=> $contribution->Title,
            ':Date'=>$contribution->Date,
            ':Text'=>$contribution->Text
            
           
        ];

        return $this->db->insert($sql, $data);
    }

    function getContribution($id) {
        $sql = 'SELECT * FROM tbContributions WHERE ID = :id';
        return $this->db->selectOne($sql, [
                    ':id' => $id
        ]);
    }
    function deleteContribution($id)
    {
        $sql="DELETE FROM tbContribution WHERE ID= :id";
        return $this->db->delete($sql, 
                [
                    ':id' =>$id
                ]); 
    }

    function updateContribution(Contribution $contribution) {
        $sql = 'UPDATE tbContributions '
                . 'SET IDProfile = :IDProfile, Title = :Title, Date = :Date,Text = :Text '
                . 'WHERE ID = :id';
        
        return $this->db->update($sql, [
            ':IDProfile' => $contribution->IDProfile,            
            ':id' => $contribution->ID,
            ':Title' => $contribution->Title,
            ':Date'=> $contribution->Date,
            ':Text' => $contribution->Text
            ]);
    }

}
