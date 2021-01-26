<?php
include 'avalidate.php';
include 'conn.php';
$message = '';
//For update
$id = $name= $add= $dev = "";
if(isset($_GET['update'])){

 $id= filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $sql = "select * from building where id=$id;";
                $result=mysqli_query($con,$sql);
                if($result){
                    if($row = $result->fetch_assoc()){
                        $id= $row['id'];
                         $name= $row['Name'];
                          $add= $row['Address'];
                           $dev= $row['Developer'];
                    }
                    }

}

// for new record
if(isset($_POST['submit'])){

    $name=$_POST['bname'];
    $address=$_POST['address'];
    $developer=$_POST['developer'];

    if(isset($_POST['id']) && $_POST['id']){
        $id= $_POST['id'];
        $check=mysqli_query($con,"select * from building where Name='$name'");
        $checkrows=mysqli_num_rows($check);

        if($checkrows>0) {
            echo "Apartment exists";
            $id = $name= $add= $dev = "";
         }
        else {
        //insert results from the form input
            $qry = "update building set Name='$name',Address='$address',Developer='$developer' where id=$id";
            $message = 'Record Updated successfully.';
            $result = mysqli_query($con, $qry) or die('Error querying database.');
            echo "Apartment Updated";
            $id = $name= $add= $dev = "";

        }
    }
    else{
    	   $check=mysqli_query($con,"select * from building where Name='$name'");
        $checkrows=mysqli_num_rows($check);

        if($checkrows>0) {
            echo "Apartment exists";
            $id = $name= $add= $dev = "";
         }
        else {
        //insert results from the form input

         $qry="insert into building(Name,Address,Developer) values('$name','$address','$developer')";
         $run=mysqli_query($con,$qry);
         $message = 'Record inserted successfully.';
         echo "<script type='text/javascript'>alert('$message');</script>";
         $id = $name= $add= $dev = "";

        }
     }
//     echo $qry;
    // $run=mysqli_query($con,$qry);
    // if($run==true){
    //     if(isset($_POST['id'])){
    //             echo 'Record inserted';
    //             // $message = "wrong answer";
    //             // echo "<script type='text/javascript'>alert('$message');</script>";
    //     $id = $name= $add= $dev = "";
    //     }else{

    //          echo "Record Updated";
    //     }
    // }
    // else{
    //     $message = 'Something went wrong.';
    //     echo 'Error executing query';
    // }
}
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
</head>
    </head>
    <body style="background-image:url('img/5.jpg') ; background-size: cover; background-repeat: no-repeat;">
        <?php
        include 'anav.php';
        ?>

        <div class="row">
         <div class="col-md-4">
        <div style=" margin-top: 1.5%;box-shadow: 0px 0px 5px #34495e;padding:20px">
        <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Create New Building</div>
        <div style="display: none;" class="alert-message"><?php echo $message ;?></div>
        <form class="form-horizontal" action="building.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div class="form-group" style="margin-top: 5px">
    <span style="color:white"><label class="control-label col-sm-2"  for="building">Building:</label></span>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="bname" required placeholder="Enter building Name" value="<?php echo $name;?>"/><br>
    </div>
            </div>

            <div class="form-group" style="margin-top: 1px">
    <span style="color:white"><label class="control-label col-sm-2" for="building">Address:</label></span>
    <div class="col-sm-10" >
            <input type="text" class="form-control" required name="address" placeholder="Enter address" value="<?php echo $add;?>"/><br>
    </div>
            </div>

            <div class="form-group" style="margin-top: 1px">
    <span style="color:white"><label class="control-label col-sm-2" for="building">Developer:</label></span>
    <div class="col-sm-10" >
            <input type="text" class="form-control" name="developer" required placeholder="Developer Name" value="<?php echo $dev;?>"/><br>
    </div>
            </div>
            <button class="btn btn-warning" type="submit" name="submit" value="add">Submit</button>
        </form>
        </div>
        </div>
            <div class="col-md-8">
                <div>
        <table class="table table-hover table-condensed table-responsive"style="margin-top: 5%">
            <thead style="background: #34495e;color:white">
            <th>ID</th>
             <th>Name</th>
              <th>Address</th>
               <th>Developer</th>
               <th>Update</th>
               <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from building;";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){

                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['Developer'];?></td>
                    <td><a href="building.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deleteBuilding.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php
                }
                }
                ?>
            </tbody>
        </table>
                    </div>
                </div>
        </div>
        <script>
            $(document).ready(function() {
                var msg = $('.alert-message').text();
                console.log();
                console.log(msg);
                if(msg !== ''){
                    alert(msg);
                }
                var deletemsg = "<?php echo $_SESSION['alert_message'];?>";
                var destroymsg = "<?php unset($_SESSION['alert_message']);?>";
                if(deletemsg != ''){
                    alert(deletemsg);
                }
            });
        </script>
    </body>
</html>
