<?php
if(isset($_POST['id']))
{
   require_once '../Database/Database.php';   
    require_once '../Database/ContributionRepository.php';
      $db = new Database();   
 
    $cr = new ContributionRepository($db);
   $post= $cr->getContributionbyIDProfile($_POST['id']);
   echo json_encode($post);
    
}
?>
