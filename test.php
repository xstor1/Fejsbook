<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../Database/Database.php';
        require_once '../Database/ProfileRepository.php';
        require_once '../Database/Profile.php';
        $db = new Database();
        $pr = new ProfileRepository($db);
        $id=1;
      $test=$pr->getProfile($id);
      var_dump($test);
       // $myJSOn = json_encode();
       // echo $myJSOn;
        ?>
    </body>
</html>
