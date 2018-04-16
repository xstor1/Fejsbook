<?php

if (isset($_POST['IDUser']) && isset($_POST['device_id'])) {
    require_once '../Database/Authorize.php';
    require_once '../Database/Database.php';
    require_once '../Database/ProfileRepository.php';
    $db = new Database();
    $pr = new ProfileRepository($db);
     $user = $pr->getProfile($_POST['IDUser']);
     $prof = new Profile($user['ID'],$user['Name'],$user['Surname'],$user['ProfilePhoto'],$user['Email'],$user['Password'],$user['BornDate'],$user['Sex'],$user['Admin']);
    $auth = new Authorize();
    $auth->createToken($_POST['IDUser'], $_POST['device_id'], $prof);
}