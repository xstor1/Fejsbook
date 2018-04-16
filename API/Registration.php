<?php

if(isset($_POST['Name']) && isset($_POST['Surname']) && isset($_POST['ProfilePhoto'])
&& isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['BornDate']) && isset($_POST['Sex']) && isset($_POST['device_id']))
    {
    require_once '../Database/Profile.php';
    require_once '../Database/ProfileRepository.php';
    require_once '../Database/Database.php';
    require_once '../Database/Authorize.php';
    $db = new Database();
    $pr = new ProfileRepository($db);
    $isthere = $pr->getProfileByEmail($_POST['Email']);
    if($isthere == NULL || empty($isthere))
        {
        $profile = new Profile(0, $_POST['Name'], $_POST['Surname'], $_POST['ProfilePhoto'], $_POST['Email'], $_POST['Password'], $_POST['BornDate'], $_POST['Sex'], 0);
        $pr->addProfile($profile);

        $user = $pr->getProfileByEmail($_POST['Email']);
        $prof = new Profile($user['ID'], $user['Name'], $user['Surname'], $user['ProfilePhoto'], $user['Email'], $user['Password'], $user['BornDate'], $user['Sex'], $user['Admin']);
        $auth = new Authorize();
        $auth->createToken($user['ID'], $_POST['device_id'], $prof);
         echo "'Created':'True'";
         header('Location: ..\Login.html');
        }
else
    {
    $error = "'Error':'Email'";
    echo $error;
      header('Location: ..\Registration.html');
    }

   
    }
else
    {
    $error = "'Error':'Null'";
    echo $error;
      header('Location: ..\Registration.html');
    }

