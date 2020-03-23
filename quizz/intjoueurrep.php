<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin Question</title>
  
    <link rel="stylesheet" href="intjoueur.css">
  
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
            <form action="intjoueur.php" method="post">
                <div class="welcome">
                    <p>BIENVENU Abdoulaye Drame SUR LA PLATEFORME DE REPONSE DES QUESTIONNAIRES</p>
                </div>
                
                <div class="container">
                <div class="q">
                        <p>Questions</p>
                        <textarea name="questions"></textarea>
                    </div>
                    <div class="score">
                        <p>Score</p>
                      <span >5 points</span>
                    </div>

                    <div class="butt">
                        <button id="btnp">Précédent</button>
                        <button id="btns">Suivant</button>
                    </div>
                </div> 


            </form>

    <?php
        print_r($_SESSION['question']);
    ?>
</body>
</html>