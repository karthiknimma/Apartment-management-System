<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset( $_POST['email']) && isset($_POST['pwd'])){
$email = $_POST['email'];
$pwd = $_POST['pwd'];
include 'conn.php';

if(isset($_POST['adminBtn'])){
$sql = "select * from admin where email='$email' and password='$pwd'";
}else if(isset($_POST['ownerBtn'])){
$sql = "select * from owner where email='$email' and password='$pwd'";
}else if(isset($_POST['tenantBtn'])){
$sql = "select * from tenant where email='$email' and password='$pwd'";
}

$result = $con->query($sql);
if($result->num_rows>0){
  // User is valid 
    session_start();
    if(isset($_POST['adminBtn'])){
    $_SESSION['alogin']=true;
    header('location:building.php');
    }else if(isset($_POST['ownerBtn'])){
        $row = $result->fetch_assoc();
         $_SESSION['oid']= $row['id'];
         header('location:odashboard.php');
    }else if(isset($_POST['tenantBtn'])){
            $row = $result->fetch_assoc();
             $_SESSION['tid']= $row['id'];
             header('location:tenant.php');
    }
    
}else{
    //invalid user
    die('Invalid credentials');

    
}
}