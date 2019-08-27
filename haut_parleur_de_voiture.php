<html>
<head>
<meta charset="utf-8" />
<title>Ma page le bon coin</title>

<style>
img {
height:300px;
width:300px;
border:solid 1px;
}
p {
margin-left:30px;
}
</style>
</head>

<body>
	<h1>Haut parleur de voiture</h1>

<form method="post" action="nouvelle_anonce.php">
	<p>
Titre de l'annonce <br/>
<input type="text" name="titre_annonce" value="Haut parleur voiture" /><br/>
</p>
<p>
Description<br/>
<textarea type="text" name="description">
Ici j'ecris la description...
</textarea>
</p>
<p>
Photo : (jusqu'a cinq)</br>
<img src="../leboncoin/51oMzPH6xeL.jpg" alt="image haut parleur" />
</p>
<p>
Prix <br/>
<input type="text" name="prix" value="10$" />
</p>
</form>
</body>
</html>
