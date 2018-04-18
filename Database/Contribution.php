
<?php

class Contribution {

    public $ID;
    public $IDProfile;
    public $Title;
    public $Date;
    public $Text;
    function __construct($IDProfile, $tittle,  $Text) {
        
        $this->IDProfile = $IDProfile;
        $this->Title = $tittle;
        $this->Date = date("Y-m-d H:i:s");
        $this->Text = $Text;
    }

}
