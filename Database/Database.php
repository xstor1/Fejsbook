<?php

class Database {

    const HOST = 'mysqlstudenti.litv.sssvt.cz';
    const USER = 'storvojtech';
    const PASSWORD = '123456';
    const DBNAME = '4b_storvojtech_db2';

    private $conn;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USER, self::PASSWORD);
            $this->conn->query('SET NAMES utf8');
        } catch (Exception $e) {
            die('Chyba připojení k databázi');
        }
    }
    
    function selectAll($query, $params = []) {
        return $this->execute($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function selectOne($query, $params = []) {
        return $this->execute($query, $params)->fetch(PDO::FETCH_ASSOC);
    }
    
      function delete($query) {
        $this->execute($query);
    }
    
    function insert($query, $data) {
       $this->execute($query, $data);
        
        return $this->conn->lastInsertId();
    }
    
    function update($query, $data) {
       $stmt = $this->execute($query, $data);
       
       return $stmt->rowCount();
    }
    
    private function execute($query, $data = []) {
       // die($this->conn->quote($data[':id']));
        $stmt = $this->conn->prepare($query);
        //var_dump($query);die("x");
        $result = $stmt->execute($data);
        if (!$result) {
          var_dump($stmt->errorInfo());
           die();
               
        }
        
        return $stmt;
    }

}
