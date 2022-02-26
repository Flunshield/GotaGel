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
		// Si tout va bien, on peut continuer
		// On récupère tout le contenu de la table jeux_video
		$reponse = $bdd->query('SELECT * FROM Capteurs');
		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
			{
				?>
				<h1>FreezerMobileProject</h1>
				<br/><br/><br/>
				<CAPTION><h3 style="color: blue;">Relevé des données des capteurs : </h3></CAPTION>
				<TABLE>
					<tr>
						<td>Capteur Température en Bas : </td>
						<td><?php echo $donnees['Cap_Temp_Bas']; ?>°C</td>
					</tr>
					<tr>
						<td>Capteur Température en haut : </td>
						<td><?php echo $donnees['Cap_Temp_Haut']; ?>°C</td>
				   </tr>
				   <tr>
						<td>Capteur Capteur d'humidité : </td>
						<td><?php echo $donnees['Cap_Humidité']; ?>%</td>
				   </tr>
				   <tr>
						<td>Capteur Vitesse du Vent : </td>
						<td><?php echo $donnees['Cap_Vitesse_Vent']; ?>Km/s</td>
				   </tr>
				   <tr>
						<td>Capteur Direction du Vent : </td>
						<td><?php echo $donnees['Cap_Direction_Vent']; ?></td>
				   </tr>
				</TABLE>   
				<br/><br/>		
				<?php 
			} 
		$reponse->closeCursor();
		$response = $bdd->query('SELECT Status FROM ventillateur');
		while ($donnees = $response->fetch())
			{
				if ($donnees['Status'] == 0)
					{
						?>
						<h3 style="color: blue;">Etat ventilateur : OFF</h3>
						<?php
					} 
				if ($donnees['Status'] == 1)
					{
						?>
						<h3 style="color: blue;">Etat ventilateur : ON</h3>
						<?php
					} 
			}
		$response->closeCursor(); // Termine le traitement de la requête
		?>
		<br/>
		<form method="POST">
		<button name="submit"  style="background-color:#CCCCCC" style="color:white; font-weight:bold">Activer/Desactiver les ventillateurs</button>
		</form>
		<button name="lien1" onclick="self.location.href='changeparaconfig.php'" style="background-color:#CCCCCC" style="color:white; font-weight:bold"onclick>
		<p>Modifier des paramètres/Configurations du système</p>
		</button>
		<?php
		if(isset($_POST['submit']))
		{
			$response = $bdd->query('SELECT Status FROM ventillateur');
			while ($donnees = $response->fetch())
				{
					 if ($donnees['Status'] == 0)
						{
							$nb_modifs = $bdd->exec('UPDATE ventillateur SET Status = \'1\' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net//julien/readDb.php';
							header("Refresh: $delai;url=$url");
						} 
					if ($donnees['Status'] == 1)
						{
							$nb_modifs = $bdd->exec('UPDATE ventillateur SET Status = \'0\' WHERE id = \'1\'');
							$delai=1; 
							$url='http://julien84350.alwaysdata.net/julien/readDb.php';
							header("Refresh: $delai;url=$url");
						} 
				}
		}
		$response->closeCursor(); // Termine le traitement de la requête
		?>
</html>