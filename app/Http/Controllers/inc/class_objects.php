<?php
namespace class_objects;
require_once('class_feedback.php');
use class_feedback\FeedBacks;

Class Objects {
    public $FBacks;
    private $OID;
    private $CID;
    private $Nick;
    private $QRFileName;
    private $RegDate;
    private $ManagerName;
    private $ManagerPhone;
    private $City;
    private $Addr;
    private $notes;
    private $CountOfFB;
    private $dbLink;

    
    public function __construct($oid){
        require('base_inc.php');
        $query="SELECT OID, CID,Nick, QRFileName, RegDate, ManagerName, ManagerPhone, City,
                 Addr, notes FROM Objects WHERE OID=\"".$oid."\";";
        $data = mysqli_query($this->dbLink, $query);
        $row =mysqli_fetch_assoc($data);
        $this->OID=$oid;
        $this->CID=$row['CID'];
        $this->Nick=$row['Nick'];
        $this->QRFileName=$row['QRFileName'];
        $this->RegDate=$row['RegDate'];
        $this->ManagerName=$row['ManagerName'];
        $this->ManagerPhone=$row['ManagerPhone'];
        $this->City=$row['City']; 
        $this->Addr=$row['Addr']; 
        $this->notes=$row['notes']; 
        $this->FBacks = new FeedBacks($oid); 
       } 
    
    public function __toString() {
        return "
        OID:          $this->OID <br>
        CID:          $this->CID <br>
        Nick:         $this->Nick <br>
        QRFileName:   $this->QRFileName<br>
        RegDate:      $this->RegDate<br>
        ManagerName:  $this->ManagerName<br>
        ManagerPhone: $this->ManagerPhone<br>
        City:         $this->City<br>
        Addr:         $this->Addr<br>
        notes:        $this->notes<br>
        ";
        }

    public function getCID () {
        return $this->CID;
    }
    public function getNick () {
        return $this->Nick;
    }
    public function getQRFileName () {
        return $this->QRFileName;
    }
    public function getRegDate () {
        return $this->regDate;
    }
    public function getManagerName () {
        return $this->ManagerName;
    }
    public function getManagerPhone () {
        return $this->ManagerPhone;
    }
    public function getCity () {
        return $this->City;
    }
    public function getAddr () {
        return $this->Addr;
    }
    public function getnotes () {
        return $this->notes;
    }
    public function getCountOfFB () {
        return $this->notes;
    }


    public function changeAnketa($questions) {
    // Пересоздает анкету для данного объекта. 
    // Один обект = одна анкета. В один момент времени не может быть больше одной анкеты 
    // Удаляем предыдущую анкету
        $query="DELETE FROM Questions where OID='$this->OID';";
        $data = mysqli_query($this->dbLink, $query);


        foreach ($questions as $q) {
            $query="INSERT INTO Questions (OID, Qestion) VALUE ('$this->OID','$q');"; 
            $data = mysqli_query($this->dbLink, $query);
//            echo mysqli_error ($this->dbLink);        
        }
    }
    public function ShowFeedBackAsTables() {
        echo $this->FBacks;

    }

    // !!Нужен метод для изменения свойств объекта;

} // class Objets
