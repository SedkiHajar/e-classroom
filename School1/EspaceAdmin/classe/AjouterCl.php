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

  <title>AjouterEtudiant</title>

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
$param = "ajoC" ;
require '../defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>

<?php if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['anneeS'] = $_POST['anneeS'];
    $id_anneeS=$_SESSION['anneeS'];
 }?>








            



<!-- slect info from table -->

<?php 
    $id=$_SESSION['anneeS'];$admin=$_SESSION['id'];
    $result = $db->query("SELECT * FROM classe c join annees a  where a.idAn='$id' and a.idAdm=$admin and c.anneeS=a.idAn   ");
     $nbrClass=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrClass++;}
       ?>

<?php   $result = $db->query("SELECT * FROM matiere m join classe c join matclass t join annees e 
 where c.anneeS='$id' and m.id=t.id_Mat and t.id_Class=c.id  and e.idAdm=$admin and e.idAn=c.anneeS");
 //SELECT * FROM matiere m join classe c join matclass t where c.anneeS=10 and m.id=t.id_Mat and t.id_Class=c.id
     $nbrMat=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrMat++;}
       ?>

<?php   $result = $db->query("SELECT * FROM professeur  where anneeS='$id' and id_admin=$admin ");
     $nbrprof=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrprof++;}
       ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">
           <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des Classes et Matieres</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de Classes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrClass; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Nombre de Matieres</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrMat; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Professeurs inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrprof; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            
          </div>
          <!-- formulaire des etudiant a ajouter  -->
            <div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h2 class="m-0 font-weight-bold text-primary ">INFO MATIERE</h2>
              </div>
            </div>
            <!--check box-->
              
            <!--cors du formulaire-->
           <form action="uploadCl.php" role="form" method="post" enctype="multipart/form-data">
               <h3 class=" font-weight-bold text-info text-center shadow  titre"> Ajouter des classes  </h3>
                <div id="form" class="shadow " style="margin-top:20px;">
               <!--pour les classes-->
                <div class="form-row">
                  <!-- <div class="courses_inputs_div"> -->
                    <div class="form-group col-md-6">
                     <table><tbody id="ajoutC">
                         <tr id="classC" >
                            <td>
                              <label for="nom">Nom De la classe </label>
                              <input type="text" class="form-control"  name="nomC[]" required  >
                            </td>
                            <td><a class="btn btn-danger" onclick="SupprimerC('classC')"><i style="color:white" class="fa fa-close"></i></a></td>
                         </tr>
                     <!-- </div> -->
                  </tbody></table>
                  </div>
                  
                  <!-- <button class="btn btn-success add_more_courses">ajoy</button>  -->  

                   <div class="form-group col-md-6" id="ajoutC1"></div>
                   <a href="#ajouC1" class="btn btn-primary" onclick="AjouterC()">Ajouter Classe</a>
              </div>
              <h3 class=" font-weight-bold text-info text-center shadow  titre"> Ajouter des Matiere/prof pour les classes selectionné </h3>
             <!-- test matire -->
              <!--pour les matieres-->
                <div class="form-row">
                  <!-- <div class="courses_inputs_div"> -->
                    <div class="form-group">
                     <table><tbody id="ajoutM">
                         <!-- <tr id="matM" > -->
                        <tr id="matM">
                          
                            <td >
                              <label for="nom">Nom De la matière </label>
                              <input type="text" class="form-control"  name="nomM[]" required  >
                            </td>
                          
                          
                            <td >
                              <label for="nom">Coef De la MATIERE </label>
                              <input type="number" class="form-control"  name="coef[]"  required>
                            </td>
                          
                            <td>
                              <!-- <label for="nom">Nom Du Professeur </label> -->
                            
                             
                                <select class="custom-select" name="CIN[]" id="">
                                  <option selected value="-1">sélectionner le professeur</option>
                                  <?php
                                //définir la requete
                                 $result = $db->query("SELECT * FROM professeur where id_admin=$admin ");?>
                                 
                                 // boucle sur les données
                                 <?php while ($row =$result->fetch_assoc()) {
                                 ?>
                                 <option value="<?php echo $row['CIN']; ?>"><?php echo $row['nom'].'   ' .$row['prenom']; ?>
                                     
                                 </option>
                            
                                      <?php
                                     }
                                     ?>
                                </select>
                            </td>
                          
                            <td>
                              <a class="btn btn-danger" onclick="SupprimerM('matM')"><i style="color:white" class="fa fa-close"></i></a>
                            </td>
                          </tr>  
                          
                         <!-- </tr> -->
                     <!-- </div> -->
                  </tbody></table>
                  </div>



              <div class="form-row " id="ajoutM">
                 <!--pour les matierez-->
                  <!-- <div class="form-group col-md-3" >
                   
                       <label for="nom">Nom De la MATIERE </label>
                        <input type="text" class="form-control"  name="nomM[]"  required>
                  </div>
                  <div class="form-group col-md-3" >
                        <label for="nom">Coef De la MATIERE </label>
                        <input type="number" class="form-control"  name="coef[]"  required>
                   </div>
              
                    <div class="form-group col-md-6" >
                    <label for="nom">Nom Du Professeur </label>
                    <select class="custom-select" name="CIN[]" id="">
                      <option selected value="-1">sélectionner le professeur</option> -->
                      <?php
                    //définir la requete
                    // $result = $db->query("SELECT * FROM professeur where id_admin=$admin ");?>
                     
                     <!-- boucle sur les données -->
                     <?php // while ($row =$result->fetch_assoc()) {
                     ?>
                     <!-- <option value="<?php echo $row['CIN']; ?>"><?php echo $row['nom'].'   ' .$row['prenom']; ?>
                         
                     </option> -->
                
                <?php
              // }
               ?>
              <!-- </select> -->
             <!--  <a class="btn btn-danger" onclick="SupprimerM('ajoutM')"><i style="color:white" class="fa fa-close"></i></a>
            </div> -->
               
            </div>
             </div>
             <div class="form-row" id="ajoutM1"></div>
            <a href="#ajouM1" class="btn btn-primary" onclick="AjouterM()">Ajouter matiere</a>
           <!--  <a href="javascript:delElem('ajouM1', 'test');" title="Supprimer">Supprimer</a> -->
           
      </div>
                   

              </div>
             
          
        </div>
        <div id="AjoutDeform"></div>
       <button type="submit" class="btn btn-primary col-sm-4" name="inserer"><i class="fas fa-plus-circle"></i> 
       <!-- submit --><?= lang('ajout')?></button>
       <button type="reset" class="btn btn-danger col-sm-4"><?=lang('res') ?></button>  
