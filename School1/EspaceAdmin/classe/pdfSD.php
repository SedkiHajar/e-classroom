<?php 
session_start();
error_reporting(0);
include ('../../lang/fb.php');
// Include the database configuration file  
require_once '../../database/dbConfig.php'; 
 require_once '../../database/function.php';
include("../../function/func.php");
// Get image data from database 

 $id=$_GET['id'];
$result = $db->query("SELECT * FROM tableSD WHERE id=$id  "); 
?>
<?php if($result->num_rows > 0){ ?>
          
        
         <?php while($row = $result->fetch_assoc()){ ?> 
         	<?php //$type= $_FILES[$row['support']]['tmp_name'] ?>
            <object width="100%" height="100%" data="data:application/pdf;base64,<?php echo base64_encode($row['nom']) ?>" type="application/pdf"  ></object>
                 <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>