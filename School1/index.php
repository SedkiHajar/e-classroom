
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BEST EDUK</title>

  <!-- Bootstrap core CSS -->
  <link href="School1/vendor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="School1/vendor/css/business-frontpage.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

  <div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="row">

              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <!-- <div class="col-lg-6 "><img src="img/i.jpg" width="100%" height="100%"></div> -->




              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue!</h1>
                  </div>
                  <div class="">
                  <form class="user">
                   
                   
                    

              


                    <a href="/School1/EspaceAdmin/login.php" class="btn btn-primary btn-user btn-block">
                      ESPACE ADMIN
                    </a>
                    <a href="/School1/EspaceProf/login.php" class="btn btn-primary btn-user btn-block">
                      ESPACE PROFESSEUR
                    </a>
                    <a href="/School1/EspaceEtudiant/login.php" class="btn btn-primary btn-user btn-block">
                      ESPACE ETUDIANT
                    </a> 
                    <a href="/School1/EspaceParent/login.php" class="btn btn-primary btn-user btn-block">
                      ESPACE PARENT
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
     <a href="/School1/EspaceMasterAdmin/login.php" >
                      ESPACE MASTER ADMIN
                    </a>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="School1/vendor/vendor/jquery/jquery.min.js"></script>
  <script src="School1/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>





                                                      <!--   <div class="col-md-6">
                                                              
                                                              <?php $id_class= $row['classe']; //echo $id_class;?>                      
                                                   <?php   $result1 = $db->query("SELECT * FROM classe WHERE idC='$id_class'");?>  
                                                <?php while($row1 = $result1->fetch_assoc()){?> 
                                              
                                                              <label for="classe">Classe</label>
                                                                      
                                                          </div>  
                                                          <div class="col-md-6">  
                                                             <select class="custom-select" name="classe" id="">
                                                               <option selected value="<?php echo $row['idC']; ?>" ><?php echo $row1['nomC']; ?></option><?php } ?>
                                                              <?php
                
                                                            $result = $db->query("SELECT distinct c.idC,c.nomC FROM classe c join etudiant e where c.anneeS=e.anneeS ");
                
                                                               ?>
                                                             <?php while ($row =$result->fetch_assoc()) {
                                                               ?>
                                                       <option value="<?php echo $row['idC']; ?>" ><?php echo $row['nomC']; ?>
                                                       </option>
                                                       <?php
                                                        }
                                                         ?>
                                                                </select>
                                                          </div>


                                                      </div>
 -->