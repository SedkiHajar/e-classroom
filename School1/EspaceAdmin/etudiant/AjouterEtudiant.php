<?php
    //session_start();
    require_once '../../database/dbConfig.php'; 
    include('../session.php');
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
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">
</head>
<body>
<?php require '../defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<!-- slect info from table -->

<?php require_once '../../database/dbConfig.php'; ?>
<?php if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['anneeS'] = $_POST['id_anneeS'];
    $id_anneeS=$_SESSION['anneeS'];
 }?>


<?php  
  $id=$_SESSION['anneeS'];
  $result = $db->query("SELECT * FROM etudiant WHERE anneeS='$id'  ");
     $nbrEtudiant=0;
     $nbrFille=0;
     $nbrGarcon=0; ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrEtudiant++;
      if ($row['sexe']=='feminin') {
        $nbrFille++;
        // code...
      }
      if ($row['sexe']=='masculin') {
        $nbrGarcon++;
        // code...
      }
    }
       ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des etudiants</h1>
            
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Eleve inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Filles inscrites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrFille; ?></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Garcon Inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; ?></div>
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
            <div class="col-xl-12 col-lg-12 card shadow mb-4 "style="background-color:white;font-weight: bold;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h2 class="m-0 font-weight-bold text-primary ">INFO ETUDIANT</h2>
              </div>
            </div>
            <!--check box-->
              <div class="form-group col-md-6 mx-auto">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text text-primary">Nombre d'etudiant a créer</span>
              </div>
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" aria-label="Checkbox for following text input" id="myCheck"onclick=" AjouterEtudiant()">
                </div>
              </div>
              <input type="number" class="form-control" aria-label="Text input with checkbox"id="nbrEtudiant" value="1">
            </div>
          </div>
            <!--cors du formulaire-->
           <form action="uploadEtudParent.php" role="form" method="post" enctype="multipart/form-data">
               <h3 class=" font-weight-bold text-info text-center shadow  titre"> ETUDIANT NUMERO  : 1</h3>
                <div id="form" class="shadow "style="margin-top:20px;">
              <div class="form-row">
                  <div class="form-group col-md-6">
                       <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom[]"  required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="societe">Prenom</label>
                       <input type="text" class="form-control" id="prenom" name="prenom[]" required>
                   </div>
              </div>
             <div class="form-row">
             <div class="form-group col-md-6">
                  <label for="code">Code Postal</label>
                   <input type="number" class="form-control" id="codeP" name="codeP[]" required>
            </div>
            <div class="form-group col-md-6">
                       
                       <label for="cin">CIN</label>
                        <input type="text" class="form-control" id="cin" name="cin[]"  required>
                   </div>
            
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email[]" required>
            </div>
                <div class="form-group col-md-6">
                <label for="tel">Téléphone</label>
                <input type="tel" class="form-control" id="tel" name="tel[]" required>
            </div>
             <div class="form-group col-md-6">
                <label for="ville">Ville de naissance</label>
                <input type="text" class="form-control" id="villeN" name="villeN[]" required>
            </div>
            <div class="form-group col-md-6">
                <label for="societe">Date de naissance</label>
                <input type="date" class="form-control" id="dateN" name="dateN[]" required>
            </div>

            <div class="form-group col-md-6">
              <label for="classe">Année scolaire</label>
              <select class="custom-select" name="anneeS[]" id="">
                <option selected value="-1">Choisir l'année scolaire</option>
                  <?php
                  //définir la requete
                  $result = $db->query("SELECT * FROM anneeS ");
               
                  // boucle sur les données
                  ?>
                  <?php while ($row =$result->fetch_assoc()) {
                  ?>
                   <option value="<?php echo $row['id']; ?>"><?php echo $row['nomA']; ?>
                   </option>
                 <?php
               }
               ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="classe">Classe</label>
              <select class="custom-select" name="classe[]" id="">
                <option selected value="-1">Choisir...</option>
                <?php
              //définir la requete
               $result = $db->query("SELECT * FROM classe ");?>
               <?php while ($row =$result->fetch_assoc()) {
               ?>
               <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?>
                   
               </option>
                
                <?php
               }
               ?>
              </select>
              
            </div>
            <div class="form-group col-md-6">
                 <label for="adresse">Adresse</label>
                  <input type="text" class="form-control"  name="adresse[]" required>
            </div>
            <div class="form-group col-md-6">
                 <label for="adresse">Sexe</label>
                 <select class="custom-select" id="inputGroupSelect01" name="sexe[]">
                     <option selected>Choose...</option>
                     <option value="feminin">Feminin</option>
                     <option value="masculin">Masculin</option>
                 </select>
            </div>
            <div class="form-group col-md-6">
                <label for="societe">photos</label>
                <input type="file" class="form-control" id="image" name="image[]" required>
            </div>
            <div class="form-group col-md-6">
                <label for="societe">password</label>
                <input type="password" class="form-control" id="image" name="mdp[]" required>
            </div>
            </div>
            <h5  class="m-0 font-weight-bold text-primary text-center card shadow titre">Infomration des parents</h5>
            <div   class="form-row ">
            <div class="form-group col-md-6">
                <label for="societe">Nom  parent</label>
                <input type="text" class="form-control"  name="nomP" >
            </div>
            <div class="form-group col-md-6">
                <label for="societe">Prenom  parent</label>
                <input type="text" class="form-control"  name="prenomP" >
            </div>
            <div class="form-group col-md-6">
                <label for="societe">Numero de tel parent</label>
                <input type="tel" class="form-control"  name="telP" >
            </div>
            <div class="form-group col-md-6">
                <label for="societe">E-mail parent</label>
                <input type="text" class="form-control" name="emailP" d>
            </div>
            <div class="form-group col-md-6">
                 <label for="adresse">Adresse des Parents</label>
                  <input type="text" class="form-control"  name="adresseP" >
            </div>
            
          </div>
        </div>
        <div id="AjoutDeform"></div>
        </div>
       <button type="submit" class="btn btn-primary" name="inserer">submit</button>
</form>
  </body>
  </html>
<!-- java Script script-->
 <script src="../js/AjouterEtud.js?2"></script>
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