<?php
include 'ovalidate.php';
?>
<html>
    <head>
        <title>Apartment management</title>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <style>
      #img {
    opacity: 0.5;
    filter: alpha(opacity=50); /* For IE8 and earlier */
}
  </style>
</head>
    <body>
        <?php
        include 'onav.php';
        include 'conn.php';

        if(isset($_POST['submit'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $pass= $_POST['pass'];
            $mobile= $_POST['mobile'];
            $building=$_POST['building'];
            $apartment=$_POST['apartment'];
            $rent=$_POST['rent'];

            $qry="insert into tenant(name,email,password,mobile,building,apartment,rent,date,oid) value('$name','$email','$pass','$mobile','$building','$apartment','$rent',CURDATE(),'$oid');";
            $run= mysqli_query($con,$qry);
            if($run==TRUE){
                //echo 'Record Inserted';
				 $message = "Record Inserted!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

        }
         ?>
        <div  style=" background-image: url('img/14.jpg');background-size:cover;background-attachment: fixed;background-repeat: no-repeat;width: 100%; height:100% ;margin-left: 0%;margin-top: 0%;//box-shadow: 0px 0px 5px #660066;//padding:20px">
            <div>
                <form class="form-horizontal" action="tenantReg.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <center><legend>
                Tenant Registration
            </legend></center>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input style="width: 110%;height: 40px" name="name" placeholder=" Name" required class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  name="email" style="width: 110%;height: 40px" placeholder="you@example.org" required class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input  name="pass" style="width: 110%;height: 40px" placeholder=" Password" required class="form-control"  type="text" value="" >
    </div>
  </div>
</div>
            <div class="form-group" style="margin-left: 10%">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="mobile" style="width: 110%;height: 40px" placeholder=" +91<10 digit>" required class="form-control"  type="text" value="" >
    </div>
  </div>
</div>



            <select class="form-control" style="display:inline; margin-left: 140px; width: 20%;" name="building" id="building">
                 <option>Select Building</option>
                    <?php
                                include 'conn.php';
                                $qry="SELECT building.id bid, building.Name bname, apartment.apartmentNum from apartment JOIN owner ON owner.owned=apartment.id JOIN building ON building.id=apartment.bid WHERE owner.id=$oid";
                                if ($result = $con->query($qry)) {

    /* fetch object array */
    while ($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['bid' ]; ?>"><?php echo $row['bname']; ?>
                        </option>
               <?php
    }
    }
    ?> </select>

           <select class="form-control" style="display:inline; width: 20%;" name="apartment" id="aprt">
                 <option>Select Building first</option>


             </select>

            <div class="form-group" style="margin-left: 10%;margin-top: 20px">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
  <input  name="rent" style="width: 110%;height: 40px" placeholder=" Rent Amount" required="" class="form-control"  type="text" value="" >
    </div>
  </div>
</div>

            <button style="margin-left: 80%; margin-top: 20px" type='submit' class="btn btn-warning" name="submit" value="submit">Register</button>
            </form>
            </div>
        </div>

         <script>
//      let planrates = new Map();
          $("#building").change(function(){
                    console.log("Reached building change");
                    var bid=$("#building").val();
                      console.log("bid:"+bid);
            $.get("restful/getAprtsTenant.php?bid="+bid, function(data, status){

                $('#aprt').html(data);
                console.log("success");
            });
         });
         </script>

    </body>
