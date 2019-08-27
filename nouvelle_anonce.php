<?php
//mysqli_connect();
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$bdd = new PDO('mysql:host=37.187.109.62;dbname=Music;charset=utf8', 'jeronemo', 'jeronemo');
$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );





if (isset($_FILES['new_image']))
{
	echo "Image recu";
	move_uploaded_file($_FILES['new_image']['tmp_name'], "new_annonce_photo/"."photo");
	echo '<br/>';
}
else
{
	echo "Image non recu";
}

$error = false;
if (!file_exists("new_annonce_photo/photo"))
{
	$error = true;
}
if (empty($_POST['titre_annonce']))
{
	echo 'Erreur : Il manque le titre de l\'annonce<br/>';
	$error = true;
}
else
{
	$titre_annonce = $_POST['titre_annonce'];
}

if (empty($_POST['description']))
{
	echo 'Erreur : Il manque la description<br/>';
	$error = true;
}
else
{
	$description = $_POST['description'];
}

if (!is_numeric($_POST['prix']))
{
	echo 'Erreur : Il manque le prix<br/>';
	$error = true;
}
else
{
	$prix = $_POST['prix'];
}
?>

<html>
<head>
<meta charset="utf-8" />
<title>Nouvelle annonce</title>

<style>
img {
height:150px;
width:150px; border:solid 1px;
}
p {
margin-left:30px;
}
</style>
</head>
<body>

<h1>Nouvelle annonce</h1>

<form method="post" action="nouvelle_anonce.php" enctype="multipart/form-data" >

<p>Titre de l'annonce<br/>
<input type="text" name="titre_annonce" <?php if (isset($titre_annonce)) echo 'value="'.$titre_annonce.'"'; ?> /><br/> </p>


<p> Description<br/>
<textarea type="text" name="description" ><?php if (isset($description)) echo $description ?></textarea> </p>

<p>Photo : (jusqu'a cinq)</br>
<?php
	if (file_exists("new_annonce_photo/photo"))
	{
		echo '<img src="new_annonce_photo/photo" alt="premiere photo" /><br/>';
	}
?>
</p>

<p><input type="file" name="new_image" /><br/> <input type="submit" /></p>

<p>Prix<br/>
<input type="text" name="prix" <?php if (isset($prix)) echo 'value="'.$prix.'"' ?> /></p>

<p><input type="submit" /></p>
</form>

<?php
	if ($error == false)
	{
		echo "annonce valide<br/>";
		echo 'on envoi sur la base de donne<br/>';
		if ($bdd == NULL)
			echo "probleme<br/>";
		else
			echo "NO probleme<br/>";
		$bdd->query('CREATE DATABASE IF NOT EXISTS Music');
		$bdd->query("CREATE TABLE IF NOT EXISTS `Music`.`annonce` ( `id` INT NOT NULL AUTO_INCREMENT , `titre` TEXT NOT NULL , `description` VARCHAR(255) NOT NULL , `prix` INT NOT NULL , PRIMARY KEY (`id`)) ");


		$req = $bdd->prepare("INSERT INTO annonce(titre,  description) VALUES(:titre, :description)");

		$req->bindParam(':titre', $titre_annonce);
		$req->bindParam(':description', $description);
		$req->execute();


	}
?>

</body>
</html>
