<?php 
class Application5Stars {
    private $dbLink;
    
    public function __construct(){
       require_once('base_inc.php'); 
    }
    // Задача функции проверить допущен ли пользователь к каждой конкретной странице
    // если нет рендерит страничку регистрации предлагает  либо ввести пин либо сбростить
    // !! функция требует проверки. 
    public function isUserSequre () {
        if (!empty($_POST["phone"])&&!empty($_POST["pin"])) {
            $phone = preg_replace('~\D+~','',$_POST["phone"]); //защита от инъекций
            $pin = preg_replace('~\D+~','',$_POST["pin"]);  


            require_once 'base_inc.php';

            $query = "SELECT NUser, pin_cod FROM Clients WHERE PUser = \"{$phone}\"";
            $data = mysqli_query($link, $query);
            $row1 =mysqli_fetch_assoc($data);
            
            if (!($row1)) {
                            echo "I's very new user. Go to registration form.";
                            exit;
                            }

            if ($data->num_rows>1) {
                                echo "Alam!!!! There are more then one phone";
            }
            
            $etalon_pin = $row1['pin_cod'];
            if ($pin!=$etalon_pin) {
                echo "Не верный пинкод.";
                echo "
                <br>
                <a href='http://localhost:8000'>Назад</a>

                ";
                    exit;
            }
            

            $useragent = $_SERVER ['HTTP_USER_AGENT'];
            $etalon_str=md5(md5($pin).$useragent);
            
            setcookie("phone",$phone,time() + 2592000);
            setcookie("auth_str",$etalon_str, time()+2592000);
            echo  "Well done!";
            exit;

        }
        echo "Не верный пинкод.";
        echo "
            <br>
            <a href='http://localhost:8000'>Назад</a>

        ";
    } 

    public function addClient ($VID, $RegDate, $NUser, $PUser, $City, $pin) {    
        $useragent = $_SERVER ['HTTP_USER_AGENT'];
        $hash=md5(md5($pin).$useragent);

        $query ="INSERT INTO 
            Clients (VID, RegDate, NUser, PUser, CITY, pwd_hash, pin_cod) 
            VALUES ('$VID', '$RegDate', '$NUser', '$PUser',
                     '$City', '$hash','$pin');"; 
        $data = mysqli_query($this->dbLink, $query);
        //echo mysqli_error ($this->dbLink);        
        //echo "<br>";
    }

    public function isNickFree ($Nick) {
        $query ="SELECT CID from Objects WHERE Nick LIKE '$Nick';";
        $data = mysqli_query($this->dbLink, $query);
        $row =mysqli_fetch_assoc($data);
        if ($row==null) {return true; } else {return false;}
        var_dump($row); 
        
    }   
    
    public function addCash ($CID, $chash) {
        $today = date('d.m.Y');
        $query="INSERT INTO Bills (CID,BillDate, Sum, Type, Notes) VALUES 
                                ($CID, '$today', $chash, 'inc', 'входящий платеж');";
        echo $query;

        $data = mysqli_query($this->dbLink, $query);
        echo mysqli_error ($this->dbLink);        
        echo "<br>";
    }

    public function addFeedBack($Nick, $Name, $Phone, $Comment, $A) {
       $query="SELECT OID FROM Objects WHERE Nick like '$Nick';"; 
       $data = mysqli_query($this->dbLink, $query);
       $row=mysqli_fetch_assoc($data);
       $newFB= new NewFeedBack($row['OID']);
       $newFB.addFeedback($Name, $Phone, $Comment, $A);

    }

}
