<?php
include './conn.php';

$id=$_GET['id'];

$sql='UPDATE `todo` SET `status`=? WHERE id=?';
$exc=$pdo->prepare($sql);
$exc->execute(array('true',$id));
header('Location: index.php');
?>