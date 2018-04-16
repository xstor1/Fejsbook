<?php

if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['idFriend']) && isset($_POST['Email']) && 
        isset($_POST['Token']) && isset($_POST['device_id'])) {
    
    require_once '../Database/Database.php';
    require_once '../Database/ProfileRepository.php';
    require_once '../Database/Profile.php';
    require_once '../Database/Authorize.php';  
    $auth = new Authorize();
    if($auth ->authorizeToken($_POST['Email'], $_POST['Token'],$_POST['device_id']))
    {
          $db = new Database();   
    $pr = new ProfileRepository($db);
    $pr->addFriend($_POST['id'], $_POST['idFriend']);
    }
        }