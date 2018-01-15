<?php
namespace class_feedback;
// Здесь два класса. Один нужен для создания нового фидбека NewFeedback^
// На входе он принимает OID и пары {вопрос:ответ} и делает записи в таблицах. 
// Второй класс  FeedBacks принимает OID и продгружает всю обратную связь которая есть для
// этого объекта. Это объект содержит методы по удалению обратной связи. 
//
// Все формы и таблицы которые которые выводит этот объект обернуты в Div классом FeedBacks
// CreateForm - создает ленточную форму обратной связи;
// Repports - Выводит таблицу с средним балом по каждому опросу. 
// Answer (FID) выводит таблицу с вопросами и ответами.

//==============================================================================================
// Эксземпляр этого класса создаст в таблице новый фитбек для конкретного OID);

class NewFeedBack {
    private $OID;
    private $dbLink;
    private $questions;
    private $questionsHtml;

    public function __construct ($OID) {
        $this->OID=$OID;
        require_once('base_inc.php'); 
        $query="SELECT Question FROM ons WHERE OID like '$this->OID';";
        $data = mysqli_query($this->dbLink, $query);
        echo mysqli_error ($s>dbLink);        
        $questionsHtml="---Questions: <br>";
        while ($row =mysqli_fetch_assoc($data)) {
            $this->questions[]=$row['Question'];
            $this->questionsHtml=$this->questionsHtml."-".$row['Question']."<br>";
        };
    }//constructor

    

    public function ShowQuestions () {
        echo $this->questionsHtml;
    }

    public function addFeedback ($A, $comment ,$phone, $name) {
        //!! Требуется переписать метод
        // Здесь я передаю в функцию словарь ворос/ответ. Это как-то неуклюже.
        //Нужно передавать одтветы, вопросы брать из объекта.
        require('base_inc.php'); 
        $today=date('d.m.Y');
        $Now=  date('H:i:s');
        
        $query="INSERT INTO Feedback (OID, FDate, FTime, Phone, Name, Comment) 
            VALUES ('$OID','$today','$Now', '$phone', '$name','$comment');";
        $data = mysqli_query($this->dbLink, $query);
        $ID=mysqli_insert_id ($this->dbLink);
        //echo mysqli_error ($this->dbLink);        
        //echo "<br>";
            
        foreach ($QA as $Q=>$A) {
            $query="INSERT INTO Answer (FID, Question, Answer) 
                VALUES ('$ID','$Q','$A');";
          //  echo $query; 
          //  echo "<br>";
            $data = mysqli_query($this->dbLink, $query);
            }
    }
    public function CreateForm ($path){
    //$path - путь к страничке, в которую будут переданы данные из формы//
           $form = " 
           <div class='container'>  
              <form id='Object' action='$path' method='post'>
                <h4>Расскажите нам о нашем сервисе!</h4>";
            $counter=0;
            $InputName='';

            foreach ($this->questions as $quastion) {
                $counter++;
                $InputName='Question_'.$counter;
                $form = $form." 
                <fieldset>
                  <label>$quastion</label>
                  <input name='$InputName' placeholder='ведите оценку от 1 до 5-ти' type='text' value=''>
                  </fieldset> ";
            };
            $form.= "
                <fieldset>
                <label>Дополнительно:</label>
                <textarea name='Note' rows='8' cols='40'></textarea>
                </fieldset>
                <fieldset>
                  <button name='submit' type='submit' id='FeedBack-submit' data-submit='...Sending'>Отправить</button>
                </fieldset>
            </form> ";
            echo $form;
    }
}
//==============================================================================================
// Repports - Выводит таблицу с средним балом по каждому опросу. 
// Answer (FID) выводит таблицу с вопросами и ответами.
class FeedBacks {
    
    private $OID;
    private $CountOfFB;
    public  $dbLink;
    private $HtmlTable;


    public function __construct ($OID) {
        $this->OID=$OID;
        require('base_inc.php'); 
        $query="SELECT OID, FDate, Name, Phone, _avg FROM (SELECT FeedBack.*, round (avg(Answer.Answer),2) as _avg, count(Answer.FID) as _count FROM FeedBack LEFT JOIN `Answer` ON Answer.FID=FeedBack.FID GROUP BY FeedBack.`FID`) as NEWTAB WHERE OID LIKE '$OID';"; 
        //var_dump ($this);
        $data = mysqli_query($this->dbLink, $query);
        $this->CountOfFB=mysqli_num_rows($data);
          // echo mysqli_error ($this->dbLink);        
          // echo "<br>";

           $this->HtmlTable="<Table Class='FeedBack'>
                    <tr><th>Дата</th><th>Имя</th><th>Телефон</th><th>Сред. бал</th></tr>";

            while ($row =mysqli_fetch_assoc($data)) {
                $this->HtmlTable=$this->HtmlTable. 
                "<tr><td>{$row['FDate']}</td><td>{$row['Name']}</td><td>{$row['Phone']}</td><td>{$row['_avg']}</td></tr>";
                }
            $this->HtmlTable.="</table> <!-- FeedBack --->";
        
    }

    public function __toString () {
        return $this->HtmlTable;
    }
    public function getFBCount() {
        return $this->CountOfFB;
    }
}
//==============================================================================================
