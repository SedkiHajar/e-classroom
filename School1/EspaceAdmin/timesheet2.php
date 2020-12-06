
<?php
error_reporting(0);
include ('../lang/fb.php');
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

 //   if($_SERVER["REQUEST_METHOD"] == "POST") {
 //    $_SESSION['anneeS'] = $_POST['id_anneeS'];
 //    $id_anneeS=$_SESSION['id_anneeS'];
 // }
 // if($_SERVER["REQUEST_METHOD"] == "GET") {
 //    $_SESSION['anneeS'] = $_GET['id_anneeS'];
 //    $id_anneeS=$_SESSION['id_anneeS'];
 // }
   //echo "ann ".$_SESSION['anneeS'];
  // print($_SESSION['anneeS']);
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
$param = "time" ;
$admin=$_SESSION['id'];

require 'defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<!-- slect info from table -->
<!-- get date -->
<?php
$do=isset($_GET['do'])?$_GET['do']:$_GET['do']='emp';
$d=isset($_GET['d'])?$_GET['d']:$_GET['d']='emp';


// if($_SESSION['anneeS']!='null'){
//       $id=$_SESSION['anneeS'];
//       $se=$_GET['id_anneeS'];
//       //echo "se $se";
//       }

  // $_SESSION['anneeS']=$se;
     
      
  //    $se=$id;

    
// echo 'an: ';var_dump($_SESSION['anneeS']);
// echo "juse $se";
// echo "anse:  $se";var_dump($_SESSION['anneeS']);
// $_SESSION['anneeS']=$se;
$id=$_GET['id_anneeS'];
$_SESSION['anneeS']=$id;
// $_SESSION['anneeS']=$se;

// print_r($_SESSION['anneeS']);
$classe=$_POST['classe'];
$_SESSION['emplois'] = $classe;

//tables
$Days=array ('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','Dimanche');
$time=array('8-9','9-10','10-11','11-12','14-15','15-16','16-17','17-18')
?>
 <div class="col-xl-12 col-lg-12 card shadow mb-4 " style="margin-top:10px;">
        <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?=lang('7') ?></a>
      </div>
<div class="card shadow mb-4"  id="emplois" style="margin-top: 50;">
<div class="form-row text-center">
  
       
 <!-- formulaire emploi  -->
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold;">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h2 class="m-0 font-weight-bold text-primary "> Espace des emplois du temps</h2>
        </div>
    </div>
 <?php   if($do=='emp'){
//echo 'ann:' . $_SESSION['anneeS'];
?>
<!-- Appel de la base de dennée -->
<!-- slect info from table -->
<!-- <h3 class=" font-weight-bold text-info text-center shadow  titre" style="margin-top: 50px;"> Espace des emplois du temps </h3> -->
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold; margin-top:1px;">
    <form action="timesheet2.php?id_anneeS=<?= $id ?>&do=she" role="form" method="post" enctype="multipart/form-data">
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

            <div class="form-group col-md-6">
                <label for="dateD">Date debut</label>
                <input type="date" class="form-control"  name="dateD" required>
            </div>
            <div class="form-group col-md-6">
                <label for="DateF">Date expiration</label>
                <input type="date" class="form-control"  name="dateF" required>
            </div>
        </div>
        <button class="btn-primary" name="ajouter">Ajouter</button>
        <button class="btn-success" name="voir">Voir</button>
    </form>
</div>
<?php } ?>

