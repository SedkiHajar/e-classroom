<?php //error_reporting(0); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="sidebar-brand-text col-md-2">
                  <?php $id_admin=$_SESSION['id_admin'] ?>
                <?php   $result = $db->query("SELECT * FROM admin WHERE id='$id_admin' ");
                if($result->num_rows > 0){?>
               <?php while($row = $result->fetch_assoc()){?>
                <img class="img-profile rounded-circle " src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode( $row['image']); ?>">
              <?php echo $row['nomE']; ?></div>
              </a>
            </li><?php }} ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($param == "dash" ) echo("active") ?>">
        <a class="nav-link" href="/School1/EspaceProf/welcome.php">
          <i class="fas fa-home fa-2x"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Etudiant item -->
      </li>
       <!-- <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Profil</span>
        </a>
        
      </li> -->
    
      
      <!-- Divider -->
      <!-- Nav Item - Prof item -->
      



      <!--<hr class="sidebar-divider">-->
      <!-- Nav Item - matiere item -->
      


      <!-- Nav Item - class item -->
      
       <!-- Nav Item - class item -->
       
       <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/School1/EspaceAdmin/index2.php?action=logout">Logout</a>
        </div>
      </div>
    </div>
  </div>


     
       <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCl" aria-expanded="true" aria-controls="collapseCl">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace classe</span>
        </a>
        <div id="collapseCl" class="collapse" aria-labelledby="headingCl" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School/EspaceProf/classe/AjouterCl.php">Ajouter les classes<br>et les matieres</a> -->
            <!-- <a class="collapse-item" href="/School/EspaceProf/classe/infoMatieres.php?id_prof=<?php echo $id_Prof;?>">Gerer les classes</a>  
            
          </div>
        </div>
      </li>
 -->
        <li class="nav-item <?php if($param == "gesC" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceProf/classe/infoMatieres.php?id_prof=<?php echo $id_Prof;?>">
          <i class="fa fa-folder-open fa-2x"></i>
          <span>Gestion des cours</span>
        </a>
      </li>

        <li class="nav-item <?php if($param == "gesA" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceProf/abs.php">
          <i class="fa fa-list-alt fa-2x"></i>
          <span>Gestion d'absence</span>
        </a>
      </li>


        <li class="nav-item <?php if($param == "gesN" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceProf/note.php">
          <i class="fas fa-marker"></i>
          <span>Gestion de notes</span>
        </a>
      </li>



       


       <li class="nav-item <?php if($param == "gesT" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceProf/classe/emploisProf.php">
          <i class="far fa-calendar-alt"></i>
          <span>Emploi du temps</span>
        </a>
      </li>
       
      <!--  <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Emploi du temps</span>
        </a>
       </li> -->

      <!--  <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace Parental</span>
        </a>
       </li> -->

      <!--  <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace Admin</span>
        </a>
        </li> -->
   
      <!-- Heading -->
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->

          <?php   $email= $_SESSION['mail'] ; ?>
          <h3 style="color: green;">Année scolaire:</h3> 
         <?php 
         //echo $email;
          $result1 = $db->query("SELECT * from annees a join professeur p where a.id=p.anneeS and p.mail='$email' ");
               
                  // boucle sur les données
                  ?>
                  <?php while ($row =$result1->fetch_assoc()) {
                    echo '<h3 style="color: black";>' .$row['nomA']. '</h3>';$_SESSION['anneeP'] = $row['id'];}
                   // echo'anne: '. $_SESSION['anneeP'];

                  ?>




          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $login_session;?></span>
                <img class="img-profile rounded-circle"src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode( $_SESSION['image']); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <!--  <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">