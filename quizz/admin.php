<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="mini.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    
</head>
<body>
    <form action="admin.php" method="post">
    <div class="container">
        <h1>Se connecter en Admin</h1>
        <div class="box1">
            <div class="box2">
                <div class="lmdp">
                <img src="app2/icone-user.png"/>
                <input type="text" name="login" placeholder="Utilisateur"/>
                </div>

                <div class="lmdp">
                <img src="app2/icone-password.png"/>
                <input type="password" name="mdp" placeholder="Mot de passe"/>
                </div>
                <button name="log">CONNEXION</button>
            </div>

        </div>

    </div>

    </form> 

<?php
if(isset($_POST['log'])){
    $_SESSION['admin']=$_POST['login'];
    $_SESSION['adminpass']=$_POST['mdp'];
    if(($_SESSION['adminpass']=="admin"))
    {
        header('location:intadminq.php');

    }
    else{  
        echo '<p id="error">Username  or  Password  invalid</p>';
    
    }   

}

   
?>

</body>
</html>