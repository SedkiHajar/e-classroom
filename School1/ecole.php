<?php 
//include ('School1/lang/fb.php');
 include ('lang/fb.php');


  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Besteduk</title>
	<link rel="stylesheet" href="/School1/vendor/vendor/bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="/School1/css2/acc.css">
  <!-- <link rel="stylesheet" type="text/css" href="/School1/css2/Accueil.css"> -->
	<link rel="stylesheet" type="text/css" href="/School1/css2/fixed.css">
</head>


<body data-spy="scroll" data-target="#navbarResponsive">

<!--- Start Accueil Section -->

<!--- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#"> <img src="/School1/img/logo.png"/> </a>
    
    <!-- <a class="navbar-brand" href="#" ><spam>WINWATS</spam></a> -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
		<span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    	<ul class="navbar-nav ml-auto">
    		<li class="nav-item">
    			<a class="nav-link" href="#accueil"><?=lang('HOME') ?><!-- ACCUEIL --></a>
    	    </li>
          
    	    <!-- <li class="nav-item">
    			<a class="nav-link" href="/School1/EspaceAdmin/index.php"><?//=lang('admin') ?></a>
    	    </li>
    	    <li class="nav-item">
    			<a class="nav-link" href="/School1/EspaceProf/index.php"><?//=lang('profes') ?></a>
    	    </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceEtudiant/index.php"><?//=lang('students') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceParent/index.php"><?//=lang('parent') ?></a>
          </li> -->
    	    <li class="nav-item">
    			<a class="nav-link" href="#about-sec"><?=lang('about') ?></a>
    	    </li>
    	    <li class="nav-item">
    			<a class="nav-link" href="#contact">Contact</a>
    	    </li>
          <li class="nav-item"> 
            <a class="nav-link" href="?lang=fr"><img src="/School1/img/flags/fr.png" ></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="?lang=en"><img width="25px" height="20px" src="/School1/img/flags/gb.png" ></a>
          </li>

    	</ul>
    </div>	    
</nav>
<!--- End Navigation -->
<section id="accueil" >
<div id="Carousel" class="carousel slide" data-ride="carousel">
   <ol >
      <li data-target="#Carousel" data-slide-to="0" class="active"></li> 
      
     <!--  <li data-target="#Carousel" data-slide-to="1" ></li>
      <li data-target="#Carousel" data-slide-to="2" ></li> -->
   </ol>
   <div class="carousel-inner">
       <div class="carousel-item carousel-image-1 active">
          <div class="container">
              
              <div class="carousel-caption d-none d-sm-block text-right mb-5">
                 <!-- <h1 class="display-3 title-color">BEST EDUK</h1> -->
                 
                 <!-- <div class="indec"> -->
                  <table  class="tab1">
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/admin.jpeg" >
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceAdmin/index.php"><?=lang('admin') ?></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/prof.jpeg" > 
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('profes') ?></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/student.jpeg" >
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('students') ?></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/parent.jpeg" >
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('parent') ?></a>
                      </td>
                    </tr>
                    
                  </table>

                    <!-- <div class="nav-item">
                      <img width="10%" height="10%" src="/School1/img/admin.jpeg" >
                      <a class="nav-link" href="/School1/EspaceAdmin/index.php"><?=lang('admin') ?></a>
                    </div>
                      <div class="nav-item">
                        <img width="10%" height="10%" src="/School1/img/prof.jpeg" > 
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('profes') ?></a>
                      </div>
                      <div class="nav-item">
                        <img width="10%" height="10%" src="/School1/img/student.jpeg" > 
                        <a class="nav-link" href="/School1/EspaceEtudiant/index.php"><?=lang('students') ?></a>
                      </div>
                      <div class="nav-item">
                        <img width="10%" height="10%" src="/School1/img/parent.jpeg" > 
                        <a class="nav-link" href="/School1/EspaceParent/index.php"><?=lang('parent') ?></a>
                      </div> -->
                 <!-- </div> -->
                <!-- lead -->
              </div>
          </div>
       </div>
      
 </div>
 </section>







