<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
<header>
        <div class="header">
            
            
        <nav class="navbar">
            <a href="../acceuil/navbar.html">Acceuil</a>
            <a href="../acceuil/navbar.html#about">A propos</a>
            <a href="../acceuil/navbar.html#heading">Produits</a>
           
            <a href="../contact/cont.html">Contact</a>
        </nav>
         </div>
        </header>

<div class="signup-box">
        <h1>Login</h1>
        <form action="" method="post"  >
        <label>Email</label><br>
          <input type="email" placeholder="" name="email" /><br>
          
    
          <label>Password</label><br>
          <input type="password" placeholder="" name="password" /><br><br><br>
         
          <input type="submit" value="Sign in" name="ok" id="btn"/><br><br>
          
          <a href="./log.html" class="creer">Créer votre compte</a>
        </form>
        
      </div>
  
    
  </body>
</html>
<?php 
    $servore="localhost";
    $username="root";
    $pas="";   
            if (isset($_POST['ok'] )) {
                    function valid_donnees($donnes){
                    $donnes=trim($donnes);
                    $donnes=stripslashes($donnes);
                    $donnes=htmlspecialchars($donnes);
                    return $donnes;
                }
                $email= valid_donnees($_POST['email']);
                $password= valid_donnees ( $_POST['password']);
               
        try {
          $connexion= new PDO("mysql:host=$servore;dbname=boutique",$username,$pas);
          $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          $requete=$connexion->prepare("SELECT * FROM client  where email='$email' and password='$password' " );
          $requete->execute();
          $res=$requete->fetchAll(PDO::FETCH_ASSOC);
          $var=$requete->rowCount();
          if ($var>0) {
              if ($res) {
                  header("Location:../produit/piement/index.html");
              }
            }
              else {
                  header("Location:./log.html");
                
              }
          
          }
// $requete->execute();
catch (PDOException $e ) {
            echo $e->getMessage();
        }
        finally{
            $connexion=NULL;
        }
      }
    ?>