<!-- if voir les emploi -->
<?php 
if(isset($_POST['voir']))  
{     
    $idcl=$_POST['classe'];//echo "cl $idcl ";
    $da=$_POST['dateD'];  
    $df=$_POST['dateF'];//echo "$da $df";
    $sql = mysqli_query($db,"SELECT * from classe where id =$idcl ");
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $nomcl=$row['nom'];//echo "nom $nomcl";
//pour afficher les emploi
    // $sql = mysqli_query($db,"SELECT distinct dateD,dateF  FROM emplois  where classID=$idcl and dateD='$da' and dateF='$df' ");
    // $drow = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    // extract($drow);
    // $d=$dateD;$f=$dateF;echo "debut $da $d df $f";
     
        //echo "classes $idcl";// a voir condition de date s and dateD='$d' and dateF='$f' 
  
     
    //echo "$idcl $da $df ";
    $sql = mysqli_query($db,"SELECT * from classe where id =$idcl ");
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $classe=$row['nom'];
    $result = $db->query("SELECT * FROM emplois  where classID='$idcl' and dateD='$da' and dateF='$df'   and dateF>CURRENT_DATE order by timeD "); 
    $count=$result->num_rows; 
    if ($count>0){
        // date debut 
    $dd=date('d/m/Y',strtotime($da));
      //date fin
    $df=date('d/m/Y',strtotime($df));            
                    
     ?>         
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase">Emploi du temps de la classe <?=strtoupper($classe) ?></h6>
    </div>
     
               
       
               <div class="row">
                <div class="col-sm-4">
                  <b style="color:#686de0"> Date debut: </b>
                  <i style="color:#130f40" ><?= $dd;?></i>
                </div>
                <div class="col-sm-4">
                  <b style="color:#686de0">Date Fin: </b>
                  <i style="color:#130f40" > <?= $df;?></i>
                </div>
              </div>  
      <!-- </div>   -->         
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
    <?php 
     //$row = $result->fetch_assoc();
     //var_dump($row);
     while($row = $result->fetch_assoc()){ 
     //$t=0;
      //var_dump($row);
      //$tab=array($row);//var_dump($tab);
     // echo 'tab'.$tab['0']['idEmp'];
                      $id=$row['idEmp'];
                      $day=$row['jour'];
                      $sl=$row['salle'];
                      $col=$row['color'];
                      $colt=$row['colorT'];//echo $col;
                      $dd=date('d/m/Y',strtotime($row['dateD']));
                      $df=date('d/m/Y',strtotime($row['dateF']));
                      $td=date('G:i',strtotime($row['timeD']));
                      $td=date('G:i',strtotime($row['timeD']));
                      $tf=date('G:i',strtotime($row['timeF']));
                      $pr=$row['prof'];
                      $mat=$row['mat']; ?>
                      
     

       
    <tr>
                 <?php //for ($j = 0; $j<count($count); $j++) { ?>
                 <?php 
                 
                 
                 // echo "t= ".date('G:i',strtotime($tab['0']['timeD'])); 
                 //       echo date('G:i',strtotime($tab['0']['timeF'])); 
                 ?>
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
                    
                      
                   
                    <?php }    ?>
   
      
      
      <?php $i++; ?>
      <?php } 
      
      //} 


      ?>
    </tr>
  </tbody>



              
        </table>  <?php 
        } // }
else {
       echo '<div style="background-color:#FAEBD7; font-size:40px; border-color: #849460 ;border-style:solid;
          border-width: 2px; border-radius: 10px; width:900px;height:200px; margin:auto; text-align:center; padding-left:20px;">'."Il n y a pas d'emploi du temps en ce moments pour la classe ".ucwords($classe)."</div>";
    
     } 
  }