<!--- Start about Section -->
<section id="about-sec" >
   <div class="container">
      <div class="row align-items-center">
         
            <div class="col-md-7 text-center">
                 <img src="/School1/img/book.jpeg" width="450" height="150" class="img-fluid watch-img">
            </div>
            <div class="col-md-4 text-lg-left text-center text-color about-text">
                <h3><?=lang('propos') ?><!-- A PROPOS DE BESTEDUK --></h3>
                <p class="text"><?=lang('best') ?>
                                </p>
                <!-- <a class="btn btn-outline-dark btn-lg" href="#">Nos activités</a><br>
                <br><a class="btn btn-outline-dark btn-lg" href="#">Showroom</a><br>
                <br><a class="btn btn-outline-dark btn-lg" href="#">Catalogue</a> -->
            </div>
       
      </div>
    </div>
</section>

<!--- End about Section -->





<!--- Start contact Section -->
<div id="contact" class="offset">
<footer>
<div class="row justify-content-center">
	<div class="col-md-5 text-center">
		<strong><?=lang('us') ?></strong>
		
		<p><div class="feature"><i class="fas fa-map-marker-alt"></i></div> Africa
          3481 Melrose Place
          DAKAR, CA 90210</p>
		<p>  <div class="feature">  <i class="fas fa-phone"></i>  </div>(123) 456-7890</p>
		<p><div class="feature"><i class="fas fa-envelope"></i></div>name@example.com </p>
		<!-- <a class="btn btn-outline-dark btn-lg" href="#">
      Contactez-nous</a> -->
		<!--  <p>Suivez-nous sur nos réseaux sociaux:</p>
		<a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
		<a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
		<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>-->
	</div>
	<hr class="socket">

	Copyright &copy; BEST EDUK 2020
</div>
</footer>
<a class="ot" href="/School1/EspaceMasterAdmin/index.php" >
      <?=lang('master') ?>
                      <!-- ESPACE MASTER ADMIN -->
                    </a>
</div>
<!--- End contact Section -->



<!--- Script Source Files -->
<!-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> -->
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->
<script src="/School1/vendor/vendor/jquery/jquery.min.js"></script>
<script src="/School1/vendor/vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>





<!--- Script Source Files -->
<!-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> -->
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->
<script src="/School1/vendor/vendor/jquery/jquery.min.js"></script>
<script src="/School1/vendor/vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>































