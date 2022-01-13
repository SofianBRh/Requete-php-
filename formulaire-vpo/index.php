
<!DOCTYPE html>



<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<form action="" method="post">
<input type="text" name="reference" placeholder="reference" /><br/>
<input type="text"  name="nom"placeholder="nom" /></br>

<input type="text"  name="description" placeholder="Description"/> </br>
<input type="text" name="prixAchat"placeholder="prix achat"  /></br>
<input type="text" name="prixVente" placeholder=" prix vente"></br>
<input type="text" name="quantite" placeholder="Quantite"></br>
<input  type="submit"  value='submit' placeholder="submit">
<input type="reset" placeholder="cancel">
</form>
</body>
</html>


<?php
try
{
  // On se connecte à MySQL
  $mysqlClient =new PDO('mysql:host=localhost;dbname=Vapo;charset=utf8', 'soso', 'Pokemon');
}
catch(Exception $e)
{
  // En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}
//function execute_requete($req)
//{
  //  global $pdo;
  
  //$pdostatement = $pdo->query($req);
  
  //return $pdostatement;
  //}
  
  
  //if (isset($_GET['action']) && $_GET['action'] == 'supression') {
    //     execute_requete("DELETE FROM invetory WHERE id = '$_GET[id]'");
    //}
    // Si tout va bien, on peut continuer
    
    
    
    if(isset($_POST['reference'])){
      
      
      
      
      
      
      $Reference = $_POST['reference'];
      $name =$_POST['nom'];
      $desc =$_POST['desciption'];
      $achat = $_POST['prixAchat'] ;
      $vente = $_POST['prixVente'];
      $quant = $_POST['quantite'];
      $dat =[$reference,$name,$achat,$vente,$quant];
      
      
      if(empty($Reference) || empty($name) || empty($achat) || empty($vente) || empty($quant)){
        
        
        
        
        
        
        echo'champs manquant';}
        
        
        
          }
          else{
          
        
        
        
        
      
      
      
      
      
      addproduct($mysqlClient,$Reference, $name,$desc, $achat, $vente,$quant);
        
       
          
      
    }
      
    
       $sql = $mysqlClient->prepare(  "INSERT INTO inventory (reference, nom, description,  prixAchat,prixVente,quantite)
        VALUES ('$Reference', '$name', '$desc','$achat','$vente','$quant')");
      if($sql->execute()){
        echo "HMDL";
      }
       
        
      




      //  else{
        //    $insertVapo=$mysqlClient->prepare('INSERT INTO Vapo(reference, nom, prixAchat, prixVente, quantite, id)
        //  VALUE(:reference, :nom, :prixAchat, :prixVente,
        //:quantite)');
        //  $insertVapo-> execute([
          //'reference'=>$reference,
          //'nom'=>$name,
          //'prixAchat'=>$achat,
          //'prixVente'=>$vente,
          //'quantite'=>$quant
          //]);
          
          //}


          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);

          $requete =$mysqlClient ->prepare ("SELECT * FROM inventory");
          $requete->execute();
          echo '<table border="1" style="text-align: center">';
          echo '<tr>
          
          <th>Références</th>
          <th>Noms</th>
          <th>Descriptions</th>
          <th>Prix d achat unitaire en €</th>
          <th>Prix de vente unitaire en €</th>
          <th>Quantité en stock</th>
          <th>id</th>
          </tr>';
          while($resulta = $requete->fetch(PDO:: FETCH_ASSOC)){
            
            echo '<tr>
            <td>' . $resulta['reference'] . '</td>
            <td>' . $resulta['nom'] . '</td>
            <td>' . $resulta['description'] . '</td>
            <td>' . $resulta['prixAchat'] . '</td>
            <td>' . $resulta['prixVente'] . '</td>
            <td>' . $resulta['quantite'] . '</td>
            <td>' . $resulta['id'] . '</td>
            <td><a href="delete.php?id='.$resulta['id'].'">Effacer</a></td>
            <td><a href="modif.php?id='.$resulta['id'].'">Modifier</a></td>
            </tr>';
          }
          echo '</table>';
          
          
          
          ?>
          
          
          
          
