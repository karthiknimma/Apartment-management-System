<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET['bid'])){
    
        $bid=$_GET['bid'];
        include '../conn.php';
         $qry="select * from apartment where bid=$bid and id Not In(select owned from owner) order by apartmentNum ASC;";
         $result = $con->query($qry);
                                if (mysqli_num_rows($result) > 0) {
                                   
                                    
    /* fetch object array */
                                    ?>

<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                       
                        <option value=" " >Select Apartment</option>        
      <?php
    while ($row = $result->fetch_assoc()) {
                    ?>
     
                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['apartmentNum']; ?>
                        </option>
                   
                        
               <?php 
    }
    ?>
    
<?php
}else{
    echo ' <option value=" " >No Apartments Left for allocation</option>        ';
}
}
               ?> 

