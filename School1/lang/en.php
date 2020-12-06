<?php
function lang($phrase){
	static $lang = array(
		//index page
		'about'    =>'ABOUT',
        'propos'   =>'ABOUT BESTEDUK',
		'and'      =>'and',
		'us'        =>'Contact Us',
		'best'      =>"No need to go to a training center or have a student come to school ... E-learning covers all training methods 			based on the computer tool. This broad definition includes: online or offline supports, individual or 						collective learning, trainers present at a distance.",
		//logout
		'logout'   =>"Logout",
		 'res'      => "Reset",  
		 //logout modal
		'leave'    =>'Ready to Leave?',
		'ready'      =>'Select "Logout" below if you are ready to end your current session.',
		'cancel'   =>'Cancel',
		//index page
		'0'         =>'Choose the language',
		'ch'         =>'Change the language',
		'1' 		=> 'Welcome' ,
		'2' 		=> 'ADMINISTRATION AREA',
		'3' 		=> 'TEACHER AREA' ,
		'4' 		=> 'STUDENT AREA' ,
		'5'			=> 'PARENT AREA' ,
		'6' 		=> 'MASTER ADMIN AREA',
		'admin' 	  => 'ADMINISTRATION',
		'profes' 	  => 'TEACHER' ,
		'students' 	  => 'STUDENT' ,
		'parent'	   => 'PARENT' ,
		'master' 	  => 'MASTER ADMIN',
		//page login
		//admin
		'7'         =>'Back',
        '8'       	=>'Enter your Email' ,
		'9'       	=>'Enter your Password',
		'10'        =>'Login in' ,
		//page welcome admin
		'welcome'  =>'IN YOUR ADMINISTRATION AREA',
		//welcome master
		'welcomeM' =>'IN YOUR MASTER ADMIN AREA',
		'11'       =>"Choose the school year",
		'12'       =>'School year' ,
		'13'        =>'Login in',
		'14'        =>'Welcome Admin'  ,
		//traitannonce admin
		'reussi'         =>'The message was sent to ',
		'echec'          =>'Message not yet sent!',
		'redir'          =>'You will be redirected automatically. Thank you for your patience',
		'homeRed'        =>'You will be redirected to homepage after',
		"sec"            =>"seconds",
		 "homep"              =>"Homepage",
		 "prev"             =>"the Previous Page",
		'acc'              =>"the Homepage",
		//notification et msg
		'Mess'            =>'Message sent',
		 'rep'            =>'Reply',
		 'sup'            =>'Notification deleted successfully',
         'supm'           =>'Message successfully deleted',
		//defaultMaster
		'Gadmin'     =>'Schools management' ,
		 'Adda'     =>'Add Schools',
		 'seea'     =>'Manage Schools',
		 'msgA'     => 'Sent Message to Administration',
		   //defaultparent
		'subjp'       =>'The Subjects',
		'notesp'      =>'The Results',
		 //defaultetud
		'toA'     =>'To the Administration' ,
		'shed'       =>'Time Schedule' ,
		'subj'       =>'My subjects',
		'notes'      =>'My Results',
		//defaultadmin
		'profil'       =>'My Profile',
		'noMsg'         =>'No message sent',
		'noAle'         =>'No notification',
		'toM'       =>'To the Master Admin',
		'toP'	   =>'To the Teacher',
		'toE'	   =>"To the Student",
		'toPe'     =>'To the Parent',
		'Add'     =>'Add school year',
		'see'     =>'See the school years',
		'AddP'     =>'Add Teachers',
		'seeP'     =>'Manage Teachers',
		'Adde'     =>'Add it',
		'seeE'     =>'See it',
		'AddS'     =>'Add Students',
		'seeS'     =>'Manage Students',
		'AddC'     =>"Add classes<br>and subjects",
		'seeC'     =>"Manage classes",
		'15'       =>'Send a message' ,
		'16'       =>'Classes management' ,
		'17'       =>'Contact the parents' ,
		'mama'	   =>'The Mother',
		'papa'	   =>'The Father',
		'18'       =>"Absence management" ,
		'19'       =>'Time Schedule' ,
		'20'       =>'Notifications',
		'prof'       =>'Teachers management' ,
		'etu'       =>'Students management',
		'paren'    =>'Parents management',
		'choix'    =>'CHOOSE',
		'HOME'     =>'Home',
		'msg'      =>'sent messages',
		//statistiques
		 /***master stati*/
		'preetu'      =>'student name',
		'full'        =>'Full name', 
		'namep'        =>'father name',
	    'namem'        =>'mother name',
	    'emailp'       =>"FATHER'S EMAIL",
	    'emailm'       =>"mother'S EMAIL",
		'classe'       =>'class',
		 'proft'       =>'The teachers' ,
		'etus'       =>'The students' ,
		'pars'       =>'The parents',
	    'eco'        =>'REGISTERED Schools',
	   'profs'       =>'REGISTERED TEACHERS' ,
		'women'       =>'REGISTERED women' ,
		'men'       =>'registered men' ,
		'stud'       =>"REGISTERED students" ,
		'girl'       =>'REGISTERED GIRLS' ,
		'boy'       =>'REGISTERED boys',
		'class'     =>'NUMBER OF CLASSES' ,
		'mat'      =>'NUMBER OF school subjects',
		//page gestionmadmin espace master
	    'schName'    =>'SCHOOL NAME',
	    'delete'     =>"Delete",
	    "plus"       =>"More",
	    "contact"    =>"Send Email",
	    'schools'    =>'the schools',
	     //page infomadmin messages 
	    'up'    =>'Record updated successfully',
	    'ajo'   =>'Record updated successfully', 
	    "del"    =>"Prospect upload successfully",
	    
	    //page message master
	    'sent'       =>"Send",
	    'tto'        =>'to' ,
	    'fieldset'   =>"Please enter message ",
	     //page ajouter admin dans master
	    'ajout'      		=>'ADD',
	    'school'    		=>'SCHOOL', 
	    'nbrE'      		=>"Number of schools to be created",
	    'num'				=>'number',
	    'Name'              =>"Name",
        "Email"				=>'Email',
		"pass"      =>'Password',
        "pic"	            =>'Picture',
        //phpmail master
        'emailp'            =>'School Email',
        'sujet'             =>'subject',
        'ident'             =>'Message username and password',
         //page infomadmin master
        'info'              =>"School informations",
        'editP'             =>"Edit profile",
        'edit'              =>'Edit'
	   



		//settings
	);
	return $lang[$phrase];

}
//echo lang('MESSAGE'). ' '.lang('ADMIN');


?>
