<?php
session_start();

if(!isset($_SESSION['admin'])){
  header('location:admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin Question</title>
    <link rel="stylesheet" href="intadminq.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
            <form class="form" action="intadminq.php" method="post">
                <div class="welcome">
                    <p>BIENVENU <?php echo strtoupper($_SESSION['admin']);?> SUR LA PLATEFORME D'EDITION DES QUESTIONNAIRES</p>
                </div>
                <button name="logout" id="logout">DECONNEXION</button>

                <div class="container">
                    <div class="q">
                        <p>Questions</p>
                        <textarea name="questions" required></textarea>
                    </div>
                    <div class="score">
                        <p>Score</p>
                        <input name="score" type="number" required/>
                    </div>
                    <div class="typ">
                        <p>Type</p>
                        <select id="choix" name="choix" required>
                            <option value="">SELECTIONNER</option>
                            <option value="ChoixMultiple">Choix Multiple</option>
                            <option value="ChoixSimple">Choix Simple</option>
                            <option value="ChoixText">Choix Text</option>
                        </select>
                    </div>
                    <div class="nbrrep" id="nbrrep">
                       
                    </div>
                    <div class="txt" id="text">
                      
                    </div>
                    <div class="rep" id="rep">
                      
                    </div>
                    <div class="but">
                        <button name="valider">VALIDER</button>
                    </div>
                </div> 


            </form>
    <script src="dynamic.js"></script> 

    <?php  
    if(isset($_POST['valider']))
    {
    array_pop($_POST);
    $_SESSION['question'][]=$_POST;
    }
 
    //print_r($_SESSION['question']);

    if(isset($_POST['logout'])){
        array_pop($_POST);
        $_SESSION['question'][]=$_POST;
        header('location:joueur.php');  

        }
     
   
    ?>

</body>
</html>