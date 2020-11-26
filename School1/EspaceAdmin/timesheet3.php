
<?php
include ('../lang/fb.php');
   //session_start();
require_once '../database/dbConfig.php';
   require_once '../database/function.php';
include("../function/func.php");
include('session.php');

    if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
   //echo "ann ".$_SESSION['anneeS'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Emploi temps</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

</head>
<body>
<?php 
$param = "gtime" ;

require 'defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<!-- slect info from table -->
<!-- get date -->
<?php
// if($_SESSION['anneeS']!='null'){
//       $id=$_SESSION['anneeS'];
//       $se=$_GET['id_anneeS'];
      
//       }

//   $_SESSION['anneeS']=$se;
     
      
// $se=$id;
// echo 'an: ';var_dump($_SESSION['anneeS']);
// echo "juse $se";
// echo "anse:  $se";var_dump($_SESSION['anneeS']);
// $_SESSION['anneeS']=$se;
$id=$_GET['id_anneeS'];
$_SESSION['anneeS']=$id;
// $_SESSION['anneeS']=$se;
//$id=$_GET['id_anneeS'];
// print_r($_SESSION['anneeS']);
$_SESSION['emplois'] = $classe;
$do=isset($_GET['do'])?$_GET['do']:$_GET['do']='cl';
//tables
$Days=array ('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','Dimanche');
$time=array('8-9','9-10','10-11','11-12','14-15','15-16','16-17','17-18');
?>
 <div class="col-xl-12 col-lg-12 card shadow mb-4 " style="margin-top:1px;">
        <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?=lang('7') ?></a>
      </div>
<h3 class=" font-weight-bold text-info text-center shadow  titre" style="margin-top: 1px;"> Espace des emplois du temps </h3>

<?php if ($do=='emp'){ ?>
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold; margin-top:1px;">
    <form action="?id_anneeS=<?php echo $_SESSION['anneeS'] ?>&do=shed" role="form" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12" >
                <label for="classe">Choisir une classe </label>
                <select class="custom-select" name="classe" id="">
                    <option selected value="-1">choisir la classe</option>
                    <?php
                    //définir la requete
                    $result = $db->query("SELECT * FROM classe c join annees a where a.idAn=c.anneeS and a.idAdm=$admin ");  
                    // boucle sur les données
                    while ($row =$result->fetch_assoc()) {

                    ?>
                    <option value="<?=$row['id']?>"><?php echo $row['nom'] ?></option>        
                    <?php }?>    
                </select>          
            </div>
         
        <button class="btn-danger">VOIR</button>
    </form>
</div>

<?php }
if($do=='shed'){
  if($_SESSION['anneeS']!='null'){
      $id=$_SESSION['anneeS'];
      $se=$_GET['id_anneeS'];//echo "se $se";
      }
      $idcl=$_POST['classe'];
      $sql = mysqli_query($db,"SELECT distinct dateD,dateF  FROM emplois  where classID=$idcl order by dateD desc limit 1");
      $drow = mysqli_fetch_array($sql,MYSQLI_ASSOC);
      extract($drow);
       //date debut 
      $d=$dateD;$f=$dateF;
      $dd=date('d/m/Y',strtotime($dateD));
      //date fin
      $df=date('d/m/Y',strtotime($dateF));
      $sql = mysqli_query($db,"SELECT * from classe where id =$idcl ");
      $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
      $classe=$row['nom'];

        $result = $db->query("SELECT * FROM emplois  where classID=$idcl and dateF>CURRENT_DATE and dateD='$d' and dateF='$f'  order by timeD "); 
           $count=$result->num_rows; 
           if ($count>0){
                  
                    
     ?>         
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase">Emploi du temps de la classe <?=strtoupper($classe) ?></h6>
    </div>
     <div class="row">
                <div class="col-sm-4">
                  <b style="color:#686de0" >Date debut: </b>
                  <i style="color:#130f40" ><?= $dd;?></i>
                </div>
                <div class="col-sm-4">
                  <b style="color:#686de0">Date Fin: </b>
                  <i style="color:#130f40" > <?= $df;?></i>
                </div>
              </div>  
             <?php // while($row = $result->fetch_assoc()){ 
            //        extract($row);$dd=date('d/m/Y',strtotime($dateD));
            //         $df=date('d/m/Y',strtotime($dateF)); }
                    ?>
                   <!--  <label style="color:blue" for="dateD">Date debut</label>
                   <span style="color: black"><?php echo  htmlspecialchars($dd) ; ?> </span>  
               
               
                    <label style="color:blue" for="DateF">Date expiration</label>
                    <span style="color:black"><?php echo htmlspecialchars($df) ; ?>  </span>  -->
               
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
else {
       echo '<div style="background-color:#FAEBD7; font-size:40px; border-color: #849460 ;border-style:solid;
          border-width: 2px; border-radius: 10px; width:900px;height:200px; margin:auto; text-align:center; padding-left:20px;">'."Il n y a pas d'emploi du temps en ce moments pour la classe ".ucwords($classe)."</div>";
    
     } 
   }

?>   
    </div>
</div>
</div>      
<script>
    function screenShot(){
        window.scrollTo(0, 0);
 
 html2canvas(document.getElementById("emplois")).then(function (canvas) {

     // Create an AJAX object
     var ajax = new XMLHttpRequest();

     // Setting method, server file name, and asynchronous
     ajax.open("POST", "uploadEmploi.php", true);

     // Setting headers for POST method
     ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

     // Sending image data to server
     ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

     // Receiving response from server
     // This function will be called multiple times
     ajax.onreadystatechange = function () {

         // Check when the requested is completed
         if (this.readyState == 4 && this.status == 200) {

             // Displaying response from server
             console.log(this.responseText);
         }
     };
 });
}
</script>
<!-- hatmlcanva2-->
<script src="js/html2canvas.js"></script>
<!-- java Script script-->
<script src="js/AjouterEtud.js"></script>
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
