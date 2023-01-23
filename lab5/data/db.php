<?php
    $connect = mysqli_connect('localhost', 'root', '', 'lab5');
    if ($connect){
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }else{
        echo 'Не удалось соедениться с БД';
    }

?>