<?php 
//include ('School1/lang/fb.php');
 include ('lang/fb.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Besteduk</title>
  <link rel="stylesheet" href="/School1/vendor/vendor/bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="/School1/css2/acc.css">
  <!-- <link rel="stylesheet" type="text/css" href="/School1/css2/Accueil.css"> -->
  <link rel="stylesheet" type="text/css" href="/School1/css2/fixed.css">
</head>


<body data-spy="scroll" data-target="#navbarResponsive">

<!--- Start Accueil Section -->

<!--- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#"> <img src="/School1/img/logo.png"/> </a>
    
    <!-- <a class="navbar-brand" href="#" ><spam>WINWATS</spam></a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#accueil"><?=lang('HOME') ?><!-- ACCUEIL --></a>
          </li>
          
          <!-- <li class="nav-item">
          <a class="nav-link" href="/School1/EspaceAdmin/index.php"><?//=lang('admin') ?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="/School1/EspaceProf/index.php"><?//=lang('profes') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceEtudiant/index.php"><?//=lang('students') ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceParent/index.php"><?//=lang('parent') ?></a>
          </li> -->
          <li class="nav-item">
          <a class="nav-link" href="#about-sec"><?=lang('about') ?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="?lang=fr"><img src="/School1/img/flags/fr.png" ></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="?lang=en"><img width="25px" height="20px" src="/School1/img/flags/gb.png" ></a>
          </li>

      </ul>
    </div>      
</nav>
<!--- End Navigation -->
<section id="accueil" >
<div id="Carousel" class="carousel slide" data-ride="carousel">
   <ol >
      <li data-target="#Carousel" data-slide-to="0" class="active"></li> 
      
     <!--  <li data-target="#Carousel" data-slide-to="1" ></li>
      <li data-target="#Carousel" data-slide-to="2" ></li> -->
   </ol>
   <div class="carousel-inner">
       <div class="carousel-item carousel-image-1 active">
          <div class="container">
              
              <div class="carousel-caption d-none d-sm-block text-right mb-5">
                 <!-- <h1 class="display-3 title-color">BEST EDUK</h1> -->
                 
                 <!-- <div class="indec"> -->
                  <table  class="tab1">
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/admin.jpeg" >
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceAdmin/index.php"><?=lang('admin') ?></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/prof.jpeg" > 
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('profes') ?></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/student.jpeg" >
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('students') ?></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img width="110" height="110" src="/School1/img/parent.jpeg" >
                      </td>
                      <td>
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('parent') ?></a>
                      </td>
                    </tr>
                    
                  </table>

                    <!-- <div class="nav-item">
                      <img width="10%" height="10%" src="/School1/img/admin.jpeg" >
                      <a class="nav-link" href="/School1/EspaceAdmin/index.php"><?=lang('admin') ?></a>
                    </div>
                      <div class="nav-item">
                        <img width="10%" height="10%" src="/School1/img/prof.jpeg" > 
                        <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('profes') ?></a>
                      </div>
                      <div class="nav-item">
                        <img width="10%" height="10%" src="/School1/img/student.jpeg" > 
                        <a class="nav-link" href="/School1/EspaceEtudiant/index.php"><?=lang('students') ?></a>
                      </div>
                      <div class="nav-item">
                        <img width="10%" height="10%" src="/School1/img/parent.jpeg" > 
                        <a class="nav-link" href="/School1/EspaceParent/index.php"><?=lang('parent') ?></a>
                      </div> -->
                 <!-- </div> -->
                <!-- lead -->
              </div>
          </div>
       </div>
      
 </div>
 </section>







<!--- Start about Section -->
<section id="about-sec" >
   <div class="container">
      <div class="row align-items-center">
         
            <div class="col-md-7 text-center">
                 <img src="/School1/img/book.jpeg" width="450" height="150" class="img-fluid watch-img">
            </div>
            <div class="col-md-4 text-lg-left text-center text-color about-text">
                <h3><?=lang('propos') ?><!-- A PROPOS DE BESTEDUK --></h3>
                <p class="text"><?=lang('best') ?>
                                </p>
                <!-- <a class="btn btn-outline-dark btn-lg" href="#">Nos activités</a><br>
                <br><a class="btn btn-outline-dark btn-lg" href="#">Showroom</a><br>
                <br><a class="btn btn-outline-dark btn-lg" href="#">Catalogue</a> -->
            </div>
       
      </div>
    </div>
</section>

<!--- End about Section -->





<!--- Start contact Section -->
<div id="contact" class="offset">
<footer>
<div class="row justify-content-center">
  <div class="col-md-5 text-center">
    <strong><?=lang('us') ?></strong>
    
    <p><div class="feature"><i class="fas fa-map-marker-alt"></i></div> Africa
          3481 Melrose Place
          DAKAR, CA 90210</p>
    <p>  <div class="feature">  <i class="fas fa-phone"></i>  </div>(123) 456-7890</p>
    <p><div class="feature"><i class="fas fa-envelope"></i></div>name@example.com </p>
    <!-- <a class="btn btn-outline-dark btn-lg" href="#">
      Contactez-nous</a> -->
    <!--  <p>Suivez-nous sur nos réseaux sociaux:</p>
    <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
    <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>-->
  </div>
  <hr class="socket">

  Copyright &copy; BEST EDUK 2020
</div>
</footer>
<a class="ot" href="/School1/EspaceMasterAdmin/index.php" >
      <?=lang('master') ?>
                      <!-- ESPACE MASTER ADMIN -->
                    </a>
</div>
<!--- End contact Section -->



<!--- Script Source Files -->
<!-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> -->
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->
<script src="/School1/vendor/vendor/jquery/jquery.min.js"></script>
<script src="/School1/vendor/vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>





<!--- Script Source Files -->
<!-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> -->
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->
<script src="/School1/vendor/vendor/jquery/jquery.min.js"></script>
<script src="/School1/vendor/vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>

























































