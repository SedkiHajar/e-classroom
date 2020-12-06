<?php
function lang($phrase){
	static $lang = array(
		//page index
		'about'    =>'A PROPOS',
        'propos'   =>'A PROPOS DE BESTEDUK',
		'and'      =>'et',
		'us'        =>'Contactez-nous',
		'best'      =>"Plus besoin de se déplacer dans un centre de formation ou de faire venir un élève à l'école… 
                      L'e-learning recouvre toutes les méthodes de formation s'appuyant sur l'outil informatique. Cette définition large inclut  :
                       des supports en ligne ou hors-ligne,
					  un apprentissage individuel ou collectif,
                      des formateurs présent à distance.",
		//logout
		'logout'   =>"Déconnexion",
		 'res'      => "Réinitialiser",    
		  //logout modal
		'leave'    =>'Prêt à partir?',
		'ready'    =>'Sélectionnez «Déconnexion» ci-dessous si vous êtes prêt à mettre fin à votre session en cours.',
		'cancel'   =>'Annuler',
		//page index
		'0'       => 'Choisir la langue ',
		'ch'         =>'Changer la langue',
		'1' 	  => 'Bienvenue' ,
		'2' 	  => 'ESPACE DIRECTION',
		'3' 	  => 'ESPACE PROFESSEUR' ,
		'4' 	  => 'ESPACE ETUDIANT' ,
		'5'	      => 'ESPACE PARENT' ,
		'6' 	  => 'ESPACE MASTER ADMIN',
		'admin' 	  => 'DIRECTION',
		'profes' 	  => 'PROFESSEUR' ,
		'students' 	  => 'ETUDIANT' ,
		'parent'	   => 'PARENT' ,
		'master' 	  => 'MASTER ADMIN',
		//page login admin

		'7'       =>'Retour',
		'8'       =>'Saisir votre E-mail' ,
		'9'       =>'Saisir votre mot de passe',
		'10'       =>'Se connecter' ,
		//page welcome admin
		'welcome'  =>'DANS VOTRE ESPACE DIRECTION',
		//welcome master admin
		'welcomeM' =>'DANS VOTRE ESPACE MASTER ADMIN',
		'11'       =>"Choisir l'année scolaire",
		'12'       =>'Année scolaire' ,
		'13'       =>'Connexion' ,
		'14'       =>'Bienvenue Direction' ,
		//traitannonce admin
		'reussi'         =>'Le message a été envoyé à ',
		'echec'          =>'Message encore non envoyé!',
		'redir'          =>'Vous allez être redirigé automatiquement. Merci pour votre patience',
		'homeRed'        =>"Vous serez redirigé vers la page d'accueil après",
		"sec"            =>"secondes",
		"homep"              =>"Accueil",
		"prev"             =>"La Page Précedente",
		'acc'              =>"La Page d'Accueil",
		//notification et msg
		'Mess'            =>'Message envoyé',
         'rep'            =>'Répondre',
         'sup'            =>'Notification supprimée avec succés',
         'supm'           =>'Message supprimée avec succés',

		//defaultMaster
		'Gadmin'     =>'Gestion des Ecoles' ,
		 'Adda'     =>'Ajouter les Ecoles',
		 'seea'     =>'Gérer les Ecoles',
		 'msgA'     => 'Envoyer Message à la Direction',
		  //defaultetud
		'toA'     =>"A la Direction" ,
		'shed'       =>'Emploi du temps' ,
		'subj'       =>'Mes Matières',
		'notes'      =>'Mes Notes',
		  //defaultparent
		'subjp'       =>'Les Matières',
		'notesp'      =>'Les Notes',
		//defaultadmin
		'profil'       =>'Mon Profil',
		'noMsg'         =>'Aucun message envoyé',
		'noale'         =>'Aucune notification',
		'toM'	   =>'Au Master Admin',
		'toP'	   =>'Au Professeur',
		'toE'	   =>"A l'étudiant",
		'toPe'     =>'Au parent',
		 'Add'     =>'Ajouter année scolaire',
		 'see'     =>'Voir les années scolaire',
		 'AddP'     =>'Ajouter les Professeurs',
		 'seeP'     =>'Gérer les Professeurs',
		 'Adde'     =>'Ajouter  ',
		 'seeE'     =>'voir le',
		 'AddS'     =>'Ajouter les Etudiants',
		 'seeS'     =>'Gérer les Etudiants',
		 'AddC'     =>"Ajouter les classes<br>et les matières",
		 'seeC'     =>"Gérer les classes",
		 '15'       =>'Envoyer un message' ,
		'16'       =>'Gestion des classes' ,
		'17'       =>'Contacter le parent' ,
		'mama'	   =>'La Mère',
		'papa'	   =>'Le Père',
		'18'       =>"Gestion d'absence" ,
		'19'       =>'Emploi du temps' ,
		'20'       =>'Notifications',
		'prof'     =>'Gestion des professeurs' ,
		'etu'      =>'Gestion des étudiants',
		'paren'    =>'Gestion des parents',
	    'choix'    =>'CHOISIR',
	    'HOME'     =>'Accueil',
	    'msg'      =>'Messages envoyés',
	    //statistiques
	    /***master stati*/
	    'preetu'      =>'prénom étudiant',
	    'namep'        =>'Nom père',
	    'namem'        =>'Nom mère',
	    'emailp'       =>"EMAIL père",
	    'emailm'       =>"EMAIL mère",
	    'full'        =>'Nom complet',
	    'classe'       =>'classe',
	    'proft'       =>'Les professeurs' ,
		'etus'       =>'Les étudiants' ,
		'pars'       =>'Les parents',
	    'eco'        =>'Ecoles inscrites',
	    'profs'       =>'PROFESSEURS INSCRITS' ,
		'women'       =>'FEMMES INSCRITES' ,
		'men'       =>'hommes inscrits' ,
		'stud'       =>"étudiants inscrits" ,
		'girl'       =>'FILLES INSCRITES' ,
		'boy'       =>'garçons INSCRITS',
		'class'     =>'NOMBRE DE CLASSES' ,
		'mat'      =>'NOMBRE DE matières',
		//page gestionmadmin espace master
	    'schName'    =>'NOM ECOLE',
	    'delete'     =>'supprimer', 
	    "plus"       =>"Plus",
	    "contact"    =>"Envoyer l'Email",
	    'schools'    =>'LES ECOLES', 
	    //page infomadmin messages 
	    'up'    =>'Modification effectué avec succès',
	    'ajo'     =>'Ajout effectue avec succès', 
	    "del"       =>"Suppression effectue avec succès",
	    
	    //page message master
	    'sent'       =>"Envoyer",
	    'tto'        =>'à',
	    'fieldset'   =>"Veuillez saisir le message ",
	    //page ajouter admin dans master
	    'ajout'        		=>'AJOUTER',
	    'school'    		=>'ECOLE', 
	    'nbrE'      		=>"Nombre d'écoles a créer",
	    'num'				=>'numero',
	    'Name'              =>"Nom",
        "Email"				=>'Email',
		"pass"      =>'Mot de passe',
        "photo"	            =>'Photo',
         //phpmail master
        'emailp'            =>'Email ecole',
        'sujet'             =>'sujet',
        'ident'             =>'Message identifiant et mot de passe',
        //page infomadmin master
        'info'              =>"Informations de l'école",
        'editP'             =>"Modifier le profil",
        'edit'              =>'Modifier'

	 



		//settings
	);
	return $lang[$phrase];

}

 ?>
