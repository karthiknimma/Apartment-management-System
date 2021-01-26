<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if(!isset($_SESSION['tid'])){
    header('location:tlogin.php');
    die();
}
$tid=$_SESSION['tid'];
