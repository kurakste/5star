<?php

        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $sdd_db_host='127.0.0.1';//Имя хоста
        $sdd_db_user='usr45star';//Пользователь
        $sdd_db_pass='pass1word';//Пароль
        $sdd_db_name='5star'; // Название бд
        $this->dbLink=mysqli_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass, $sdd_db_name);//Подключение
         //   echo mysqli_error ($this->dbLink);        
        //$link=mysqli_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass, $sdd_db_name);//Подключение

        mysqli_query ($this->dbLink, "set_client='utf8'");//Следующие 4 строки решают проблему с кодировкой.
        mysqli_query ($this->dbLink, "set character_set_results='utf8'");
        mysqli_query ($this->dbLink, "set collation_connection='utf8_general_ci'");
        mysqli_query ($this->dbLink, "SET NAMES utf8"); 
