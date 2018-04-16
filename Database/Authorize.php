<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authorize
 *
 * @author xstor
 */ require_once '../Database/TokenRepository.php';
require_once '../Database/Database.php';
/*Ano já vím token by se měl předělávat po kazdem updatu datumu ale... moc nevim jak tu funguje gethashcode tak to radsu necham takhle*/
class Authorize {

    private $db;
    private $tr;

    function __construct() {
        $this->db = new Database();
        $this->tr = new TokenRepository($this->db);
    }

    function authorizeToken($_email, $_token, $device_id) {

        $token = $this->tr->getTokenByEmail($_email,$device_id);
        if ($token['Token_'] == $_token && $device_id == $token['device_id']) {
            $d1 = new DateTime($token['valid_to']);
            $d2 = new DateTime(date('Y-m-d H:i:s'));
            
         
            if ($d1 < $d2) {
                
                $this->updateToken($token['ID']);
                return TRUE;
            } 
            else {
                return TRUE;
            }
        } 
        else {
            return FALSE;
        }
    }

    function generateNewToken(Profile $profile) {
      
        $code = spl_object_hash( $profile);
        return $code;
    }

    function updateToken($id) {
        
        $this->tr->updateToken($id,  date('Y-m-d H:i:s', strtotime("+30 days")) );
    }

    function createToken($iduser, $device_id, Profile $profile) {
        $token = $this->generateNewToken($profile, $device_id);
        $this->tr->addToken($token, $device_id, date('Y-m-d H:i:s', strtotime("+30 days")), $iduser);
    }

}
