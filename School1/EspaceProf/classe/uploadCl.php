
<?php
session_start();
include('init.php');
include('../session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
// Include the database configuration file
/*include ('../../lang/fb.php');
require_once '../../database/dbConfig.php';
require_once '../../database/function.php';*/

//error_reporting(E_ALL | E_STRICT);
//error_reporting(0);
// If file upload form is submitted

$status = $statusMsg = '';

if(!isset($_GET['choix'])) $_GET['choix']='null';

  $status = 'error';

    // code...

  
        // Get info for prospect
        if (isset($_POST['inserer']))  {
        $nomC=$_POST['nomC'];
        $nomM=$_POST['nomM'];
        $CIN=$_POST['CIN'];
        $coef=$_POST['coef'];
        $id=$_SESSION['anneeP'];
        //echo 'je suis le Cin' . $CIN[1];
         // insert Matiere
      for ($i = 0; $i <count($nomM); $i++)

      {      

             $TableCIN[$i]=$CIN[$i];
             $insert = $db->query("INSERT into matiere(nom,coef) VALUES ('$nomM[$i]','$coef[$i]')");

             if($insert){
               $db->query($insert);
               $id_Matiere=$db->insert_id;
               printf ("New Matiere has id %d.\n", $id_Matiere=$db->insert_id);
               $id_Matieres[$i] =$id_Matiere;
               

                     $status = 'success';
                     $statusMsg = "Mat upload successfully.";
                 }else{
                     $statusMsg = "File upload failed, please try again." . $db->error;
                 }

      }
                echo 'cin: '.$TableCIN[1].  'ECHOOOOOO';
            // insert Classe
            for ($j = 0; $j <count($nomC); $j++)
    {
          $insert = $db->query("INSERT into classe(nom,anneeS) VALUES ('$nomC[$j]','$id')");
          if($insert){
          $db->query($insert);

          printf ("New Classe has id %d.\n", $id_Classe=$db->insert_id);
                $status = 'success';
                $statusMsg = "Classe upload successfully.";
            }else{
                $statusMsg = "File upload failed, please try again." . $db->error;
            }                
         
          // insert MToisieme table
    for ($t = 0; $t <count($id_Matieres); $t++)
    {   
            $insert = $db->query("INSERT into matclass(id_Mat,id_Class,id_prof) VALUES ('$id_Matieres[$t]','$id_Classe','$TableCIN[$t]')");
            if($insert){
              $db->query($insert);
                    $status = 'success';
                    $statusMsg = "bien  upload successfully.";
                    header("Location:infoCours.php");
                }else{
                    $statusMsg = "File upload failed, please try again." . $db->error;
                }

                //echo $TableCIN[$t] .'fffffffffffffffff';
 } }




            }

 
           

           if(isset($_POST['modifier'])) {
               $id=$_GET['id'];
               $nomC=$_POST['nomC'];
              

          $sql = "UPDATE classe SET nom='$nomC' WHERE id='$id'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
                 header('Location:gestionClMatProf.php');
              
               }




          





              
         


             if($_GET['choix']=='delete') {
                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM classe WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
             header('Location:gestionClMatProf.php');
          } 





             if($_GET['choix']=='deleteCours') {
                $id_Class=$_GET['id_Class'];
                $id_Mat=$_GET['id_Mat'];
                $id_prof=$_GET['id_prof'];
                $id_Cours=$_GET['id_Cours'];
              // code...
            // delete section
            $sql = "DELETE FROM cours WHERE id_Class='$id_Class' AND id_Mat='$id_Mat' AND id_prof='$id_prof' AND idCour='$id_Cours' ";

            if ($db->query($sql) === TRUE) {
              header("Location:infoCours.php?id_Class=$id_Class&id_Mat=$id_Mat&id_prof=$id_prof");
              echo "Record deleted successfully";

            } else {
              echo "Error deleting record: " . $db->error;
            }
            
          } 


          if($_GET['choix']=='deleteDevoir') {
                $id_Class=$_GET['id_Class'];
                $id_Mat=$_GET['id_Mat'];
                $id_prof=$_GET['id_prof'];
                $id_Devoir=$_GET['id_Devoir'];
                $id_Cours=$_GET['id_Cours'];
              // code...
            // delete section
            $sql = "DELETE FROM devoir WHERE  id='$id_Devoir' ";

            if ($db->query($sql) === TRUE) {
              header("Location:infoDevoir.php?id_Class=$id_Class&id_Mat=$id_Mat&id_prof=$id_prof&id_Cours=$id_Cours");
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
            
          } 


           if($_GET['choix']=='deleteSD') {
               $id_Devoir=$_GET['id_Devoir'];
               $id_Class=$_GET['id_Class'];
               $id_Mat=$_GET['id_Mat']; 
               $id_prof=$_GET['id_prof'];
                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM tablesd WHERE id='$id' ";

            if ($db->query($sql) === TRUE) {
               header("Location:infoSD.php?id_Class=$id_Class");
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
            
          } 

           if($_GET['choix']=='deleteSC') {
                
                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM tablesc WHERE id='$id' ";

            if ($db->query($sql) === TRUE) {
              header("Location:InfoSC.php?id_Cour=$id");
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
            
          } 


          if($_GET['choix']=='modifiercl') {
            echo 'eeeeeee';
               $id_Class=$_GET['id_Class'];
               $id_Mat=$_GET['id_Mat'];
               $id_prof=$_GET['id_prof'];
               $coef=$_POST['coef'];
               $nomM=$_POST['nomM'];
               $CIN=$_POST['CIN'];

          $sql = "UPDATE matclass SET id_Mat='$nomM' AND id_prof='$CIN' WHERE id_Class='$id_Class' ";
          
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
              }



           if($_GET['choix']=='supprimer') {
                $id_Mat=$_GET['id_Mat'];
                $id_Class=$_GET['id_Class'];
                $id_prof=$_GET['id_prof'];
              // code...
            // delete section
            $sql = "DELETE FROM matiere WHERE id='$id_Mat'  ";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
              header("Location:InfoClMatProf.php?id_Class=$id_Class");
            } else {
              echo "Error deleting record: " . $db->error;
            }

          } 





         


           if((isset($_POST['insert'])) AND $_GET['choix']=='modifier') {
               $id=$_GET['id'];
               $nomC=$_POST['nomC'];
                echo $nomC.'PRRR';

          $sql = "UPDATE classe SET nom='$nomC' WHERE id='$id'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
              }
         
         
         


        

    
          if (isset($_POST['insererCours'])) {
            $dest=[];
            $nom=$_POST['nomC'];
            $description=$_POST['descriptionC'];
            $id_Class=$_GET['id_Class'];
            $id_Mat=$_GET['id_Mat'];
            $id_prof=$_GET['id_prof'];
            $id=$_SESSION['anneeP'];
            $insert = $db->query("INSERT into cours(nom,description,id_Class,id_Mat,id_prof) VALUES ('$nom','$description','$id_Class','$id_Mat','$id_prof')");
            $select= $db->query("SELECT * FROM cours r join classe c join matclass t WHERE r.id_Mat=$id_Mat
             AND r.id_Class=c.id and r.id_Class=$id_Class AND c.id=t.id_Class  and
              r.id_prof='$id_prof' AND r.nom='$nom' and r.id_Mat=t.id_Mat ");
            while($row1 = $select->fetch_assoc()){
              $id_Cours=$row1['idCour'];  }
              echo 'cours: '.$id_Cours.'an: '.$id;
            if(isset($_FILES['file'])){
            foreach ($_FILES['file']['name'] as $i=>$name ) {
            $name =basename( $_FILES['file']['name'][$i]) ;
            $tmp=$_FILES['file']['tmp_name'][$i];
             $chaine="/School1/files/";
              //$chaine="/School1/files/";
           // $chaine="C:/wamp64/www/School1/files/";
            $chaine="../../files/";
            echo  '<br>cours: '.$id_Cours.'</br>'.'<br>class: '.$id_Class.'</br>'.'<br>mat: '.$id_Mat.'</br>'.
            '<br>prof: '.$id_prof.'</br>';echo 'nom fil: '.$name;
            move_uploaded_file($tmp,$chaine.$name);

            var_dump($_FILES);
            // // Upload file
            // $moved = move_uploaded_file($tmp, $chaine .$name );
           

            // if( $moved ) {
            //   echo "Successfully uploaded";         
            // } else {
            //   echo "Not uploaded because of error #".var_dump($_FILES);
            //  }
            $chaine="/School1/files/";
            array_push($dest,$chaine.$name);
            echo '<br>fichier: '.$dest[$i];
            $insert1 = $db->query("INSERT into tablesc(nom,id_Cours) VALUES ('$dest[$i]','$id_Cours')");
          }
        //header("Location:AjouterCours.php?id_Class=$id_Class");
       header("Location:infoCours.php?id_Class=$id_Class&id_Mat=$id_Mat&id_prof=$id_prof&id_Cours=$id_Cours");
         }
         }


          if(isset($_POST['modifierSD'])) {
               
              $id=$_GET['id'];
              $name = $_FILES['file']['name'] ;
              $tmp=$_FILES['file']['tmp_name'];
              $chaine='/School1/files/';
       
            move_uploaded_file($tmp,$chaine.$name);
            array_push($dest,$chaine.$name);
              
          $sql = "UPDATE tablesd SET nom='$dest' WHERE id='$id'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
                 
              
               }




               if(isset($_POST['modifierSC'])) {
               
               $id=$_GET['id'];
              
               $name = $_FILES['file']['name'] ;
              $tmp=$_FILES['file']['tmp_name'];
              $chaine='/School1/files/';
       
            move_uploaded_file($tmp,$chaine.$name);
            array_push($dest,$chaine.$name);
          $sql = "UPDATE tablesc SET nom='$dest' WHERE id='$id'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
                 
              
               }
            



            if(isset($_POST['modifierCours'])) {
               $id_Class=$_GET['id_Class'];
               $id_Mat=$_GET['id_Mat'];
               $id_prof=$_GET['id_prof'];
               $id_Cours=$_GET['id_Cours'];
               $nom=$_POST['nom'];
               $description=$_POST['description'];
              
              
                  
          $sql = "UPDATE cours SET description='$description',nom='$nom' WHERE idCour='$id_Cours'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              header("Location:infoCours.php?id_Class=$id_Class&id_Mat=$id_Mat&id_prof=$id_prof");
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
                 
              
               }





       if(isset($_POST['modifierDevoir'])) {
               $id_Class=$_GET['id_Class'];
               $id_Mat=$_GET['id_Mat'];
               $id_prof=$_GET['id_prof'];
               $id_Devoir=$_GET['id_Devoir'];
               $id_Cours=$_GET['id_Cours'];
               $nom=$_POST['nom'];
               $description=$_POST['description'];
            
          $sql = "UPDATE devoir SET description='$description',nom='$nom' WHERE id='$id_Devoir'";
          echo $id;
            if ($db->query($sql) === TRUE) {
              header("Location:infoDevoir.php?id_Devoir=$id_Devoir&id_Class=$id_Class&id_Mat=$id_Mat&id_prof=$id_prof&id_Cours=$id_Cours");
              echo "Record updated successfully";
            } else {
              echo "Error updating record: " . $db->error;
            }
                 
              
               }










        if (isset($_POST['insererDevoir'])) {
            $dest=[];
            $nom=$_POST['nom'];
            $description=$_POST['description'];
            $id_Cours=$_GET['id_Cours'];
            $id_Class=$_GET['id_Class'];
            $id_Mat=$_GET['id_Mat'];
            $id_prof=$_GET['id_prof'];
            $insert = $db->query("INSERT into devoir(nom,description,id_Cours) VALUES ('$nom','$description','$id_Cours')");
            $select= $db->query("SELECT * FROM devoir WHERE id_Cours=$id_Cours AND nom='$nom' ");
            while($row1 = $select->fetch_assoc()){
              $id_Devoir=$row1['id'];  }

            if(isset($_FILES['file'])){
            foreach ($_FILES['file']['name'] as $i=>$name ) {
            $name = $_FILES['file']['name'][$i] ;
            $tmp=$_FILES['file']['tmp_name'][$i];
            // $chaine="C:/wamp64/www/School1/files/";
            $chaine="../../files/";
       
            move_uploaded_file($tmp,$chaine.$name);
             $chaine="/School1/files/";
            array_push($dest,$chaine.$name);
            //echo " test nom: ".$dest[$i];
            $insert1 = $db->query("INSERT into tablesd(nom,id_Devoir) VALUES ('$dest[$i]','$id_Devoir')");
          }//header("Location:AjouterDevoir.php?id_Cours=$id_Cours");
          header("Location:infoDevoir.php?id_Class=$id_Class&id_Mat=$id_Mat&id_prof=$id_prof&id_Cours=$id_Cours");
         }
         }

       

         if (isset($_POST['insererSupport'])) {


            //foreach ($_FILES['file']['name'] as $name ) {
              //$file[] =var_dump($name);
              //echo 'nbr fciheirs';
              //echo count($file);
           //}
            
           
            $id_Devoir=$_GET['id_Devoir'];
            $file = $_FILES['file']['tmp_name'];
            $video = $_FILES['video']['tmp_name'];
            echo count($file);
            

      
        for ($j = 0; $j <count($file); $j++)
            {
              
              $fileContent = addslashes(file_get_contents($file[$j]));
              $videoContent = addslashes(file_get_contents($video[$j]));

         $insert = $db->query("INSERT into tablesd(nom,id_Devoir,video) VALUES ('$fileContent','$id_Devoir','$videoContent')");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
            }else{
                $statusMsg = "File upload failed, please try again." . $db->error;
            }
            }
            }



        
          








// Display status message
echo $statusMsg;
?>
<!-- <a href="view.php">view</a>
 -->

































           