<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'tvalidate.php';
include 'conn.php';

if(isset($_POST['tid'])){
    $sql="select rent from tenant where id=$tid";
    if($result= mysqli_query($con, $sql)){
        $row =$result->fetch_assoc();
        $rent=$row['rent'];
    }
    
    $qry="insert into transaction (tid,date,amount) values('$tid',CURDATE(),'$rent')";
    $run=mysqli_query($con,$qry);
    if($run=TRUE){
        ?>
<script>
        alert('Payment Successfull !!');
        window.open('tenant.php','_self');
        
        </script>
        <?php
}
}
?>
