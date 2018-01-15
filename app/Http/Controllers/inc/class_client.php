<?php
namespace class_client;
require_once('class_objects.php');
use class_objects\objects;

class Client {
    private $DEFOLT_QUESTIONS = ['Оцените по пятибальной шкале как вас обслуживали в нашем заведении:',
             'Оцените по пятибальной шкале качество продукта:'];
    private $CID;
    private $VID;
    private $RegDate;
    private $NUser;
    private $PUser;
    private $City;
    private $Balance;
    private $dbLink;
    private $objects = array();
    
    public function __construct($cid){
        require('base_inc.php'); 
        $query="SELECT RegDate,VID,NUser, PUser, CITY FROM Clients WHERE CID='$cid';";
        $data = mysqli_query($this->dbLink, $query);
        if ($data) {
            $row =mysqli_fetch_assoc($data);
            $this->CID=$cid;
            $this->VID=$row['VID'];
            $this->RegDate=$row['RegDate'];
            $this->NUser=$row['NUser'];
            $this->PUser=$row['PUser'];
            $this->City=$row['CITY']; 

            $query="SELECT OID FROM Objects WHERE CID='$cid';";
            $data = mysqli_query($this->dbLink, $query);

                while ($row = mysqli_fetch_assoc($data)) {
                    $this->objects[]= new Objects($row['OID']);
                }

            $query="SELECT SUM(Sum) as sum FROM Bills WHERE CID='$cid';";
            $data = mysqli_query($this->dbLink, $query);
            $row =mysqli_fetch_assoc($data);
            $this->Balance = $row['sum']; }
    } 
    
    public function getClientDataAsArray() {
        $out=[
            'CID'=>$this->CID,
            'VID'=>$this->VID,
            'RegDate'=>$this->RegDate,
            'NUser'=>$this->NUser,
            'PUser'=>$this->PUser,
            'City'=>$this->City,
            'Balance'=>$this->Balance,
            'objects'=>$this->objects
        ];
        return $out;
    } 
    
    public function __toString() {
        $objcount=count($this->objects);
        $objStr="";

        $objStr="<hr><br>";
        foreach ($this->objects as $val) {
            $objStr=$objStr.$val.
            "<br><hr><br>"; 
        };
        
        return "
        <div style='width:340px'>
        CID:          $this->CID <br>
        VID:          $this->VID <br>
        RegDate:      $this->RegDate<br>
        NUser:        $this->NUser<br>
        PUser:        $this->PUser<br>
        City:         $this->City<br>
        Balance:      $this->Balance<br>

        Кол-во зарегистрированных объектов $objcount:<br> 
            
        ".$objStr."</div>";
    }

    public function changeObject($OID, $Nick,$RegDate, $ManagerName,
        $ManagerPhone, $City, $Addr, $notes) {

        $query="UPDATE Objects SET Nick='$Nick',
                                 ManagerName='$ManagerName',
                                 ManagerPhone='$ManagerPhone',
                                 City='$City',
                                 Addr='$Addr',
                                 notes='$Note' 
            WHERE OID='$OID';";
        echo $query;

        $data = mysqli_query($this->dbLink, $query);
    }
    
    public function addObject($Nick,$ManagerName,
        $ManagerPhone, $City, $Addr, $notes) {
        $RegDate=Date('d.m.Y');
        $QRFilename=$Nick.".png"; 
        echo $QRFilename; echo "<br>";
        echo strlen($QRFilename); echo "<br>";
        $query ="INSERT INTO 
        Objects(CID,Nick,QRFilename,RegDate,ManagerName,ManagerPhone,City,Addr,notes) 
        VALUES ('$this->CID', '$Nick','$QRFilename', '$RegDate', '$ManagerName', '$ManagerPhone',
                 '$City', '$Addr','$notes');"; 
        $data = mysqli_query($this->dbLink, $query);
        $OID =mysqli_insert_id($this->dbLink); 
        echo $OID; echo "<br>";
        echo mysqli_error ($this->dbLink);        
        echo "<br>";

        foreach ($this->DEFOLT_QUESTIONS as $Q) {
        //создаем анкету по умолчаниию
            $query="INSERT INTO Questions (OID, Question) VALUE ($OID, '$Q');";
            $data = mysqli_query($this->dbLink, $query);
            echo mysqli_error ($this->dbLink);        
            echo "<br>";
        }
        }

    public function delObject ($OID) {
        $query ="DELETE FROM Objects WHERE OID='$OID';";
        $data = mysqli_query($this->dbLink, $query);
    }
    
    public function changeAnketa($obj, $questions) { // $obj - порядковый номер объекта в массиве
        $this->objects[$obj]->changeAnketa($questions);
    }

    public function renderCodeForView () {
    // Функция генерирует html код, который должен быть помещен внутрь DIV в html файле

    }
} // class Client 
