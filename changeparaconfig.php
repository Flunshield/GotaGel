<html>
	<img src="venti.jpg" border="1" align="center"> 
<?php
	try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=mysql-julien84350.alwaysdata.net;dbname=julien84350_data;charset=utf8', '135290_julien', 'juliendu84350');
		}
	catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout 
			die('Erreur : '.$e->getMessage());
		}
$reponse = $bdd->query('SELECT * FROM Paramètres');
while ($donnees = $reponse->fetch())
			{
?>

<CAPTION><h3 style="color: blue;">Paramètre système : </h3></CAPTION>
				<TABLE>
					<tr>
						<td>Température basse à ne pas dépasser : </td>
						<td>0<?php echo $donnees['Temp_Bas']; ?>°C</td>
					</tr>
					<tr>
						<td>Vitesse du vent à ne pas dépasser : </td>
						<td><?php echo $donnees['Vitesse_Vent']; ?>Km/h</td>
					</tr>
					<tr>
						<th> <form method="post"> <p> <label>Nouvelle température : </label> <input type="number" step="0.1" name="tempnon" /> </p> 
						<button name="submit"  style="background-color:#CCCCCC" style="color:white; font-weight:bold">Changer</button>
						</form></th>
					</tr>
					<tr>
						<th> <form method="post"> <p> <label>Nouvelle vitesse du vent : </label> <input type="number" name="vitesseventnon" /> </p>
							<button name="submitt"  style="background-color:#CCCCCC" style="color:white; font-weight:bold">Changer</button>		
						</th>
					</tr>
				</TABLE> 
<?php 
		}
$reponse = $bdd->query('SELECT * FROM Configuration');
while ($donnees = $reponse->fetch())
			{
?>		

<CAPTION><h3 style="color: blue;">Configuration du systeme : </h3></CAPTION>
<TABLE>
		<tr>
			<td>N° du téléphone à alerter : </td>
			<td>0<?php echo $donnees['N°_Alerte']; ?></td>
		</tr>	
		<tr>				
			<th> <form method="post"> <p> <label>Nouveau numéro de téléphone : </label> <input type="tel" name="newtel" /> </p>
			<button name="submittt"  style="background-color:#CCCCCC" style="color:white; font-weight:bold">Changer</button>
			</th>
		</tr>
</TABLE>
</br>
<?php 
		}
$reponse = $bdd->query('SELECT * FROM user');
while ($donnees = $reponse->fetch())
			{
?>

<CAPTION><h3 style="color: blue;">Paramètre du compte : </h3></CAPTION>
<TABLE>
		<tr>
			<td>Nom de compte : </td>
			<td><?php echo $donnees['pseudo']; ?></td>
		</tr>
		<tr>
			<td>mot de passe : </td>
			<td><?php echo $donnees['mdp']; ?></td>
		</tr>		
		<tr>				
			<th> <form method="post"> <p> <label>Nouveau mot de passe : </label> <input type="number" name="newmdp" /> </p>
			<button name="sube"  style="background-color:#CCCCCC" style="color:white; font-weight:bold">Changer</button>
			</th>
		</tr>
</TABLE>
</br>


<?php
			}
if(isset($_POST['submit']))
		{
			$new = $_POST['tempnon'];
			
			
					 $nb_modifs = $bdd->exec('UPDATE Paramètres SET Temp_Bas = '.$new.' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/changeparaconfig.php';
							header("Refresh: $delai;url=$url");
				
		}
if(isset($_POST['submitt']))
		{
			$new = $_POST['vitesseventnon'];
			
			
					 $nb_modifs = $bdd->exec('UPDATE Paramètres SET Vitesse_Vent = '.$new.' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/changeparaconfig.php';
							header("Refresh: $delai;url=$url");
				
		}
if(isset($_POST['submittt']))
		{
			$new = $_POST['newtel'];
			
			
					 $nb_modifs = $bdd->exec('UPDATE Configuration SET N°_Alerte = '.$new.' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/changeparaconfig.php';
							header("Refresh: $delai;url=$url");
				
		}
		
		if(isset($_POST['sub']))
		{
			$new = $_POST['ndc'];
			
			
					 $nb_modifs = $bdd->exec('UPDATE user SET pseudo = '.$new.'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/changeparaconfig.php';
							header("Refresh: $delai;url=$url");
				
		}
		
		if(isset($_POST['sube']))
		{
			$new = $_POST['newmdp'];
			
			
					 $nb_modifs = $bdd->exec('UPDATE user SET mdp = '.$new.' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/changeparaconfig.php';
							header("Refresh: $delai;url=$url");
				
		}
		
		if(isset($_POST['submit']))
		{
			$new = $_POST['tempnon'];
			
			
					 $nb_modifs = $bdd->exec('UPDATE Paramètres SET Temp_Bas = '.$new.' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/changeparaconfig.php';
							header("Refresh: $delai;url=$url");
				
		}
		
		?>
<button name="retour"  style="background-color:#CCCCCC" style="color:white; font-weight:bold">Retour</button>
<?php
if(isset($_POST['retour']))
		{
			
			
			
					 
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/readDb.php';
							header("Refresh: $delai;url=$url");
				
		}
?>
			</html>