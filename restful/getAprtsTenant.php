<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET['bid'])){
    
        $bid=$_GET['bid'];
        include '../conn.php';
        include '../ovalidate.php';
        
        $tenants = [];
        $aptQ = "select apartment from tenant";
        $queryQ = $con->query($aptQ);
        while($row = $queryQ->fetch_assoc()){
          $tenants[] = $row["apartment"];
        }

        $selectEmail = "select email from owner where id = $oid";
        $result = $con->query($selectEmail);
        $email = $result->fetch_assoc()["email"];
        $roomsQuery = "select owned from owner where email = '$email' ";
        $result = $con->query($roomsQuery);
?>
<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                       
                        <option value=" " >Select Apartment</option>
<?php

        while($row = $result->fetch_assoc()){
          $id = $row['owned'];
          $roomQ = "select * from apartment where id = $id";
          $result1 = $con->query($roomQ);
          $row1 = $result1->fetch_assoc();
          if(!in_array($row1['id'], $tenants)){
            ?>
            <option value="<?php echo $row1['id']; ?>" ><?php echo $row1['apartmentNum']; ?>
                        </option>
            <?php
          }else{
            echo ' <option value=" " >No Apartments Left for allocation</option>';
          }
        }
         $qry="select * from apartment where bid=$bid and id Not In(select apartment from tenant);";
                                if ($result = $con->query($qry)) {
                                   
                                    
    /* fetch object array */
                                    ?>
    
<?php
}else{
    echo ' <option value=" " >No Apartments Left for allocation</option>        ';
}
}
               ?> 

