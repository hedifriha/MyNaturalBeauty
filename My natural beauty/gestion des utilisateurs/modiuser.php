<?php
session_start();
if(isset($_SESSION['pseudo']))
{
?>
<html>
<head>
<title>

    	Modifier les utilisateurs

</title>
<style type="text/css">
      a.type1 { color: white; }
	  </style>
		
<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/superfish.css" media="screen">
		<link href="../css/camera.css" rel="stylesheet" type="text/css" media="all" />
		<script src="../js/jquery.js"></script>
		<script src="../js/superfish.js"></script>
		<script type="../text/javascript" src="js/move-top.js"></script>
		<script type="../text/javascript" src="js/easing.js"></script> 
		<meta charset="utf8"/>
</head>
<body style>
<script type="text/javascript">
function queDesLettres(champ) {
  if(!/^[a-zA-Z]+$/.test(champ.value)) {
    alert("Entrez un Prenom ou  Nom ou pseudo ou password valide ! Vous avez tape:"+champ.value);
    champ.focus();
    return false;
  }
  return true;
}

 function ValiderMail(formulaire) {
      if (formulaire.email.value.indexOf("@",0)<0) 
{alert("Adresse mail saisie invalide.\mail faux ou deja exisistant.")}
      else {
         alert("mail disponible");
         // Pour valider le formulaire en javascript :
         // formulaire.submit()
      }
   }

function queDesChiffres(champ) {
  if(!/^[0-9]+$/.test(champ.value)) {
    alert("vous pouvez tapez pas que des chiffres ! Vous avez tape:"+champ.value);
    champ.focus();
    return false;
  }
  return true;
}

function verif_pass(champ) {


mot_de_passe1 = document.formulaire.password.value;
mot_de_passe2 = document.formulaire.password2.value;
/*if(mod_de_passe1.length<6)*/

// si les deux saisies sont différentes :
if ( mot_de_passe1 != mot_de_passe2 ) {
window.alert('Vous n\'avez pas resaisi le meme mot de passe !');
return false;
}

// si elles ne sont pas différentes


else {
window.alert('C\'est bon, les deux mots de passe sont identiques');
return true;
}

}
function validation(f) {
  if (f.mdp1.value == '' || f.mdp2.value == '') {
    alert('Tous les champs ne sont pas remplis');
    f.mdp1.focus();
    return false;
    }
  else if (f.mdp1.value != f.mdp2.value) {
    alert('Ce ne sont pas les mêmes mots de passe!');
    f.mdp1.focus();
    return false;
    }
  else if (f.mdp1.value == f.mdp2.value) {
    return true;
    }
  else {
    f.mdp1.focus();
    return false;
    }
  }

</script>

<div class="wrap">
	<div class="header">
	
				<div class="contact">
					<div class="wrap">
					
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" width="300px" height="150px" title="naturex" /></a>
				</div>
				</div></div></div>
				
	<div class="top-social-icons">
	<ul>
	
	<li><a  href="logout.php" class="deconnect"> </a></li>
	<br/>
	
	</ul>
	</div>
	</div>
	
	<div class="clear"></div>
	<div class="top-nav">
	<ul class="sf-menu sf-menu2 sf-js-enabled sf-arrous" id="example">
	     <li class="current home">
		 <a href="indexback.html"></a>
		 </li>
	     
		<li>
		<a href="affiuser.php" class="type1">Afficher</a>
		</li>
		<li>
		<a href="modiuser.php" class="type1">Modifier</a>
		</li>
		<li>
		<a href="suppriuser.php" class="type1">Supprimer</a>
		</li>
		
		<li>
		<a href="javascript:self.print()" class="type1">Imprimer </a>
		</li>
		
	<li>	
<form id="form1" name="form1" method="post" action="recherche.php">
<input type="text"  height="10px" name="rech" value="" placeholder="saisir le pseudo" />
</form>
</li>

</li>
		<div class="clear"></div>
		</ul>
		<div class="clear"></div>
		</div>
		</div>
		<?php
include("../connexion.php");
seConnecter();
$count=5;
$page=0;
if(isset($_GET['page'])){
$page=$_GET['page'];
}
else
{
$_GET['page']=$page;
}
$rowquery=mysql_fetch_array(mysql_query("select count(*) from util"));
$rowcount=$rowquery[0];

$requete="select * from util LIMIT ".$count." OFFSET ".($page*$count);


$resultat =mysql_query($requete) or die(mysql_error());

?>
		
<div id="innercontent">
  <table class="hovertable">
<tr>
	<th>Id  personne</th><th>Nom</th><th>Prénom</th><th>Pseudo</th><th>Email</th><th>Sexe</th><th>Pays</th><th>Age</th><th>Password</th><th>Modifier</th>
</tr>
  <?php //commentaire : la ligne <tr> est dynamique, elle doit être ajoutée chaque fois qu'il ya un enregistrement dans la base de données , il faut l'insérer dans une boucle "While"?>
  <?php while ($data= mysql_fetch_array($resultat)) {  ?>
<tr>
    <td> <?php  echo $data['id']; // récupération des données de la base de données?></td>
    <td><?php echo $data['nom'];?></td>
    <td><?php echo $data['prenom'];?></td>
	<td><?php echo $data['pseudo'];?></td>
    <td><?php echo $data['email'];?></td>
    <td><?php echo $data['sexe'];?></td>
    <td><?php echo $data['pays'];?></td>
    <td><?php echo $data['age'];?></td>
	<td><?php echo $data['password'];?></td>
    <td> <a href="modiuser.php?id=<?php  echo $data['id']; ?>"> <h3><img src="images/modif.png"> </a></td>
	
    </tr>
  <?php } // fermeture de la boucle while?>
</table>
<div class="pagination">
<?php 
 if($page>0) echo "<a href=\"modiuser.php?page=".($page-1)."\"><img src=images/left.png width=16px /></a> |";
 
 for($i=0;$i<$rowcount;$i+=$count){
	if($page==$i/$count) echo "<b>";
	echo "<a href=\"modiuser.php?page=".($i/$count)."\"> ".(($i/$count)+1)." </a> |";
	if($page==$i/$count) echo "</b>";
 }


  if($page<($rowcount/$count)-1) echo "<a href=\"modiuser.php?page=".($page+1)."\"><img src=images/right.png width=16px /></a>"; 
   
   ?>
</div>
<?php 
if (isset($_GET['id'])){

$idr=$_GET['id'];
$requete2="select * from util where id='$idr'";
}
else $requete2="select * from util where id='0'";

$resultat2=mysql_query($requete2);
while ($ligne=mysql_fetch_array($resultat2)){
 ?>
 <form id="form1" name="form1" method="post" action="valider_modification.php">
        <fieldset>
          <legend><h4>Ajouter un utilisateur</h4></legend>
          <input type="hidden" name="id" value="<?php echo $ligne['id'];?>"  />
          <table width="400" border="0">
            <tr>
              <td width="80">Nom:</td>
              <td width="310"><input type="text" onblur="queDesLettres(this);" name="nom" id="nom" value="<?php echo $ligne['nom'];?>"/></td>
            </tr>
            <tr>
              <td>Prénom :</td>
              <td><input type="text" name="prenom" onblur="queDesLettres(this);" id="prenom" value="<?php echo $ligne['prenom'];?>"/></td>
            </tr>
			<tr>
              <td>Pseudo :</td>
              <td><input type="text" name="pseudo" onblur="queDesLettres(this);" id="pseudo" value="<?php echo $ligne['pseudo'];?>"/></td>
            </tr>
            <tr>
              <td>Email : </td>
              <td><input type="text" name="email" id="email" value="<?php echo $ligne['email'];?>" /></td>
            </tr>
            <tr>
              <td>Sexe: </td>
              <td>
              <label>
                    <input type="radio" name="sexe" value="h" id="sexe_0" <?php if ($ligne['sexe']=="h") echo 'checked="checked"';?> />
                    Homme</label>
              <label>
                    <input type="radio" name="sexe" value="f" id="sexe_1" <?php if ($ligne['sexe']=="f") echo 'checked="checked"';?> />
                    Femme</label>
              </td>
            </tr>
            <tr>
              <td>Pays : </td>
              <td><select name="pays" id="pays">
                <option value="tunisie" <?php if ($ligne['pays']=="tunisie") echo 'selected="selected"';?>>Tunisie</option>
                <option value="maroc" <?php if ($ligne['pays']=="maroc") echo 'selected="selected"';?>>Maroc</option>
              </select></td>
            </tr>
            <tr>
              <td>Age :</td>
              <td><input type="text" name="age" id="age" onblur="queDesChiffres(this);" value="<?php echo $ligne['age'];?>"/></td>
            </tr>
			<tr>
              <td>Password :</td>
              <td><input type="password" name="password" pattern="^(?=^.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" id="password" value="<?php echo $ligne['password'];?>"/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="button" id="button" value="Mettre à jour" />
              <input type="reset" name="button2" id="button2" value="Réinitialiser" /></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </fieldset>
      </form>
      <?php }  ?>
     </div>
    <div id="footer">  </div>

</div>
</body>
</html>
<?php
}
else
{
	echo "connectez vous";
	header("refresh:3; url=../log.html");
	}
?>