</form>
  </body>
  </html>
  <script>
    var indexOfClass = 0 ;
    function AjouterC() {
      indexOfClass++ ;
      var classe= document.createElement('tr');
      var textClasse = document.getElementById("classC").innerHTML ;
      classe.setAttribute("id","classC"+indexOfClass)
      classe.innerHTML = textClasse.replace("classC","classC"+indexOfClass)
      var classeMere = document.getElementById("ajoutC");
      classeMere.appendChild(classe) ;
    }
    function SupprimerC(idC){
      var classe = document.getElementById(idC);
      classe.parentNode.removeChild(classe) ;
    }
    // function AjouterM() {
    //   var classe=document.getElementById("ajoutM").innerHTML;
    //   document.getElementById("ajoutM1").innerHTML+=classe;
    // }

    function AjouterM() {
      indexOfClass++ ;
      var classe= document.createElement('tr');
      var textClasse = document.getElementById("matM").innerHTML ;
      classe.setAttribute("id","matM"+indexOfClass)
      classe.innerHTML = textClasse.replace("matM","matM"+indexOfClass)
      var classeMere = document.getElementById("ajoutM");
      classeMere.appendChild(classe) ;
    }
    function SupprimerM(idM){
      var classe = document.getElementById(idM);
      classe.parentNode.removeChild(classe) ;
    }


  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/jquery.js"></script>
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
