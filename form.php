<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');


$errors=FALSE;
if(empty($_POST['name'])){
    
    $errors=TRUE;
}
if(empty($_POST['email'])){
    
    $errors=TRUE;
}

if (empty($_POST['date'])) {
  
    $errors = TRUE;
}


if(empty($_POST['gender'])){
  
    $errors=TRUE;
}

switch($_POST['gender']) {
    case 'women': {
        $gender='women';
        break;
    }
    case 'men':{
        $gender='men';
        break;
    }
};

if (empty($_POST['body'])) {
    $errors = TRUE;
}

switch($_POST['body']) {
    case 'one': {
        $body='one';
        break;
    }
    case 'two':{
        $body='two';
        break;
    }
    case 'three':{
        $body='three';
        break;
    }
    case 'four':{
        $body='four';
        break;
    }
    case 'five':{
        $body='five';
        break;
    }
};

if (empty($_POST['force'])) {
   
    $errors = TRUE;
}
$power1=in_array('1',$_POST['force']) ? '1' : '0';
$power2=in_array('2',$_POST['force']) ? '1' : '0';
$power3=in_array('3',$_POST['force']) ? '1' : '0';

if (empty($_POST['bio'])){
   
    $errors= TRUE;
}



$user='u46981';
$pass='3843607';
$db = new PDO("mysql:host=localhost;dbname=u46981",$user,$pass,array(PDO::ATTR_PERSISTENT => true));

    $stmt = $db->prepare("INSERT INTO application SET name = ?,email=?,date =?,gender=?,body=?,life=?,teleport=?,fly=?,bio=?");
 
if( $stmt -> execute(array($_POST['name'],$_POST['email'],$_POST['date'],$gender,$body,$power1,$power2,$power3,$_POST['bio']))){
    $massage="Данные сохранены!";
}else{
    $massage="Возникла ошибка!";
}

$response=['massage'=>$massage];
header('Content-typy: application/json');
echo json_encode($response);
?>