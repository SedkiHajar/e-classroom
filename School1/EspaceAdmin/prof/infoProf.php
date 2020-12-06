<?php
error_reporting(0);
include ('../../lang/fb.php');
   require_once '../../database/dbConfig.php';
   require_once '../../database/function.php';

include("../../function/func.php");
   include('../session.php');
   if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AjouterProf</title>
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- icones -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>
<body>
<?php 
$param = "" ;
require '../defaultAdmin.php';?>
<!-- debut de profile  -->
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>
  <div id="info">
<!-- slect info from table -->
<?php $CIN=$_GET['CIN'];
$admin=$_SESSION['id'];
 ?>
 <a href="gestionProf.php"><i class="fas fa-arrow-circle-left"></i><?=lang('7') ?><!-- Retour --></a>
<?php   $result = $db->query("SELECT * FROM professeur WHERE CIN='$CIN' ");

 if($result->num_rows > 0){?>
   <?php while($row = $result->fetch_assoc()){?>
   
<div class="container emp-profile">
            <form >
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img ">
                           <?php if($row['avatarP']=='0' or empty($row['avatarP'])) { 
                   echo " <img src='uploads/avatars/user.png' alt=''/>"; }
                   else{
                     echo " <img src='uploads/avatars/".$row['avatarP']."' alt=''/>"; 
                   }
                          ?>
                            <!-- <img src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode($row['image']); ?>" alt=""/> -->
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2 class=" font-weight-bold text-info  shadow  titre">
                                        <?php echo $row['nom'].'  '.$row['prenom']; ?>
                                    </h2>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informations de professseur</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <a  onclick="switche()" href="#"  class="btn btn-primary " ><i class="fa fa-edit"></i><?= lang('editP') ?> </a>
                      <!--  <a   href="../classe/infoMatieres.php?id_prof=<?php echo ($row['CIN']); ?>"  class="btn btn-primary " >voir mes matieres </a> -->
                      <br>
              
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                        <div class="profile-work">
                            <p></p>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a>
                            <p></p>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                            <a href=""></a><br/>
                        </div>
                    </div>
                    <div class="col-md-8 shadow">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Code Postal</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['codePostal']; ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['adresse']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['dateN']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ville de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['villeN']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['mail']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Télephone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['tel']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row['sexe']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Année scolaire</label>
                                            </div>
                                            <div class="col-md-6">
                                              <?php $id_anneeS= $row['anneeS']?>                      
                                <?php   $result1 = $db->query("SELECT nomA FROM annees WHERE idAn='$id_anneeS'");?>  
                                <?php while($row1 = $result1->fetch_assoc()){?> 
                                                <p><?php echo $row1['nomA']; ?></p><?php } ?>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
          <?php } ?>
            <?php } ?>
        </div>
            <div id="update">
              <!-- Appel de la base de dennée -->
              <!-- slect info from table -->
              <a href="infoProf.php?CIN=<?=$CIN?>&choix=insertion"><i class="fas fa-arrow-circle-left"></i><?=lang('7') ?><!-- Retour --></a>
              <?php   $result = $db->query("SELECT * FROM professeur WHERE CIN='$CIN' ");
               if($result->num_rows > 0){?>
                 <?php while($row = $result->fetch_assoc()){?>
              <div class="container emp-profile">
                        <form action="uploadProf.php?CIN=<?=$CIN?>"  role="form" method="post" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="profile-img ">
                                        <div class="form-group">
                                           <label style="color:#eb4d4b">Changer image</label>
                                           <input type="file" name="image" required="required" value="<?=$row['avatarP']?> " />
                                           <?php $_SESSION['image']=$row['avatarP'];?>
                                        </div>   
                                         <!--  <img id="output" src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode($row['image']); ?>" alt=""/> -->
                                           
                                          <!-- <div class="file btn btn-lg btn-primary">
                                              <button class="btn btn-primary" >Changer image
                                              
                                              <input type="file"  accept="image/*" name="image" id="image"  onchange="loadFile(event)" >
                                            </button>
                                          </div>
 -->
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="profile-head">
                                                  <h2 class=" font-weight-bold text-info  shadow  titre">
                                                    <input class="form-control" name="nom" value="<?php echo $row['nom']?> ">
                                                    <input class="form-control" name="prenom" value="<?php echo $row['prenom']?> ">
                                                  </h2>
                                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                                              <li class="nav-item">
                                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informations de professeur</a>
                                              </li>
                                              <!-- <li class="nav-item">
                                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Informations de parent</a>
                                              </li> -->
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-md-2">

                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                      <div class="profile-work">
                                          <p></p>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a>
                                          <p></p>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                          <a href=""></a><br/>
                                      </div>
                                  </div>
                                  <div class="col-md-8 shadow">
                                      <div class="tab-content profile-tab" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label>Code Postal</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>  <input class="form-control" type="text" name="codeP" value="<?=$row['codePostal']; ?>">  </p>
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label >Adresse</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="text" name="adresse" value="<?=$row['adresse']; ?>" ></p>
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label>Date de naissance</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="date" name="dateN" value="<?=$row['dateN'];?>"></p>
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label>Ville de naissance</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="text"  name="villeN" value="<?=$row['villeN'];?>"></p>
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label >Email</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="email" name="email" value="<?=$row['mail'];?>"></p>
                                                          </div>
                                                      </div>
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label>Telephone</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input class="form-control" type="tel" name="tel" value="<?=$row['tel'];?>"></p>
                                                          </div>
                                                      </div>
                                                      <!-- <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label>CIN</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p><input  id="a" class="form-control" type="text" name="CIN"  value="<?//$row['CIN']; ?>" > </p>
                                                          </div>
                                                      </div> -->
                                                      <div class="form-row">
                                                          <div class="col-md-6">
                                                              <label>Sexe</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>
                                                                  <select class="custom-select" name="sexe" id="">
                                                                    

                                                                <option  value="<?=$row['sexe'];?>"><?=$row['sexe'];?></option>
                                                                <option value="<?php if($row['sexe']=='masculin') echo 'feminin';else echo 'masculin'?>">
                                                                  <?php if($row['sexe']=='masculin') echo 'feminin';else echo 'masculin'?></option>
                                                                </select>
                                                               <!--  <input class="form-control" type="text" name="sexe" value=" <?php echo $row['sexe']; ?> "></p> -->
                                                          </div>
                                                      </div>
                                                    <div class="form-row">
                                                          
                                                          
                                                              
                                                              <?php $id_anneeS= $row['anneeS']?>                      
                                                   <?php   $result1 = $db->query("SELECT * FROM annees WHERE idAn='$id_anneeS'");?>  
                                                <?php while($row1 = $result1->fetch_assoc()){?> 
                                                <div class="col-md-6">
                                                              <label for="classe">Année scolaire</label>
                                                </div>
                                                <div class="col-md-6">              
                                                             <select class="custom-select" name="anneeS" id="">
                                                               <option selected value="<?=$row1['idAn']; ?>"><?php echo $row1['nomA']; ?></option><?php } ?>
                                                              <?php
                
                                                            $result = $db->query("SELECT * FROM annees WHERE idAdm=$admin");
                
                                                               ?>
                                                             <?php while ($row =$result->fetch_assoc()) {
                                                               ?>
                                                       <option value="<?php echo $row['idAn']; ?>"><?php echo $row['nomA']; ?>
                                                       </option>
                                                       <?php
                                                        }
                                                         ?>
                                                                </select>
                                                        </div>        
                                                          <div class="col-md-6">      
                                                           <button class="btn btn-primary" type="submit" name="modifier" 
                                                    value="update"><i class="fa fa-edit"></i> <?=lang('edit') ?></button>     
                                                          </div>

    
                                                    



                                                      </div>
                                          </div>
                                       <!--    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label>Experience</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>Expert</p>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label>Hourly Rate</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>10$/hr</p>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label>Total Projects</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>230</p>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label>English Level</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>Expert</p>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <label>Availability</label>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <p>6 months</p>
                                                          </div>
                                                      </div>
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <label>Your Bio</label><br/>
                                                      <p>Your detail description</p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                  </div> -->
                                  <!-- <button   class="btn btn-primary" type="submit" name="modifier" value="update"> -->
                                </form>
                              </div>
                            <?php } ?>
                              <?php } ?>


                      </div>
                        </div>
                      <script type="text/javascript">
                      function switche (){
                          document.getElementById("info").style.display = "none";
                          document.getElementById("update").style.display = "block";

                        }</script> 


       <!-- java Script script-->
 <script src="../js/AjouterEtud.js"></script>
<!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

</body>

</html>