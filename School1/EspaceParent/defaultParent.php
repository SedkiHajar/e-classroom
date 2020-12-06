<?php 
if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
      header("location:/School1/EspaceParent/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
$parent=$_SESSION['idP'];
 
 //echo $id_prof;
//nombre de notification
//1 master 2 admin 3 prof 4 etu 5 parent
//rang different a 5 du master
$query = "SELECT * from notifications where `status` = 'unread' and rang!=5 and droitNo=0  and id_par=$parent order by ordering,`date` DESC";
//

$query1 = "SELECT * from `notifications`  where rang!=5  and droitNo=0  and id_par=$parent
order by ordering,`date` DESC";

//msg envoye par le master rang =5
$messg = "SELECT * from notifications where  rang=5 and `status` = 'unread' and droitmsg=0  and id_par=$parent order by `date` DESC";
//

$messg1 = "SELECT * from `notifications`  where rang=5 and droitmsg=0 and id_par=$parent  
order by  ordering, `date` DESC ";      
?>


<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="sidebar-brand-text col-md-2">
                  <?php $id_admin=$_SESSION['id_adminP'] ?>
                <?php   $result = $db->query("SELECT * FROM admin WHERE id='$id_admin' ");
                if($result->num_rows > 0){?>
               <?php while($row = $result->fetch_assoc()){ ?>
                <?php if($row['avatarA']=='0' or empty($row['avatarA'])) { ?>
      <img class="img-profile rounded-circle" src="/School1/EspaceAdmin/etudiant/uploads/avatars/user.png" alt=""/> 
        <?php } 
         else { ?>
          <img class="img-profile rounded-circle" src="<?='/School1/EspaceMasterAdmin/uploads/avatars/'.$row['avatarA']?>" alt='avatar'/> 
                  <?php }

               ?>
                <!-- <img class="img-profile rounded-circle " src="data:image/jpg;charset=utf8;base64,<?php  echo base64_encode( $row['image']); ?>"> -->
              <?php echo strtoupper($row['nomE']); ?></div>
              </a>
            </li><?php }} ?>
     <!--  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Parent de <sup><?=ucwords($logine_session);?></sup></div>
      </a> -->
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($param == "dash" ) echo("active") ?>">
        <a class="nav-link" href="welcome.php">
          <i class="fas fa-home fa-2x"></i>
          <span><?=lang('HOME') ?></span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

       <!-- annoncer une notif -->
        <li class="nav-item <?php if($param == "anP" or $param == "anA") echo("active") ?>">
        <a class="nav-link <?php if($param != "anP" and  $param != "anA") echo("collapsed")?>" href="#" data-toggle="collapse" data-target="#collapsean" aria-expanded="true" aria-controls="collapsea">
        <!--   <i class="fa fa-bullhorn fa-2x"></i> -->
           <i class="fas fa-envelope fa-2x"></i>
          <span><?=lang('15') ?><!-- Envoyer un message --></span>
        </a>
        <div id="collapsean" class="collapse <?php if($param == "anA"  or $param == "anP") echo("show") ?>" aria-labelledby="headinga" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if($param == "anA") echo("active") ?>" href="/School1/EspaceParent/message.php?do=Adm">
           <?=lang('toA') ?></a>
            
            <a class="collapse-item <?php if($param == "anP") echo("active") ?>" href="/School1/EspaceParent/message.php?do=Pro">
              <?=lang('toP') ?></a>
          </div>
        </div>
      </li>

      </li>
       <!-- <li class="nav-item <?php if($param == "pro" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceParent/profilPar.php">
          <i class="fa fa-user fa-2x"></i>
          <span>Profile</span>
        </a>
        
      </li> -->
      <!-- Nav Item - Etudiant item -->
     <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace Etudiant</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School1/EspaceAdmin/etudiant/AjouterEtudiant.php">Ajouter cours</a>
            <a class="collapse-item" href="/School1/EspaceAdmin/etudiant/gestionEtudiant.php">Gestion des cour</a>
          </div>
        </div>
      </li> -->



      <li class="nav-item <?php if($param == "gesM" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceParent/coursEtud.php">
          <i class="fa fa-folder-open fa-2x"></i>
          <span><?=lang('subjp')  ?><!-- Les matieres --></span>
        </a>
      </li>
      <!-- Divider -->
      <!-- Nav Item - Prof item -->

      <li class="nav-item <?php if($param == "gesN" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceParent/noteEtude0.php">
          <i class="fas fa-marker"></i>
          <span><?=lang('notesp')  ?><!-- Les Notes --></span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProf" aria-expanded="true" aria-controls="collapseProf">
          <i class="fas fa-fw fa-cog"></i>
          <span>Notes et apreciation</span>
        </a>
        <div id="collapseProf" class="collapse" aria-labelledby="headingProf" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School1/EspaceAdmin/prof/AjouterProf.php">Mes matieres</a>
            <a class="collapse-item" href="/School1/EspaceAdmin/prof/gestionProf.php">Note</a>
          </div>
        </div>
      </li> -->
       <li class="nav-item <?php if($param == "gesT" ) echo("active") ?>">
        <a class="nav-link " href="/School1/EspaceParent/emploisEtud.php">
          <i class="far fa-calendar-alt"></i>
          <span><?=lang('shed')  ?><!-- Emploi du temps --></span>
        </a>
      </li>



      <!--<hr class="sidebar-divider">-->
      <!-- Nav Item - matiere item -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMat" aria-expanded="true" aria-controls="collapseMat">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace Matiere</span>
        </a>
        <div id="collapseMat" class="collapse" aria-labelledby="headingMat" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School1/EspaceAdmin/matiere/AjouterMat.php">Programer un examen</a>
            <a class="collapse-item" href="/School1/EspaceAdmin/matiere/gestionMat.php">Gerer les examens</a>
          </div>
        </div>
      </li> -->


      <!-- Nav Item - class item -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCl" aria-expanded="true" aria-controls="collapseCl">
          <i class="fas fa-fw fa-cog"></i>
          <span>Espace Classe</span>
        </a>
        <div id="collapseCl" class="collapse" aria-labelledby="headingCl" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School1/EspaceAdmin/classe/AjouterCl.php">espace parent</a>
            <a class="collapse-item" href="/School1/EspaceAdmin/classe/gestionCl.php"></a>
          </div>
        </div>
      </li> -->


             
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
          <!-- <a class="btn btn-primary" href="/School1/EspaceAdmin/index2.php?action=logout">Logout</a> -->
          <a class="btn btn-primary" href="/School1/EspaceParent/logout.php"><?=lang('logout') ?><!-- Logout --></a>
        </div>
      </div>
    </div>
  </div>



       <!-- Nav Item - class item -->
       <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCl" aria-expanded="true" aria-controls="collapseCl">
          <i class="fas fa-fw fa-cog"></i>
          <span>Emploi du temps</span>
        </a>
        <div id="collapseCl" class="collapse" aria-labelledby="headingCl" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/School1/EspaceEtudiant/emploisEtud.php">emplois du temps</a>
            <a class="collapse-item" href="/School1/EspaceAdmin/classe/gestionCl.php"></a>
          </div>
        </div>
      </li> -->
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
       <!--  Addons -->
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a> -->
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a> -->
          </div>
        </div>
      </li>
      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->
      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->
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

   <?php   $cin=$_SESSION['CIN']; ?>
         <h3 style="color: green;"><?=lang('12')  ?><!-- Année scolaire -->:</h3> 
         <?php 
         //echo $email;
          $result1 = $db->query("SELECT * from annees a join etudiant p where a.idAn=p.anneeS and p.CIN='$cin' ");
               
                  // boucle sur les données
                  ?>
                  <?php while ($row =$result1->fetch_assoc()) {
                    echo '<h3 style="color: black";>' .$row['nomA']. '</h3>';$_SESSION['anneeE'] = $row['idAn'];}
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
                         ?> " class="dropdown-item d-flex align-items-center" href="/School1/EspaceParent/notifE.php?do=not&idNo=<?php echo  $i['idNotif']?>" 
                         
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
                <a class="dropdown-item text-center small text-gray-500" href="#"><?lang('noAle')  ?><!-- Aucune notification --></a><?php }?>
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
              <a  class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                   <?=lang('msg') ?><!-- Message Envoyé -->
                </h6>
                <?php
                   if(count(fetchAll($messg1))>0){
                     foreach(fetchAll($messg1) as $i) { ?>
                <a class="dropdown-item d-flex align-items-center" href="/School1/EspaceParent/notifE.php?do=msg&idNo=<?php echo $i['idNotif'] ?>">
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
                <a class="dropdown-item text-center small text-gray-500" href="#"> <?=lang('noMsg') ?><!-- Aucun message envoyé --></a><?php }?>
            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo strtoupper($login_sessionP);?></span>
                <!-- <img class="img-profile rounded-circle" src="data:image/jpg;charset=utf8;base64,<?php //echo base64_encode( $_SESSION['image']); ?>"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/School1/EspaceParent/profilPar.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?=lang('profil') ?> <!-- Profile -->
                </a>
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
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 <?=lang('logout') ?> <!-- Logout -->
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">