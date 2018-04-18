<?php
if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['Email']) && 
        isset($_POST['Token']) && isset($_POST['device_id']) && isset($_POST['title'])&&isset($_POST['text'])) {
    
    require_once '../Database/Database.php'; 
    require_once '../Database/ContributionRepository.php';  
     require_once '../Database/Contribution.php';  
    require_once '../Database/Authorize.php';  
    $auth = new Authorize();
    if($auth ->authorizeToken($_POST['Email'], $_POST['Token'],$_POST['device_id']))
    {
    $db = new Database();   

    $cr = new ContributionRepository($db);
    $contribution =  new Contribution($_POST['id'],$_POST['title'],$_POST['text']);
$cr->addContribution($contribution);

        }
        
    }