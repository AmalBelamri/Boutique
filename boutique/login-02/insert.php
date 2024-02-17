<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation un compte </title>
</head>
<body> 
    <?php 
                function valid_donnees($donnes){
                    $donnes=trim($donnes);
                    $donnes=stripslashes($donnes);
                    $donnes=htmlspecialchars($donnes);
                    // $donnes=FILTER_VALIDATE_EMAIL($donnes);
                    return $donnes;
                }
                $servore="localhost";
                $username="root";
                $pas="";
                $nom=valid_donnees($_POST["nom"]);
                $prenom=valid_donnees($_POST["Prenom"]);
                $email= valid_donnees($_POST["email"]);
                $password=valid_donnees($_POST["password"]) ;
               
            try {
                $connexion= new PDO("mysql:host=$servore;dbname=boutique",$username,$pas);
                $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $requete=$connexion->prepare("INSERT  INTO client (nom,prenom,email,password)
                 VALUES (:nom,:prenom,:email,:password);");
                $requete->bindParam(":nom",$nom);
                $requete->bindParam(":prenom",$prenom);
                $requete->bindParam(":email",$email);
                $requete->bindParam(":password",$password); 
                $requete->execute(); 
                
                 header("Location:../produit/piement/index.html");
            }
            catch (PDOException $e ) {
                echo $e->getMessage();
            }
            finally{
                $connexion=NULL;         
               }
            
    
    ?>
</body>
</html>