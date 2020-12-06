<?php
include ('lang/fb.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BEST EDUK</title>
  <style type="text/css">
    a.ot:hover {
      color: white;
    }
  </style>

  <!-- Bootstrap core CSS -->
  <link href="/School1/vendor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/School1/vendor/css/business-frontpage.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">
  <!-- start language -->
   <h3><?=lang('0') ?></h3>
    
    <a href="?lang=fr"><img src="/School1/img/flags/fr.png" ></a>
    <a href="?lang=en"><img src="/School1/img/flags/gb.png" ></a>
    <!-- <a href="index.php?lang=ar"><img src="/School1/img/flags/ma.png" ></a> -->
 

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="row">

              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-6 "><img src="/School1/img/logoBEST.jpg" width="100%" height="100%"></div>




              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?=lang('1') ?></h1>
                  </div>
                  <div class="">
                  <form class="user">







                    <a href="/School1/EspaceAdmin/index.php" class="btn btn-primary btn-user btn-block">
                      <?=lang('2') ?>
                    </a>
                    <a href="/School1/EspaceProf/index.php" class="btn btn-primary btn-user btn-block">
                     <?=lang('3') ?>
                    </a>
                    <a href="/School1/EspaceEtudiant/index.php" class="btn btn-primary btn-user btn-block">
                      <?=lang('4') ?>
                    </a>
                    <a href="/School1/EspaceParent/index.php" class="btn btn-primary btn-user btn-block">
                      <?=lang('5') ?>
                    </a>

                    <hr>

                  </form>
                </div>
                  <hr>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 <!-- Footer -->
  <footer class="py-5 bg-primary">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; BEST EDUK 2020</p>
    </div>
     <a class="ot" href="/School1/EspaceMasterAdmin/index.php" >
      <?=lang('6') ?>
                      <!-- ESPACE MASTER ADMIN -->
                    </a>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/School1/vendor/vendor/jquery/jquery.min.js"></script>
  <script src="/School1/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
