
<?php
require_once '../Database/Database.php';
require_once '../Database/ProfileRepository.php';
require_once '../Database/Profile.php';
$db = new Database();
$pr = new ProfileRepository($db);
 $prof =  $pr->getProfiles();

 echo json_encode($prof);?>
 