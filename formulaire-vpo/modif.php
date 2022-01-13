




<?php 


//modifier une ligne dans le tableau 


echo "<form method='post'>
<input placeholder='Reference'name='reference'></input> 
<input placeholder='Article 'name='nom'></input>
<input placeholder='Description'name='description'></input>
<input placeholder='Prix achat'name='prixAchat'></input>
<input placeholder='prix vente'name='prixVente'></input>
<input placeholder='Nb Stock'name='quantite'></input>

<button type='submit'>Ajouter</button>
</form>";
//rappel de mes variable
if (isset($_POST['reference'])){
$id=$_GET['id'];
$reference = $_POST["reference"];
   $name = $_POST["nom"];
   $desc = $_POST["description"];
   $achat = $_POST["prixAchat"];
   $vente = $_POST["prixVente"];
   $quant = $_POST["quantite"];
 //connexion base de donnée
   $mysssqlClient =new PDO('mysql:host=localhost;dbname=Vapo;charset=utf8', 'soso', 'Pokemon', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
  

$ssql= "UPDATE inventory SET reference=?, nom=?, description=?, prixAchat=?, prixVente=?, quantite=? WHERE id=? ";
$mysssqlClient->prepare($ssql)->execute([$reference, $name, $desc,$achat,$vente,$quant,$id]);

header('location:index.php');

}
?>
