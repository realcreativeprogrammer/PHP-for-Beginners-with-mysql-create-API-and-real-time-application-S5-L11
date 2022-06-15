<?php
include './conn.php';

$id=$_GET['id'];
$sql='DELETE FROM `todo` WHERE id=?';
$exc=$pdo->prepare($sql);
$exc->execute(array($id));
header('Location: index.php');
?>