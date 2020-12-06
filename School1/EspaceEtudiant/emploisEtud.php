<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['idEtu']) or !isset($_SESSION['mailEtu'])  ){
      header("location:/School1/EspaceEtudiant/index.php");
     

      die();
   }
// include ('../lang/fb.php');
// require_once '../database/dbConfig.php'; 
// require_once '../database/function.php';
// include("../function/func.php");
// include('session.php');
   // if(!isset($_SESSION['idEtu']) or !isset($_SESSION['mailEtu'])  ){
   //    header("location:/School1/EspaceEtudiant/index.php");
     

   //    die();
   // }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EmploisEtudiant</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
<?php
$param='gesT';
 require 'defaultEtud.php';
$id_Etudiant=$_SESSION['CIN'];
$id_Class=$_SESSION['id_class'];


$Days=array ('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','Dimanche');
   $CIN=$_SESSION['idP']; 
   $sql = mysqli_query($db,"SELECT * from classe where id =$id_Class ");
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $classe=$row['nom'];
   
   $result = $db->query("SELECT * FROM emplois  where classID=$id_Class order by timeD "); 
           $count=$result->num_rows; 
           if ($count>0) {
                  
                    
     ?>         
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase">Emploi du temps de la classe <?=strtoupper($classe) ?></h6>
    </div>
            
               
        </div>      
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-danger">
                <tr>
                <th scope="col">Temps</th>
                <?php for ($i = 0; $i <count($Days); $i++){?>
                <th scope="col"><?php echo $Days[$i] ?></th>
                <?php } ?>
                </tr>
            </thead>
            <tbody>
    <?php while($row = $result->fetch_assoc()){ extract($row);
                      $id=$idEmp;//echo $id;
                      $day=$jour;
                      $sl=$salle;
                      $col=$color;
                      $colt=$colorT;//echo $col;
                      $dd=date('d/m/Y',strtotime($dateD));
                      $df=date('d/m/Y',strtotime($dateF));
                      $td=date('G:i',strtotime($timeD));
                      $tf=date('G:i',strtotime($timeF));
                      $pr=$prof;
                      $mat=$mat;?>
                      <?php //for ($i = 0; $i <$count; $i++){ ?>
    <tr>


      <th class="table-info" style=" " scope="row"><?=htmlspecialchars($td).'-'.htmlspecialchars($tf) ; ?></th>
       <?php for ($j = 0; $j <count($Days); $j++){?>
                    <td scope="row" style=" ">
                     <?php if ($day==$Days[$j]) {
                      ?><div style="background-color:<?php echo htmlspecialchars($col) ; ?>;color:<?php echo htmlspecialchars($colt) ; ?> ">
                       <?php echo 'Matiere: '. $mat;
                              echo "<br><i style='text-align:left'>salle: ". $sl."</i>";
                              echo '<br>prof: '. $pr;
                              ?></div>
                              <?php
                    }
                          ?> 
                         
                    </td>
                    
                      
                   
                    <?php } ?>
   
      
      
      <?php $i++; ?>
      <?php } //} ?>
    </tr>
  </tbody>
  </table>  <?php } 
  else
{ 
        
          
            echo '<div style="background-color:#FAEBD7; font-size:40px; border-color: #849460 ;border-style:solid;
          border-width: 2px; border-radius: 10px; width:900px;height:200px; margin:auto; text-align:center; padding-left:20px;">'."Il n y a pas d'emploi du temps en ce moments pour la classe ".ucwords($classe)."</div>";
                     
}
// $result = $db->query("SELECT * FROM classe WHERE id='$id_Class' and emplois is not null ");
//  if($result->num_rows > 0){
//     while($row = $result->fetch_assoc()){
//          $image=$row['emplois'];
//          $classe=$row['nom'];

//           echo '<div style=" font-size:20px; border-color: #849460 ;border-style:solid;
//           border-width: 2px;  margin:auto; text-align:center; padding-left:20px;">' .ucwords($classe);
//          ?>               
         <!-- img width="1000" height="1000" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/>  -->
     <?php// } ?>
 <?php // } else{ $result1 = $db->query("SELECT * FROM classe WHERE id='$id_Class' and emplois is  null ");
//         if($result1->num_rows > 0)
//         {
//           while($row = $result1->fetch_assoc())
//           {$classe=$row['nom'];
          
//             echo '<div style="background-color:#FAEBD7; font-size:40px; border-color: #849460 ;border-style:solid;
//           border-width: 2px; border-radius: 10px; width:900px;height:200px; margin:auto; text-align:center; padding-left:20px;">'."Il n y a pas d'emploi du temps en ce moments pour la classe ".ucwords($classe)."</div>";
//           }      

//         }      }                   
 ?>    
    





<!-- java Script script-->
<script src="EspaceAdmin/js/AjouterEtud.js?2"></script>
<script src="EspaceAdmin/js/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/AjouterEtud.js?2"></script>
<!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
