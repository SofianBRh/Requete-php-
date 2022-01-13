<?php 

if(isset($_GET['id']))
{  $id=$_GET['id'];
    $myssqlClient =new PDO('mysql:host=localhost;dbname=Vapo;charset=utf8', 'soso', 'Pokemon');
    $myssqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$myssqlClient -> query ("DELETE FROM `inventory` WHERE `id`= $id");
}
header('location:index.php');








?>