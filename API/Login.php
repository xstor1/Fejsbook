<?php

if (isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['device_id']))
{
      require_once '../Database/Profile.php';
    require_once '../Database/ProfileRepository.php';
    require_once '../Database/TokenRepository.php';
    require_once '../Database/Database.php';
    require_once '../Database/Authorize.php';
    $db = new Database();
    $pr = new ProfileRepository($db);
     $prof= $pr->getProfileByEmail($_POST['Email']);
   if($prof['Password']==$_POST['Password'])
   {
       $auth = new Authorize();
       $tok = new TokenRepository($db);
     $token =  $tok->getTokenByEmail($_POST['Email'],$_POST['device_id']);
     $auth->authorizeToken($_POST['Email'], $token['Token_'], $token['device_id']);
      echo json_encode($token); 
   }else
   {
    $error []=array('Error'=>'Bad Password or Email');
    echo json_encode($error);
   }
} else {
  
    $error []=array('Error'=>'No Parrameters');
    echo json_encode($error);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

