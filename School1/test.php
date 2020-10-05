


<?php 
require_once 'database/dbConfig.php';

$result = $db->query("SELECT * FROM classe WHERE id='19' ");
 if($result->num_rows > 0){?>
   <?php while($row = $result->fetch_assoc()){
                     $image=$row['emplois'];
                     ?>
                     
                            <img width="1000" height="1000" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/> 
                            <?php } ?>
                            <?php } else{
                                echo 'faute';
                            }
                            
                            ?>    
    