?>




    <!--check box-->
    <?php if ($do=="she" and isset($_POST['ajouter'])) {  
      $classe=$_POST['classe'];//echo "$cl $classe";
      $dateD=$_POST['dateD'];  
      $dateF=$_POST['dateF'];
      $sql = mysqli_query($db,"SELECT * from classe where id =$classe ");
      $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
      $nomcl=$row['nom'];//echo "$nom $nomcl";

      ?>
    <div class="form-group col-md-6 mx-auto">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text text-primary">Nombre de matières a ajouter</span>
            </div>
            <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck" onclick=" AjouterEMP()">
                </div>
            </div>
              <input type="number" class="form-control" aria-label="Text input with checkbox" id="nbrch" value="1">
              
         </div>
     </div>
           <!--cors du formulaire-->
         
<div class="col-lg-12 text-center">
  <div class="card">
      <div class="card-header">
          <h3>Remplir l'emplois de la classe <?=$nomcl ?></h3>
         
      </div>
      <form action="?id_anneeS=<?php echo $_SESSION['anneeS'] ?>&do=shed&class=<?=$classe?>" method="post">
          <h5 class=" font-weight-bold text-info text-center shadow  titre"> MATIèRE NUMERO  : 1</h5>
          <div id="form" class="shadow " style="margin-top:20px;">
            <div class="card-body card-block text-left">
               <div class="row form-group">
            
                       <!--  <label for="dateD" class="control-label col-sm-2">Date debut: </label> -->
                        <input type="hidden" class="form-control col-sm-4"  name="dateD" value="<?= $dateD?>" required>
                        <!-- <label for="DateF" class="control-label col-sm-2">Date expiration: </label> -->
                        <input type="hidden" class="form-control col-sm-4"  name="dateF" value="<?= $dateF?>" required>
                        
                </div>
                <div class="row form-group">
                        <label for="timeD" class="control-label col-sm-2">time debut: </label>
                        <input type="time" class="form-control col-sm-4"  name="timeD[]" required>
                        <label for="timeF" class="control-label col-sm-2">time expiration: </label>
                        <input type="time" class="form-control col-sm-4"  name="timeF[]" required>
                </div>
                <div class="row form-group">
                       <label for="colorm" class="control-label col-sm-2">Couleur colonne :</label>
                        <input type="color" class="form-control col-sm-4" required name="colorM[]"> 
                        <label for="colort" class="control-label col-sm-2">Couleur text :</label>
                        <input type="color" class="form-control col-sm-4" value="#ffffff" required name="colorT[]"> 
                </div>
                <div class="row form-group">
                        <label for="matiere" class="control-label col-sm-2">Jour de semaine :</label>
                          <select name="jour[]" class="form-control col-sm-4" required>
                            <option  class="control-label col-sm-3" selected value="-1">choisir le jour</option> 
                            <option value="Lundi" >Lundi</option> 
                            <option value="Mardi" >Mardi</option> 
                            <option value="Mercredi" >Mercredi</option> 
                            <option value="Jeudi" >Jeudi</option> 
                            <option value="Vendredi">Vendredi</option>
                            <option value="Samedi">Samedi</option> 
                            <option value="Dimanche">Dimanche</option>         
                          </select> 
                       <label for="salle" class="control-label col-sm-2">Salle :</label>
                          <input type="text" class="form-control col-sm-4" required placeholder="saisir la Salle du cour" name="salle[]">
                </div>
                         <!--Pour les matiere -->
                <div class="row form-group">
                    <!-- <label for="classe" class="control-label col-sm-2">Classe :</label> -->
                    <input required type="hidden" class="form-control col-sm-4" name="class" value="<?= $classe?>"/>
                        <!-- <label for="classe" class="control-label col-sm-2">Classe :</label>
                          <select name="classe[]" class="form-control col-sm-4" required>
                            <option  class="control-label col-sm-3" selected value="-1">choisir la classe</option>  -->
                              <?php
                                //définir la requete
                               //$result = $db->query("SELECT * FROM classe c join annees a where a.idAn=c.anneeS and a.idAdm=$admin ");
                              //boucle sur les données
                               // while ($row =$result->fetch_assoc()) {
                              ?>
                            <!-- <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>        
                                <?php // }?>    
                          </select>   -->
                        
                     <!--Pour les matiere -->
                        <label for="matiere" class="control-label col-sm-2">Matière :</label>
                          <select name="matiere[]" class="form-control col-sm-4" required>
                            <option  class="control-label col-sm-3" selected value="-1">choisir la Matiere</option> 
                              <?php
                                //définir la requete
                                $result = $db->query("SELECT * FROM matiere m INNER JOIN matclass c ON m.id = c.id_Mat ");  
                                //boucle sur les données
                                while ($row =$result->fetch_assoc()) {
                                ?>
                            <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>        
                                <?php }?>    
                          </select>
                           <!--Pour les prof -->
                           <label for="prof" class="control-label col-sm-2">Professeur:</label>
                          <select name="prof[]" class="form-control col-sm-4" required>
                            <option  class="control-label col-sm-3" selected value="-1">Choisir le Professeur</option> 
                                <?php
                               
                                //définir la requete
                                $result = $db->query("SELECT DISTINCT nom,CIN,prenom FROM professeur p INNER JOIN matclass c ON p.CIN = c.id_prof where id_admin='$admin'");  //p.anneeS=$se
                                //boucle sur les données
                                while ($row =$result->fetch_assoc()) {
                                  extract($row);
                                ?>
                           <option value="<?=$nom.' '.$prenom; ?>"><?php echo $nom.' '.$prenom ;?></option>       
                            <?php }?>    
                          </select>   
                </div> 
                        
                
              </div>    
                       <div id="AjoutDeform"></div>  
            </div>  
                  <div class="form-group text-center">
                        <button type="submit" class="btn btn-success col-sm-3" name="emplois">Ajouter</button>
                        <button type="reset" class="btn btn-danger col-sm-4">Réinitialiser</button>      
                    </div>        
            </form>
        </div>
    </div>

    <?php }
      if($do=='shed') {
     $cl = $classe ;
     
     //echo "clgg $cl";
   // $da = $_POST['dateD'] ;
   // $df = $_POST['dateF'] ;
     if (isset($_POST['emplois'])) {
      if(isset($_POST['salle']) && isset($_POST['colorT']) &&  isset($_POST['colorM'])
      && isset($_POST['dateD']) && isset($_POST['dateF']) && isset($_POST['timeD']) && isset($_POST['timeF'])
      && isset($_POST['prof']) && isset($_POST['matiere']) && isset($_POST['jour']) && isset($_POST['class']) )
      { 
      $sl = $_POST['salle'] ;
      $cl = $_POST['class'] ;
      $cot = $_POST['colorT'] ;
      $com = $_POST['colorM'] ;
      $da = $_POST['dateD'] ;
      $df = $_POST['dateF'] ;
      $td = $_POST['timeD'] ;
      $tf = $_POST['timeF'] ;
      $mat = $_POST['matiere'] ;
      $day = $_POST['jour'] ;
      $prof = $_POST['prof'] ;

      for ($j =0; $j <count($sl); $j++)
            {
     
            //inserer info parent
             $insert = $db->query("INSERT into emplois(salle,color,colorT,prof,mat,dateD,dateF,timeD,timeF,classID,jour) VALUES ('$sl[$j]','$com[$j]','$cot[$j]','$prof[$j]','$mat[$j]','$da','$df','$td[$j]','$tf[$j]','$cl','$day[$j]')");
            if($insert){
              $db->query($insert);
                   echo '<script>alert("La matière '.($mat[$j]).' a bien été ajouté !");</script>' ;
                   //echo 'tt';  
                }
                else
                {
               // echo "salle $sl[$j] classe $cl color $cot[$j] $com[$j] date $da[$j] datef $df[$j] tme $td[$j] tf $tf[$j] mat $mat[$j] day $day[$j] prof $prof[$j]";
                  echo '<script>alert("La matière '.($mat[$j]).' non ajouté !");</script>' ;
                }
               
            }

            } 
          }
           //}  //de she

       //pour afficher l'emploi ajoute 
     
      $idcl=$_GET['class'];
      $da = $_POST['dateD'] ;
      $df = $_POST['dateF'] ;//echo "debut $da def $df";
    
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $nomcl=$row['nom'];//echo "nom $nomcl";
//pour afficher les emploi
    // $sql = mysqli_query($db,"SELECT distinct dateD,dateF  FROM emplois  where classID=$idcl and dateD='$da' and dateF='$df' ");
    // $drow = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    // extract($drow);
    // $d=$dateD;$f=$dateF;echo "debut $da $d df $f";
     
        //echo "classes $idcl";// a voir condition de date s and dateD='$d' and dateF='$f' 
  
     
    //echo "$idcl $da $df ";
    $sql = mysqli_query($db,"SELECT * from classe where id =$idcl ");
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $classe=$row['nom'];
    $result = $db->query("SELECT * FROM emplois  where classID='$idcl' and dateD='$da' and dateF='$df' and dateF>CURRENT_DATE order by timeD "); 
    $count=$result->num_rows; 
    
    if ($count>0){
        // date debut 
    $dd=date('d/m/Y',strtotime($da));
      //date fin
    $df=date('d/m/Y',strtotime($df));            
                  
           

        //echo "classes $idcl";// a voir condition de date s and dateD='$d' and dateF='$f' 
  
    
      ?>         
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase">Emploi du temps de la classe <?=strtoupper($classe) ?></h6>
    </div>
     
               
       
               <div class="row">
                <div class="col-sm-4">
                  <b style="color:#686de0"> Date debut: </b>
                  <i style="color:#130f40" ><?= $dd;?></i>
                </div>
                <div class="col-sm-4">
                  <b style="color:#686de0">Date Fin: </b>
                  <i style="color:#130f40" > <?= $df;?></i>
                </div>
              </div>  
      <!-- </div>   -->         
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
               <?php 
               // for($t=0;$t<$count;$t++){
               // while ($tab = $result->fetch_assoc()){
                // $tab=$result->fetch_assoc();
                // print_r($tab);
                // foreach ($tab as $key => $value) {
                //   $time=[[$key =>  $value['timeD'].'-'.$value['timeF']]];
                // } print_r($time);
                
                //$time=array($tab['timeD'].'-'.$tab['timeF']);
                //$time=[[$t =>  $tab['timeD'].'-'.$tab['timeF']]];
                //$time=[$t =>  $tab['timeD'].'-'.$tab['timeF']];
               //  print_r($time);
               // }
                
               // }  
              // print_r($time);
               
               //for ($j = 0; $j <count($count); $j++){ ?>
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
                      $mat=$mat;
//condition du  temps a reflichir
 // $sql = mysqli_query($db,"SELECT distinct timeD,timeF  FROM emplois  where classID=$idcl and timeD!='$td' and timeF='$tf' ");
 //      $drow = mysqli_fetch_array($sql,MYSQLI_ASSOC);
 //      extract($drow);
      //$d=$dateD;$f=$dateF;                     


                      ?>
                      
     

       
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
    </tr> <?php //} ?>
  </tbody>

<!-- public static function getListeCMS(){
  $sqlListeCMS = "SELECT `id_cms` FROM `cms`";
  $ListeCMS = Db::getInstance()->ExecuteS($sqlListeCMS);//contient un tableau une colonne avec les ID cms
  $monTableau = array('ID','Type');
   
  foreach($ListeCMS as $ArticleCMS){   
    $type = CMS::isCookBook($ArticleCMS) ? 'CookBook' : (CMS::isLookBook($ArticleCMS) ? 'LookBook' : "");
    if (!empty($type)){
     $monTableau[$ArticleCMS] = $type;
    }
  }
  print_r($monTableau);
  return $monTableau;
} -->

              
        </table>  <?php } 
else {
       echo '<div style="background-color:#FAEBD7; font-size:40px; border-color: #849460 ;border-style:solid;
          border-width: 2px; border-radius: 10px; width:900px;height:200px; margin:auto; text-align:center; padding-left:20px;">'."Il n y a pas d'emploi du temps en ce moments pour la classe ".ucwords($classe)."</div>";
    
     } 
  }

?>      
 
  
  
  

   
            
<script>

  function AjouterEMP() {
  var nbrContact=document.getElementById("nbrch").value;
  var test=document.getElementById("myCheck");
  var cont =document.getElementById("form").innerHTML;
  console.log(nbrContact);
  console.log(nbrContact);
  console.log(cont);
  if(test.checked==true){

  var i;
for (i = 0; i <(nbrContact-1); i++) {
 document.getElementById("AjoutDeform").innerHTML+="<hr class='sidebar-divider'>"+"<h5 class='font-weight-bold text-info text-center shadow  titre'>MATIèRE NUMERO :  "+(i+2)+' </h5>'+cont;

}
}
else{
  document.getElementById("AjoutDeform").innerHTML="";
}

}
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
