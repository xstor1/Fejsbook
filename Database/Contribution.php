
<?php

class Contribution {

    public $ID;
    public $IDProfile;
    public $Title;
    public $Date;
    public $Text;
    function __construct($id,$IDProfile, $tittle,  $Data, $Text) {
        $this->ID = $id;
        $this->IDProfile = $IDProfile;
        $this->Title = $tittle;
        $this->Date = $Data;
        $this->Text = $Text;
    }

}
