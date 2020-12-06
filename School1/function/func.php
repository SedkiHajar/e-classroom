<?php
/*title function  
**has the variable $page title and echo default title for other pages
*/

function getTitle(){
	global $pageTitle;
	if(isset($pageTitle)){

		echo $pageTitle;

	}else{
        echo 'Default';
	}
}

/*check item version1
**FUNCTION to check item in database[fct accept parameters]
**$select item to select exemple :user,item 
**$from =the table to select from[exemple :user]
**$value=value of select [exemple:zineb ,box,smartphone]
*/

function checkItem($select,$from,$value){
	global $db;
	$sql="SELECT $select FROM $from where $select='$value'";
	$row=mysqli_query($db,$sql);
	$count = $row->num_rows;
	
	return $count;
}
//recupere nom d 'ecole'
function getEcoleofAdmin($id,$select,$from,$value){
  global $db;
  $sql="SELECT $select FROM $from where $id='$value'";
  $ses_sql=mysqli_query($db,$sql);
  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $nomEt = $row["$select"];
  return $nomEt;
  
}

// function getEcoleofAdmin($idProf,$nom,$from,$value){
// 	global $db;
// 	$sql="SELECT $nom FROM $from where $idProf='$value'";
// 	$row=mysqli_query($db,$sql);
// 	$nomE = $row["$nom"];
	
// 	return $nomE;
// }




/*REDIRECT FUNCTION THIS FUNCTION ACCEPT PARAMETERS
**$errormessage=echo the error message
**$seconds=seconds before redirecting
*/

// function redirectHome($errorMsg,$seconds=3){
// 	echo "<div class='alert alert-danger'>$errorMsg</div>";
// 	echo "<div class='alert alert-info'>Vous serez redirigé vers la page d'accueil après $seconds secondes</div>";
// 	header("refresh:$seconds;url=index.php");
// 	exit();

// }
function redirectPage($errorMsg,$seconds=3,$url){
	echo "<div class='alert alert-danger'>$errorMsg</div>";
	echo "<div class='alert alert-info'>".lang('redir')." .</div>";
	//"Vous serez redirigé vers la page précedente après $seconds secondes .</div>";
	header("refresh:$seconds;url=$url");
	exit();

}

function redirectPageS($Msg,$seconds=3,$url){
	echo "<div class='alert alert-success'>$Msg</div>";
	echo "<div class='alert alert-info'>".lang('redir')." .</div>";
	//Vous serez redirigé vers la page précedente après $seconds secondes .</div>";
	header("refresh:$seconds;url=$url");
	exit();

}

/******* function redirection */
function redirectS($seconds=3,$url){
	
	echo "<div class='alert alert-info'>".lang('redir')." .</div>";
	//Vous serez redirigé vers la page précedente après $seconds secondes .</div>";
	header("refresh:$seconds;url=$url");
	exit();

}
/****
function retourner a la page
*/
function redirectHome($theMsg,$url=null,$seconds=3){
	if($url==null){
		$url='index.php';
		$link=lang('homep');
	}
	else{
		if(isset($_SERVER['HTTP_REFERER']) && 
			$_SERVER['HTTP_REFERER']!=='')
			{$url=$_SERVER['HTTP_REFERER'];
		$link=lang('prev');
		//'La Page Précedente';
	}else{
		$url='index.php';
		$link=lang('acc');
		//'La Page d\'Accueil';
	}
			

		
		
	}
	echo $theMsg;
	echo "<div class='alert alert-info'>Vous serez redirigé vers $link après 
	$seconds secondes.</div>";
	header("refresh:$seconds;url=$url");
	exit();

}
?>