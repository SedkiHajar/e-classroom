<?php
include ('School1/lang/fb.php');
//include ('lang/fb.php');
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BEST EDUK</title>

  <!-- Bootstrap core CSS -->
  <link href="/School1/vendor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/School1/vendor/css/business-frontpage.css" rel="stylesheet">
<style type="text/css">
    a.ot:hover {
      color: white;
    }
     a.ot {
      color: #535c68;
    }
    header{
      background-image: url("/School1/img/logoBEST.jpg");
      /* background-size: 300px 100px;*/
      /*background-repeat: no-repeat;*/
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
    <div class="container bod">
      <img src="/School1/img/logoBEST.jpg" width="8%" height="8%">
      <a class="navbar-brand" href="#">BEST EDUK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"><?=lang('HOME') ?><!-- ACCUEIL -->
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li> 
            <a class="nav-link" href="?lang=fr"><img src="/School1/img/flags/fr.png" ></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="?lang=en"><img width="25px" height="20px" src="/School1/img/flags/gb.png" ></a>
          </li>
    
   
          <!-- <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceMasterAdmin/login.php">Master ADMIN</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceAdmin/index.php"><?=lang('admin') ?><!-- ADMIN --></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceProf/index.php"><?=lang('profes') ?><!-- PROFESSEUR --></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceEtudiant/index.php"><?=lang('students') ?><!-- ETUDIANT --></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/School1/EspaceParent/index.php"><?=lang('parent') ?><!-- PARENT --></a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class=" py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">BEST EDUK</h1>
          <p class="lead mb-5 text-white-50"><?=lang('best') ?><!-- Plus besoin de se déplacer dans un centre de formation ou de faire venir un élève à l'école… 
          L'e-learning recouvre toutes les méthodes de formation s'appuyant sur l'outil informatique. Cette définition large inclut  :

des supports en ligne ou hors-ligne,
un apprentissage individuel ou collectif,
des formateurs présent à distance. --></p>
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <!--<div class="col-md-8 mb-5">
        <h2>What We Do</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
        
      </div>-->

      <div id=contact class="col-md-12 mb-5 ">
        <h2><?=lang('us') ?></h2>
        <hr>
        <address>
          <strong>Africa</strong>
          3481 Melrose Place
          DAKAR, CA 90210
          
        </address>
        <address>
          <abbr title="Phone">Tel:</abbr>
          (123) 456-7890
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">name@example.com</a>
        </address>
      </div>



    </div>
    <!-- /.row -->

    
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-secondary">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; BEST EDUK 2020</p>
    </div>
     <a class="ot" href="/School1/EspaceMasterAdmin/index.php" >
      <?=lang('master') ?>
                      <!-- ESPACE MASTER ADMIN -->
                    </a>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/School1/vendor/vendor/jquery/jquery.min.js"></script>
  <script src="/School1/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
