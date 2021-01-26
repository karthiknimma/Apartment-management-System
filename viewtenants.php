<?php
include 'ovalidate.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>Apartment management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
</head>
<body style="background-image:url('img/15.jpg') ;background-repeat: no-repeat;background-size: cover;linear-gradient(to right, #3E5151 , #DECBA4);">
    <?php
    include 'onav.php';
    include 'conn.php';
    if(isset($_GET['delete']))
  {

       $id= $_GET['id'];

       //CODE TO DELETE DATA FROM MULTIPLE TABLES
        // $qry1="DELETE FROM tenant INNER JOIN transaction
        //       WHERE tenant.id='$id' and transaction.tid = '$tid'";
        // $run1=mysqli_query($con,$qry1);
     $qry1="DELETE FROM tenant WHERE id=$id";
      $run= mysqli_query($con,$qry1);
  }
    ?>
    <div  style="background-size: cover;background-repeat: no-repeat;width: 95%; height:80% ;margin-left: 2%;margin-top: 1.5%;//box-shadow: 0px 0px 5px #660066;padding:20px">
         <div class="wrap-table100">
        <div class="table100" style="margin-top: 05%">
    <table class="table" style="margin-left: 04%" id="table">
     <thead class="thead-dark" style="color: #fff;">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Building</th>
        <th>Apartment</th>
        <th>Rent</th>
        <th>Date</th>
          <th>Delete</th>
        </thead>
        <tbody>

                     <?php
         include 'conn.php';
         $sql = "select tenant.id,tenant.name tname, tenant.email, tenant.mobile, tenant.rent, building.Name bname, tenant.date,apartment.apartmentNum from tenant join building on tenant.building=building.id join apartment on tenant.apartment=apartment.id where oid = $oid ";
         if ($result = $con->query($sql)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {

        ?>
            <tr>

                <td><?php echo $row['id']?></td>
                <td><?php echo $row['tname']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['mobile']?></td>
                 <td><?php echo $row['bname']?></td>
                 <td><?php echo $row['apartmentNum']?></td>
                 <td><?php echo $row['rent']?></td>
                 <td><?php echo $row['date']?></td>
                 <td><a href="viewtenants.php?delete=true&id=<?php  echo $row['id'];?>"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            <?php


    }

    /* free result set */
    $result->close();
}



         ?>

        </tbody>

    </table>
   </div>
    </div>
    </div>
</body>
