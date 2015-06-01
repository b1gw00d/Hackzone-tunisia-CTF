	<?php

//Start session	
	 session_start();
if (isset($_SESSION['SESS_USERNAME']))
{
header("location: challenges.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="favicon.ico">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/contact.css" rel="stylesheet">


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/manager.js"></script>
<!-- google recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>

</head>
<body style="background:#f2f2f2;">
<div class="container" >
	<div class="row clearfix">
		<div class="col-md-12 column">
		  <div class="col-md-12 column">
			<nav  class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
					 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
					 <span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="index.php"><span ><img src="img/logo-hack.png" alt="logo" height="25" width="25" class="profile-image img-circle"/>Hack-Zone</span></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li >
							<a href="index.php"><span class="glyphicon glyphicon-home">Home</span></a>
						</li>
   						
					</ul>
					<ul class="nav navbar-nav navbar-right">
					
		 						<li >
									<a href="scoreboard.php"><span class="glyphicon glyphicon-signal">Scoreboard</span></a>
								</li>		 						<li >
									<a href="rules.php"><span class="glyphicon glyphicon-lock"	>Rules</span></a>
								</li>
								<li class="active">
									<a href="contact.php"><span class="glyphicon glyphicon-comment">Contact</span></a>
								</li>
								<li >
									<a href="sponsors.php"><span class="glyphicon glyphicon-shopping-cart">Sponsors</span></a>
								</li>
								<li >
									<a href="media.php"><span class="glyphicon glyphicon-camera">Media</span></a>
								</li>
 								<li margin-left:10px;>
								 <a id="modal-signup" href="#modal-container-signup" role="button" class="btn" data-toggle="modal">SIGN UP</a>
								 </li>
								 <li margin-right:20px;>
								 <a id="modal-login" href="#modal-container-login" role="button" class="btn" data-toggle="modal">LOGIN</a>
								 </li>
								 <li></li>
					</ul>
				</div>
				
			</nav>
			</div>
	</div>
			<br><br><br>


		
</div>

<?php
if (!isset($_SESSION['SESS_USERNAME']))
echo '<!--SIGNUP dialog-->			
			<div class="modal fade" id="modal-container-signup" role="dialog" aria-labelledby="signup" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 class="modal-title" id="signupLabel">
								Sign Up
							</h4>
						</div>
						<div class="modal-body">
								<div class="row">
                       		    <div class="col-md-8 col-sm-8 col-xs-12 login-box">
                               		 <form  id="signup" action="signup_json.php" method="post" >
                            			<div class="input-group">
                               			  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                			 <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                			<input type="password" class="form-control" placeholder="Password" name="npassword" required />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                			<input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                			<input type="text" class="form-control" placeholder="Email" name="email" required />
                            			</div>
                            			<br>
                            			<div class="row">
							 				<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="g-recaptcha" data-sitekey="6LdEhgITAAAAAGigEVKR5jrozGcVwVr0gva8EzmT"></div>
											</div>
										</div><br>
										<div class="col-xs-6 col-sm-6 col-md-6">
       									 	<button class="btn btn-labeled btn-success" id="signup-button">Sign Up</button>
       								 	</div>
                            		</form>
                            				<br><br><div id="div_signup_response" class="alert alert-info alert-dismissable" style="display: none;" >
											<i id="signup_response" class="fa fa-coffee"></i>
											</div><br>
                       		    </div>
                   			</div>
						</div>
					</div>
				</div>
			</div>
<!--Login dialog-->			
			<div class="modal fade" id="modal-container-login" role="dialog" aria-labelledby="login" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 class="modal-title" id="loginLabel">
								Login
							</h4>
						</div>
						<div class="modal-body">
							<div class="row">
                       		    <div class="col-md-8 col-sm-8 col-xs-12 login-box">
                               		 <form id="login" action="login_json.php" method="post" >
                            			<div class="input-group">
                               			  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                			 <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                			<input type="password" class="form-control" placeholder="Password" name="password" required />
                            			</div>
                            			<div class="checkbox">
                               			 <label>
                                   			 <input type="checkbox" value="Remember">
                                   			 Remember me
                                		</label>
                           			   </div>
                            			
                               			 <a href="init.php" >Find Your Account?</a>
                               			 <br>
									<div class="col-xs-6 col-sm-6 col-md-6">
       									<button class="btn btn-labeled btn-success" id="login-button">LogIn</button>
       							 	</div>
                            		</form>
                            				<br><br><div id="div_login_response" class="alert alert-info alert-dismissable" style="display: none;" >
											<a class="panel-close close" data-dismiss="alert">×</a> 
											<i id="login_response" class="fa fa-coffee"></i>
											</div><br>
                       		    </div>
                   			</div>
						</div>
					</div>
				</div>
			</div>';
?>

<br><br>
<div class="container" >
	<div class="row clearfix" >
		<div class="col-sm-12" contenteditable="false" align="center">
    		<h2 class="wsite-content-title" style="text-align:left;">Contact</h2>

<div><div class="wsite-multicol"><div class='wsite-multicol-table-wrap' style='margin:0 -15px'>


<div id="bloccontact"><font color="white" face ="EaDesigner"> 
 <!-- tableau des informations -->
 	<table >
	 <tr>
	   <td id="titre"><center> Adresse : </center></td>
	   <td id="champ"><center><b> Compus Universitaire La manouba 2010 Tunis </b></center></td>
	   <td rowspan=5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </td>
	   <td rowspan=8><iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;t=m&amp;ll=36.812927,10.06515&amp;spn=0.010307,0.012875&amp;z=15&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/?ie=UTF8&amp;t=m&amp;ll=36.812927,10.06515&amp;spn=0.010307,0.012875&amp;z=15&amp;source=embed" style="color:#0000FF;text-align:left"></a></small>  
	  </td>
	 </tr>
	 <tr><td id="titre"><center> Mail : </center></td><td id="champ"><center><b> contacts@csi-ensi.tn </b></center></td></tr>
	 <tr><td id="titre"><center> Page Facebook : </center></td><td id="champ"><center><b> https://www.facebook.com/CSI.ENSI </b></center></td></tr>
	 <tr><td id="titre"><center> Page Facebook : </center></td><td id="champ"><center><b>https://www.facebook.com/HACK.ZONE.TUNISIA </b></center></td></tr>
	 <tr><td id="titre"><center> Twitter :  </center></td><td id="champ"><center><b> https://twitter.com/csi_ensi </b></center></td></tr>
	 <tr><td> &nbsp;&nbsp;&nbsp; </td></tr> 
	 
	</table>
  <br/><br/>
  <h4>Remplissez ce formulaire si vous souhaitez prendre contact avec notre équipe.</h4>
 
 <?php 
 function TEST($position)
 {
	
	if(isset($_GET['erreur']) AND !empty($_GET['erreur']))
	{
		$erreur=$_GET['erreur'];			
		if($erreur==$position) 
		{
			echo "<td><span style=\"color:#DBA901;\">Ce champ est invalide</span></td>";
		}
	}
 } 
 ?>
 
  <form method="post" action="contact.php" id="myForm" >
		
				
					<label for="nom" class="form_col" >Nom <span style="color:#DBA901;">* </span>:</label>
					<input type="text" name="nom" id="nom"  />
					<span class="tooltip">Il faut au moins de 2 caractères</span><?php TEST(1) ?>
					<span class="tooltip1">Les caracètres permis sont a..z , A..Z , é , è , à et ç </span>
					<br/>
				
					<label for="prenom" class="form_col">Pr&eacutenom <span style="color:#DBA901;">* </span>:</label>
					<input type="text" name="prenom" id="prenom"  /><?php TEST(2) ?>
					<span class="tooltip">Il faut au moins de 2 caractères</span>
					<span class="tooltip1">Les caracètres permis sont a..z , A..Z , é , è , à et ç </span>
					<br/>
				
					<label for="email" class="form_col">E-mail <span style="color:#DBA901;">* </span>:</label>
					<input type="text" name="email" id="email" placeholder="exemple : adresse@mail.com" /><?php TEST(3) ?>
					<span class="tooltip">Cette adresse mail n'est pas valide</span>
					<br/>
				
					<label for="objet" class="form_col">Objet  :</label>
					<input type="text" name="objet" id="objet" />
					<br/>
					
					<label for="contenu_email" class="form_col">Message <span style="color:#DBA901;">* </span>:</label>
					<textarea name="contenu_email" id="contenu_email"  ></textarea>
					<?php TEST(4) ?>
				</br>
			<input style="color:#000000;" type="submit" name="submit" value="Envoyer" />
		
  </form>
  <p><span style="color:#DBA901;"><b> * ce champ est obligatoire </b></p>
  </div>
 <?php
$erreur=0; 
if(isset($_POST["submit"])){
if( isset($_POST['nom']) AND !empty($_POST['nom']))
{
 if(isset($_POST['prenom']) AND !empty($_POST['prenom'])) {
 	 if(isset($_POST['email']) AND !empty($_POST['email']))  {
 	 	 if(isset($_POST['contenu_email']) AND !empty($_POST['contenu_email'])) {

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$message=$_POST['contenu_email'];
if(!isset($_POST['objet'])) {
	$objet="";}
	else {$objet = $_POST['objet'];} 
$atom   = '[-a-z0-9_]';   // caractères autorisés avant l'arobase
$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
                               
$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
                                // séparés par des caractères autorisés avant l'arobase
'@' .                           // Suivis d'un arobase
'(' . $domain . '{1,20}\.)+' .  // Suivis par 1 à 20 caractères autorisés pour le nom de domaine
                                // séparés par des points
$domain . '{2,20}$/i';          // Suivi de 2 à 20 caractères autorisés pour le nom de domaine	//#^([a-zA-Z])[a-zA-Z0-9\._\-]*@{1}[a-zA-Z0-9]){2,}[\.][a-zA-Z]{2,4}$#"
	if( preg_match("#^[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ][a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ' ]*[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ]$#",$nom) && strlen($nom) >= 2 ){ //tester le nom
	if( preg_match("#^[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ][a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ' ]*[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ]$#",$prenom) && strlen($prenom) >= 2){ 
	if( preg_match($regex,$email)) {
	
		
		$headers ="From: ".$nom." ".$prenom."<".$email.">"."\n"; 
		$headers .="Reply-To:".$email."\n"; 
		$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
		$headers .='Content-Transfer-Encoding: 8bit'; 
		$email_destinateur="contacts@csi-ensi.tn";
		@mail($email_destinateur,$objet,$message, $headers);
    
	/****************************************************
	* header ("Refresh: 2;URL=accueil.php") redirection *
	*****************************************************/


	}
	else $erreur=3;   
   }
	else $erreur=2;
	}
	else $erreur=1;
}
else $erreur=4;
}
else $erreur=3;
}
else $erreur=2;
}
else $erreur=1;

if($erreur!=0) {
$chemin="location:contact.php?erreur=".$erreur;
header($chemin);
}
}

?>
  
    <?php 	/********************************************************
			*       include("footer.php");  inclure le footer ici   *
			*********************************************************/?>

				<script type="text/javascript">
(function() { // On utilise une IEF pour ne pas polluer l'espace global    
    // Fonction de désactivation de l'affichage des « tooltips »
    
    function deactivateTooltips() {
    
        var spans = document.getElementsByTagName('span'),
        spansLength = spans.length;
        
        for (var i = 0 ; i < spansLength ; i++) {
            if (spans[i].className == 'tooltip') {
                spans[i].style.display = 'none';
            }
        }
    
    }
	
	function deactivateTooltips1() {
    
        var spans = document.getElementsByTagName('span'),
        spansLength = spans.length;
        
        for (var i = 0 ; i < spansLength ; i++) {
            if (spans[i].className == 'tooltip1') {
                spans[i].style.display = 'none';
            }
        }
    
    }
    
    
    // La fonction ci-dessous permet de récupérer la « tooltip » qui correspond à notre input
    
    function getTooltip(element) {
    
        while (element = element.nextSibling) {
            if (element.className === 'tooltip') {
                return element;
            }
        }
        
        return false;
    
    }
	
	function getTooltip1(element) {
    
        while (element = element.nextSibling) {
            if (element.className === 'tooltip1') {
                return element;
            }
        }
        
        return false;
    
    }
    
    
    // Fonctions de vérification du formulaire, elles renvoient « true » si tout est OK
    
    var check = {}; // On met toutes nos fonctions dans un objet littéral
    
    
    
    check['nom'] = function(id) { 
    
       var name = document.getElementById(id);
        if (name.value.length >= 2 && /^[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ][a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ' ]*[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ]$/.test(name.value)) { 
            tooltipStyle = getTooltip(name).style;
			name.className = 'correct';
            tooltipStyle.display = 'none';
			tooltipStyle = getTooltip1(name).style;
			tooltipStyle.display = 'none';
            return true;
        } else if(name.value.length < 2 && (/^[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ][a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ' ]*[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ]$/.test(name.value))){
			tooltipStyle = getTooltip(name).style;
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
			tooltipStyle = getTooltip1(name).style;
			tooltipStyle.display = 'none';
            return false;
        } else if( name.value.length >= 2 && !(/^[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ][a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ' ]*[a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ]$/.test(name.value))){
			tooltipStyle = getTooltip1(name).style;
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
			tooltipStyle = getTooltip(name).style;
            tooltipStyle.display = 'none';
            return false;
        } else{
			tooltipStyle = getTooltip1(name).style;
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
			tooltipStyle = getTooltip(name).style;
            tooltipStyle.display = 'inline-block';
            return false;
		}
    
    };
    
    check['prenom'] = check['nom']; // La fonction pour le prénom est la même que celle du nom
    
    check['email'] = function() {
		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
        /*/^[-a-z0-9_]+(\.[-a-z0-9_]+)*@(([a-z0-9]([-a-z0-9]*[a-z0-9]+)?){1,20}\.)+([a-z0-9]([-a-z0-9]*[a-z0-9]+)?){2,20}$/i*/
		var mail = document.getElementById('email');
		tooltipStyle = getTooltip(mail).style;
		if( reg.test(mail.value)){
			mail.className= 'correct';
			tooltipStyle.display = 'none';
		}else {
			mail.className = 'incorrect';
			tooltipStyle.display = 'inline-block';
		}
    };
	
	check['objet'] = function() {
    
    
    };
    
    
    // Mise en place des événements
    
    (function() { // Utilisation d'une fonction anonyme pour éviter les variables globales.
		
        var myForm = document.getElementById('myForm'),
            inputs = document.getElementsByTagName('input'),
            inputsLength = inputs.length;
    
        for (var i = 0 ; i < inputsLength ; i++) {
            if (inputs[i].type == 'text' ) {
    
                inputs[i].onkeyup = function() {
                    check[this.id](this.id); // « this » représente l'input actuellement modifié
                };
    
            }
        }
    /*
        myForm.onsubmit = function() {
    
            var result = true;
    
            for (var i in check) {
                result = check[i](i) && result;
            }
    
            if (result) {
                alert('Le formulaire est bien rempli.');
            }
    
            return false;
    
        };*/
    
    })();
    
    
    // Maintenant que tout est initialisé, on peut désactiver les « tooltips »
    
    deactivateTooltips();
	deactivateTooltips1();
})();
</script>
		</div>
	</div>
</div>	
<br><br>	

	</div>
	<div>
</div>
</body>
</html>
