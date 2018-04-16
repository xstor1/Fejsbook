<?php

class Profile {

    public $ID;
    public $Name;
    public $Surname;
    public $ProfilePhoto;
    public $Email;
    public $Password;
    public $BornDate;
    public $Sex;
    public $Admin;

    function __construct( $id,  $Name,  $Surname,  $ProfilePhoto,  $Email,  $password,  $BornDate,  $Sex,  $Admin) {
        $this->ID = $id;
        $this->Name = $Name;
        $this->Surname = $Surname;
        $this->ProfilePhoto = $ProfilePhoto;
        $this->Email = $Email;
        $this->Password = $password;
        $this->BornDate = $BornDate;
        $this->Sex = $Sex;
        $this->Admin = $Admin;
    }
    function hashPassword()
    {
        
    }
    function unhashPassword()
    {
        
    }

}
