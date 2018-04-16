<?php
if(isset($_POST['id']) && is_numeric($_POST['id']))
{
    require_once '../Database/Database.php';
        require_once '../Database/ProfileRepository.php';
        require_once '../Database/Profile.php';
        $db = new Database();
        $pr = new ProfileRepository($db);
        $prof = $pr->getProfile($_POST['id']);
        echo json_encode($prof);
}