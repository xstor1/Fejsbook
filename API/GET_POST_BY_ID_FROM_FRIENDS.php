<?php

if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['Email']) && 
        isset($_POST['Token']) && isset($_POST['device_id'])) {
    
    require_once '../Database/Database.php';
    require_once '../Database/ProfileRepository.php';
    require_once '../Database/ContributionRepository.php';
    require_once '../Database/Profile.php';
    require_once '../Database/Authorize.php';  
    $auth = new Authorize();
    if($auth ->authorizeToken($_POST['Email'], $_POST['Token'],$_POST['device_id']))
    {
    $db = new Database();   
    $pr = new ProfileRepository($db);
    $cr = new ContributionRepository($db);
    $Contr = $cr->getContributions();
    $prof = $pr->getAllFriendsbyid($_POST['id']);
   
$array=array();
    foreach ($Contr as $key => $value) {
        if($value['IDProfile']==$_POST['id'])
               {
                array_push($array, $value);
               }
        foreach ($prof as $key1 => $item) {


            if ($value['IDProfile'] == $item['IDProfile1'] || $value['IDProfile'] == $item['IDProfile2']) {
               if($value['IDProfile']!=$_POST['id'])
               {
                array_push($array, $value);
               }
              
            }
        }
    }
  $array =array_reverse($array);
  echo json_encode($array) ;
}
else
{
    $error[] = array('Error'=>'Fail in authentication');
    echo json_encode($error);
}
}
?>