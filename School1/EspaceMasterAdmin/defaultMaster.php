<?php error_reporting(0);
  if(!isset($_SESSION['id']) or !isset($_SESSION['mailM'])  ){
      header("location:/School1/EspaceMasterAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
 $master=$_SESSION['id'];
 //echo $id_prof;
//nombre de notification
//1 master 2 admin 3 prof 4 etu 5 parent
//rang different a 1 du master
$query = "SELECT * from notifications where `status` = 'unread' and droitNo=0 and rang!=1  and id_mast=$master order by ordering,`date` DESC";
//

$query1 = "SELECT * from `notifications`  where rang!=1 and droitNo=0 and id_mast=$master
order by ordering,`date` DESC";

//msg envoye par le master rang =1
$messg = "SELECT * from notifications where  rang=1 and droitmsg=0 and `status` = 'unread'  and id_mast=$master  order by `date` DESC";
//

$messg1 = "SELECT * from `notifications`  where rang=1 and droitmsg=0 and id_mast=$master  
order by  ordering, `date` DESC ";      
 
 
?>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="sidebar-brand-text col-md-2">
                <img class="img-profile rounded-circle " src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode( $_SESSION['logo']); ?>">
              BEST EDUK</div>
              </a>
            </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->

      <li class="nav-item <?php if($param == "dash" ) echo("active") ?>">
        <a class="nav-link" id="d" href="/School1/EspaceMasterAdmin/welcome.php">
          <i class="fas fa-home fa-2x"></i>
          <span><?= lang('HOME') ?><!-- Dashboard --></span></a>
      </li>
      <!-- Divider -->
    <!--   <hr class="sidebar-divider"> -->
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item <?php if($param == "ajoA" or $param == "gesA") echo("active") ?>">
        <a class="nav-link <?php if($param != "ajoA" and $param != "gesA") echo("collapsed")?>" href="#" data-toggle="collapse" data-target="#collapseProf" aria-expanded="true" aria-controls="collapseProf">
          <i class="fas fa-fw fa-cog"></i>
          <span><?= lang('Gadmin') ?><!-- Espace Admin --></span>
        </a>
        <div id="collapseProf" class="collapse <?php if($param == "ajoA" or $param == "gesA") echo("show") ?>" aria-labelledby="headingProf" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if($param == "ajoA") echo("active") ?>" href="/School1/EspaceMasterAdmin/AjouterMadmin.php"><?= lang('Adda') ?><!-- Ajouter les Admin --></a>
            <a class="collapse-item <?php if($param == "gesA") echo("active") ?>" href="/School1/EspaceMasterAdmin/gestionMadmin.php"><?= lang('seea') ?><!-- Gerer les Admin --></a>
          </div>
        </div>
      </li>

      <!-- envoyer message -->
      <li class="nav-item <?php if($param == "env")  echo("active") ?>">
        <a class="nav-link" id="d" href="/School1/EspaceMasterAdmin/message.php">
          <i class="fas fa-envelope fa-2x"></i>
          <span><?= lang('msgA') ?><!-- Envoyer Message à la Direction --></span></a>
      </li>

     <!--  <li class="nav-item <?php if($param == "env") echo("active") ?>">
        <a class="nav-link <?php if($param != "env") echo("collapsed")?>" href="#" data-toggle="collapse" data-target="#collapseEnv" aria-expanded="true" aria-controls="collapseEnv">
          <i class="fa fa-bullhorn fa-2x"></i>
          <span>Envoyer Message</span>
        </a>
        <div id="collapseEnv" class="collapse <?php if($param == "env") echo("show") ?>" aria-labelledby="headingProf" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if($param == "env") echo("active") ?>" href="/School1/EspaceMasterAdmin/message.php">Au Admin</a>
            
          </div>
        </div>
      </li> -->



      
      <!-- Nav Item - Etudiant item -->
      



      <!-- <li class="nav-item ">
        <a class="nav-link collapsed" href="/School1/EspaceAdmin/parent/gestionParent.php" data-toggle="collapse" data-target="#collapseParent" aria-expanded="true" aria-controls="collapseParent">
          <i class="fas fa-user"></i>
          <span>Espace Parent</span>
        </a>
        <div id="collapseParent" class="collapse" aria-labelledby="headingParent" data-parent="#accordionSidebar">

        </div>
      </li> -->

      <!-- Divider -->
      <!-- Nav Item - Prof item -->
      



      <!--<hr class="sidebar-divider">-->
      <!-- Nav Item - matiere item -->
      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMat" aria-expanded="true" aria-controls="collapseMat">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace Matiere</span>
        </a>
        <div id="collapseMat" class="collapse" aria-labelledby="headingMat" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School/EspaceAdmin/matiere/AjouterMat.php">Ajouter les matieres</a>
            <a class="collapse-item" href="/School/EspaceAdmin/matiere/gestionMat.php">Gerer les matieres</a>
          </div>
        </div>
      </li>-->


      <!-- Nav Item - class item -->
      

      




      



       <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?=lang('leave') ?><!-- Ready to Leave? --></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?=lang('ready') ?><!-- Select "Logout" below if you are ready to end your current session. --></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?=lang('cancel') ?><!-- Cancel --></button>
          <a class="btn btn-primary" href="/School1/EspaceMasterAdmin/logout.php"><?=lang('logout') ?><!-- Logout --></a>
        </div>
      </div>
    </div>
  </div>



      <!-- Nav Item - Utilities Collapse Menu -->
       <!--<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>-->
      <!-- Divider -->
      <!--<hr class="sidebar-divider">-->
      <!-- Heading -->
      <!--<div class="sidebar-heading">
        Addons
      </div>-->
      <!-- Nav Item - Pages Collapse Menu -->
      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>-->
      <!-- Nav Item - Charts -->
      <!--<li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>-->
      <!-- Nav Item - Tables -->
      <!--<li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>-->
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
         


     


         <!--  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!--   <div class="row">
           <h5 class="form-control" style="color:blue;"> -->
            <!-- Changer la langue: -->
  
    <!--  <a href="?lang=fr"><img src="/School1/img/flags/fr.png" ></a>
  
  
    <a href="?lang=en"><img src="/School1/img/flags/gb.png" ></a>
  
</div>    -->



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
                <i class="fas fa-bell  fa-1x" style="color:blue"></i>
                <!-- Counter - Alerts -->
               <?php if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-danger badge-counter" style="font-size: 12px;">
                  <?php echo count(fetchAll($query));?>+
                 </span>
                  <?php
                }
                    ?>
              
                
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifications</h6>
                  <?php
                   if(count(fetchAll($query1))>0){
                     foreach(fetchAll($query1) as $i) {
                ?>
              <a style="<?php if($i['status']=='unread'){
                                echo "background-color: #dff9fb;font-weight:bold; ";
                            }
                         ?> " class="dropdown-item d-flex align-items-center" href="/School1/EspaceMasterAdmin/notifM.php?do=not&idNo=<?php echo  $i['idNotif']?>"
                         
              >
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    
                    <div class="" style="<?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;font-size:12px;color:#4834d4;";
                            }else{echo "font-size:12px;color:#4834d4;";}
                         ?>">
                      <?php echo date('F j, Y, g:i a',strtotime($i['date']));?></div>
                    <div class="" style="<?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;font-size:13px;color:#22a6b3;";
                            }else{echo "font-size:13px;color:#4834d4;";}
                         ?>">
                      <?php echo $i['emetteur'];?></div>  
                    <?php echo $i['message'];?>
                    
                  </div>
                </a>
                <?php  }?>
                <?php  } else { ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Aucune notification</a><?php }?>
              </div>
            </li>
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a> -->
                <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a> -->
              
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-1x" style="color:blue;"></i>
                <!-- Counter - Messages -->
                <?php if(count(fetchAll($messg))>0){
                ?>
                <span class="badge badge-danger badge-counter" style="font-size: 12px;">
                <?php echo count(fetchAll($messg));?></span>
                <?php
                }
                    ?>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated -grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  <?= lang('msg')?>
                  <!-- Message Envoyé -->
                </h6>
                <?php
                   if(count(fetchAll($messg1))>0){
                     foreach(fetchAll($messg1) as $i) { ?>
                <a class="dropdown-item d-flex align-items-center" href="/School1/EspaceMasterAdmin/notifM.php?do=msg&idNo=<?php echo  $i['idNotif']?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="/School1/img/user.png" alt="">
                    <!-- <div class="status-indicator bg-success">
                    https://source.unsplash.com/fn_BT9fwg_E/60x60</div> -->
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate" style="<?php if($i['status']=='unread'){
                                echo "font-weight: normal; font-size:13px;color:#30336b; ";
                            }
                         ?>"><?php echo $i['message']; ?></div>
                    <div class="small text-gray-500"><?php echo $i['destinataire'].' '; ?>
                      <?php echo date('G:i',strtotime($i['date'])).'  ';?><i style="<?php if($i['status']=='read'){
                                echo "color:blue; ";
                            }
                         ?>" class="fas fa-eye"></i></div>
                  </div>
                </a>
                <?php  }?>
                <?php  } else { ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Aucun message envoyé</a><?php }?>
            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
            <!-- Nav Item - User Information -->
          </div>
        </li>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#"  id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucwords($login_session);?></span>
                <img class="img-profile rounded-circle" src="data:image/jpg;charset=utf8;base64,<?php  echo base64_encode( $_SESSION['image']); ?>">
              </a>
           <!--  </li> -->
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="/School1/EspaceMasterAdmin/profilM.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  //lang('logout') ?> Profile
                </a> -->
                <a class="dropdown-item" href="?lang=fr">
                  <img class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400" src="/School1/img/flags/fr.png" >
                  <!-- franc -->
                </a>
                 <a class="dropdown-item" href="?lang=en">
                  <img class="fas fa-cogs fa-sm fa-fw mr-4 text-gray-400" width="2px" src="/School1/img/flags/en.png" >
                  <!-- Settings -->
                </a>
               <!--  <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <!-- <a class="btn btn-primary" href="index2.php?action=logout">Logout</a> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?= lang('logout')?><!-- Logout -->
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          
