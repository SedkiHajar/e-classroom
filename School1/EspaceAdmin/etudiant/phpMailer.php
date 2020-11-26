<?php 
require_once '../../database/dbConfig.php';
include('../session.php');
$p = "gesE";
$param = "gesE" ;
//require '../defaultAdmin.php';?>

<!-- slect info from table -->



<?php include 'sendemail.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Send email</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>

    <!--alert messages start-->
    <?php //echo $alert; ?>
    <!--alert messages end-->

    <!--contact section start-->
    
     <div class="contact-form">
      <center>
        <h4 class="sent-notification"></h4>
        <form  class="contact" action="" method="post" id="myForm">
          <h2>Contacter l'étudiant</h2>
          <label>Nom</label>
          <input type="text" id="name" name="name" class="text-box" placeholder="Nom de l'étudiant" required>
          <br><br>
          <label>Email</label>
          <input type="email" id="email"  name="email" class="text-box" placeholder= "Email de l'étudiant(identifiant)" required>
          <br><br>
          <label>Subject</label>
          <input type="text"  class="text-box" name="subject" placeholder="sujet" id="subject" required>
          <br><br>
          <p>Message</p>
          <textarea id="body" rows="5" cols="30" name="body" placeholder="saisir le password de l'étudiant" required></textarea>
           <br><br> 
           <input type="submit" name="submit" class="btn btn-primary" value="Envoyer">
          <!-- <button type="button" onclick="sendEmail()" value="" name="submit">Envoyer</button> -->
        </form>
      </center>
    </div>
    <!--contact section end-->

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
    function sendEmail(){
      var name=$("#name");
      var email=$("#email");
      var subject=$("#subject");
      var body=$("#body");
      if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
        $.ajax({
          url:'sendEmail.php',
          method:'POST',
          dataType:'json';
          data:{
            name:name.val(),
            email:email.val(),
            subject:subject.val(),
            body:body.val()


          },success:function(response){
            $('#myForm')[0].reset();
            $('.sent-notification').text("Message sent successfully.");
          }
        })
      }

    }

    function isNotEmpty(caller){
      if(caller.val==""){
        caller.css('border','1px solid red');
        return false;
      }
      else
      {
        caller.css('border','1px solid green');
        return true;
      }
    }

    
    </script>

  </body>
</html>
                           