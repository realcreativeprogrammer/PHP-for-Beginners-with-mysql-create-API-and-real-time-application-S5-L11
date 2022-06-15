<?php
try{
    $pdo=new PDO('mysql:host=localhost;dbname=todo','root','');
    // echo 'you are connected ';
}catch(PDOException $e){
    echo 'we have error'.$e->getMessage();
}

?>