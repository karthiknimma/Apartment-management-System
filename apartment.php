<?php
include 'conn.php';
$apartmentExists = false;
$apaermentupdated = false;
$id=0;
$bid=$aname=$desc="";
if(isset($_GET['update'])){
    $id = $_GET['id'];
     $qry="select * from apartment where id=$id";
  if ($result = $con->query($qry)) {

    /* fetch object array */

    if ($row = $result->fetch_assoc()) {
    $bid=$row['bid'];
    $aname=$row['apartmentNum'];
    $desc=$row['description'];
    }
    }
           }

if(isset($_POST['submit'])){
    $bid=$_POST['building'];
    $aname=$_POST['apartment'];
    $desc=$_POST['desc'];
    $id= $_POST['id'];

    if($id){
     $qry="Update apartment set bid='$bid',apartmentNum='$aname',description='$desc' where id='$id'";
     $id=0;
     $bid=$aname=$desc="";
     $result = mysqli_query($con, $qry);
     if(mysqli_error($con)){
        $apartmentExists = true;
        echo "Apartment Already exists";
     }else{
      $apaermentupdated = true;
        echo "Apartment Updated";
     }

    }else{
    	 $check=mysqli_query($con,"select * from apartment where apartmentNum='$aname' and bid='$bid'");
        $checkrows=mysqli_num_rows($check);

       if($checkrows>0) {
          $apartmentExists = true;
          echo "<b>Apartment exists</b>";
       }
       else {
        //insert results from the form input
          $query = "INSERT IGNORE INTO apartment(bid,apartmentNum,description) VALUES('$bid','$aname','$desc')";

          $result = mysqli_query($con, $query);
          if(mysqli_error($con)){
            $apartmentExists = true;
          echo "Apartment already exists";
          }else{
            $apaermentupdated = true;
          echo "Apartment Added";
          }


        }
    // $qry="insert into apartment(bid,apartmentNum,description) values('$bid','$aname','$desc')";
    // }
    // $run=mysqli_query($con,$qry);
    // if($run==true){
    //     echo'Success!';
    }
}
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
    <body style="background-image:url('img/6.jpg'); background-size: cover; background-repeat: no-repeat;"linear-gradient(to right, #3E5151 , #DECBA4);">
     <?php
     include 'anav.php';
     ?>
        <div class="row">
         <div class="col-md-4">
       <div style="width: 400px;margin-left:4%;margin-top: 1.5%;box-shadow: 0px 0px 5px #27ae60;padding:20px">
        <div style='text-align: center;padding:20px;background:  linear-gradient(To top right,#033,#3cc);color:white;border-radius: 25% 25% 0% 0%'>Enter Apartment</div>
        <form class="form-horizontal" action="apartment.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <div style="padding-top: 20px;margin-left: 25%">
                <select class="form-control" style="display:inline; width: 80%;" name="building">
                    <label class="control-label col-sm-2" for="apartment">Building:</label>
                     <option <?php if(!$bid){echo 'selected';}?> >Select Building</option>
                    <?php
                                include 'conn.php';
                                $qry="select * from building";
                                if ($result = $con->query($qry)) {

    /* fetch object array */

    while ($row = $result->fetch_assoc()) {
                    ?>

                     <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$bid){echo 'selected';}?> ><?php echo "BID-".$row['id'].' '.$row['Name']; ?>
                        </option>
               <?php
    }
    }
    ?> </select>
            </div><br>
    <div class="form-group" style="margin-top: 5px">
    <label class="control-label col-sm-1" for="apartment">Apartment:</label>
    <div class="col-sm-10" style="margin-top:30px">
        <input type="text" class="form-control" name="apartment" required="" pattern="[0-9]{3}" placeholder="Apartment Number" value="<?php echo $aname;?>"/><br>
    </div>
            </div>
            <div style="margin-left: 60px;">
            <div class="form-group" style="margin-top: 2px">

    <div class="col-sm-10" style="margin-top:0.1px">
        <label class="control-label col-sm-2" for="apartment">Description:</label>
        <textarea class="form-control" name="desc" required="" placeholder="Description" ><?php echo $desc;?></textarea><br>
    </div>
            </div>
            </div>
             <button class="btn btn-warning"col-sm-5 type="submit" name="submit" value="add">Submit</button>
        </form>
      </div>
         </div>
        <div class="col-md-6">
                <div>
        <table class="table table-hover table-condensed" style="margin-top: 5%">
            <thead style="background: #660066;color:white">
            <th>ID</th>
             <th>Building Name</th>
              <th>Apartment Num</th>
              <th>Description</th>
              <th>Update</th>
              <th>Delete</th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT apartment.id, building.Name, apartment.apartmentNum, apartment.description FROM apartment JOIN building on apartment.bid=building.id;";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row = $result->fetch_assoc()){


                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['apartmentNum'];?></td>
                    <td><?php echo $row['description']; ?></td>

                    <td><a href="apartment.php?update=1&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="deleteapartment.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php
                }
                }
                ?>
            </tbody>
        </table>
                </div>
                <script>
            $(document).ready(function() {
                var msg = "<?php echo $apartmentExists; ?>";
                var updatedmsg = "<?php echo $apaermentupdated; ?>";

                console.log(msg);
                console.log(updatedmsg);
                if(msg){
                    alert("Apartment Number already Exist.");
                }
                if(updatedmsg){
                    alert("Apartment Records Updated.");
                }
            });
        </script>
    </body>
</html>
