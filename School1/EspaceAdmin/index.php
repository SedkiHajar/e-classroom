<?php
   session_start();
   include ('../lang/fb.php');
    require_once '../database/dbConfig.php'; 
    require_once '../database/function.php';
include("../function/func.php");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $mail = mysqli_real_escape_string($db,$_POST['email']);
      $mdp = mysqli_real_escape_string($db,$_POST['mdp']); 
      
      $sql = "SELECT * FROM admin WHERE mail = '$mail' and mdp = '$mdp'";
      $result = mysqli_query($db,$sql);
      if($result->num_rows > 0){
        $_SESSION['mailA'] = $mail;
        $_SESSION['anneeS'] = "null" ;
      // If result matched $myusername and $mypassword, table row must be 1 row
         header("location: welcome.php");
      }else {
         echo  '<div class="alert-danger">
                 <span>Le login ou le password invalide </span>
                </div>'; 
      }
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

  <title><?=lang('13') ?></title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!--  -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <!-- <link href="../css/css1.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="../css/stylelogine.css">
  <style type="text/css">
  .tt{
  background-color: blue;
  margin: 0;
  padding: 0;
  background: url(img/book.jpeg);
  background-size: cover;
  font-family: 'Poppins' sans-serif; 
  background-position: bottom;
  background-attachment: fixed;
}
  </style>
</head>
<body>
<!-- Le code par defaut -->
      <div class="col-xl-12 col-lg-12 card shadow mb-4 " >
        <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?=lang('7') ?></a>
      </div>
      <div  class="loginbox ">
            <img src="../img/admin.jpeg" class="user">
            <h4> <?=lang('2') ?></h4>
            <form class="form-signin" action="" method="POST">
            <div class="textbox">
              <i class="fas fa-user" aria-hidden="true"></i>
                <input type="email" id="inputEmail" name="email" placeholder="<?=lang('8') ?>" required autofocus>
            </div>
            <div class="textbox">
              <i class="fas fa-lock"  aria-hidden="true"></i>
                <input type="password" name="mdp" placeholder="<?=lang('9') ?>" required >
            </div>
          <input class="btn" type="submit" name="loginAdmin" value="<?=lang('10') ?>"><br><br>
         </form>
       </div>
  </header>     
</body>

  <!-- <div class="container">
    
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Bienvenue dans l'espace Direction </h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="mdp"required>
                
              </div>

              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="loginAdmin">se connecter</button>
              <hr class="my-4">
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- java Script script-->
 <script src="js/AjouterEtud.js?2"></script>
 <!-- <script src="js/jquery.js"></script> -->
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
