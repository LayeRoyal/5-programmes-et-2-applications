<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP1</title>
    <link rel="stylesheet" type="text/css" href="exos.css">
    <link href="//db.onlinewebfonts.com/c/2507261cfe4adb6a0ecd99be42598dd1?family=1756DutchW01-Normal" rel="stylesheet" type="text/css"/> 
</head>
<body>
   <!-- le conteneur fenêtre -->
   <div class="marquee-rtl">
    <!-- le contenu défilant -->
    <div>Ce programme permet de dessiner une figure qui colorie le dessous ou le dessus de la diagonale principale et 
        aussi la diagonale secondaire en une couleur donnée puis une autre couleur le restant des cases dependant
        de la position donnée (haut ou bas)
   </div>
    </div>

<?php $couleur=[
            ' '=>' ',
            'bleu'=> "blue",
            'jaune'=> "yellow",
            'rouge'=> "red",
            'vert'=> "green",
            'noir'=> "black",
            'blanc'=> "white",
            'orange'=> "orange"
        ];
?>


    <form  method="post">
    <div class="corp">
        <h1 id="SA">SONATEL ACADEMY</h1>
        <p>Taille de la Matrice</p>
    <div class="l1">
        <img class="d" src="app1_2/app1/diez">
        <input type="text" name="nc">
    </div>
    <p> Select C1</p>
    <div class="l2">
    <img class="c1" src="app1_2/app1/color">
    <select class="s1"  name="c1">
      
            <?php 
        foreach($couleur as $key=>$value){
            echo "<option value=".$value.">".$key."</option>";
        }
        
        
        ?>
         
            
            </select>
    </div>
    <p>Select C2</p>
    <div class="l3">
    <img class="c2" src="app1_2/app1/color">
    <select class="s2" name="c2">
           
        <?php 
        foreach($couleur as $key=>$value){
            echo "<option value=".$value.">".$key."</option>";
        }
        
        
        ?>  
            </select>
    </div>
    <p>Position</p>
    <div class="l4">
    <img class="q" src="app1_2/app1/color">
    <select class="s3" name="q">
        <option>Selectionner</option>
        <option>Haut</option>
        <option>Bas</option>
         
           
    </select>
    </div>
    <div class="btt">
        <button name="anl" id="anl"><b>Annuler</b></button>     
        <button name="dsn" id="dsn" ><b>Dessiner</b></button>
     </div>
     </div>
    </form>
 
                <!-- CODE PHP> -->
   <div class="resultat">     
    <?php
    if(isset($_POST['dsn']))
    {
    $taille=$_POST['nc'];
    $c1=$_POST['c1'];
    $c2=$_POST['c2'];
    $pos=$_POST['q'];
        if(!empty($taille) && $taille>2)
        {
            if(!empty($c1) && !empty($c2) && $pos!="Selectionner" &&  $c1!=$c2){
                echo'<table>';
                    if($pos=="Haut"){
                
                            for($i=0;$i<$taille;$i++){
                                echo '<tr>';
                                for($j=0;$j<$taille;$j++)
                                    {   
                                    if($i>=$j){
                                        echo"<td bgcolor=$c1 ></td>";
                                        }
                                        elseif($j==$taille-$i-1){echo"<td bgcolor=$c1 ></td>";}
                                            
                                    else{
                                        echo"<td bgcolor=$c2 ></td>";}
                                    }

                                echo '</tr>';

                                                    }

                                    }
                    /* BAS*/

                        if($pos=="Bas"){
                        for($i=0;$i<$taille;$i++){
                            echo '<tr>';
                            for($j=0;$j<$taille;$j++)
                            {   
                            if($i<=$j){
                                echo"<td bgcolor=$c1 ></td>";
                                }
                                elseif($j==$taille-$i-1){echo"<td bgcolor=$c1 ></td>";}
                                    
                            else{
                                echo"<td bgcolor=$c2 ></td>";}
                            }

                        echo '</tr>';

                
                                                }
                            }
                    
                    echo '</table>';
                    
                                    }
                    elseif($c1==$c2){ echo '<p id="error">Veuillez Donner des couleurs différentes SVP!</p>';}
                    else{
                        echo '<p id="error">Veuillez remplir les champs SVP!</p>';
                    }
        }
        else
        {
            echo '<p id="error">Veuillez donner une taille du tableau superieur à 2</p>';
        }

    }



    if(isset($_POST['anl'])){
        echo' ';
    }

    ?>

    </div>

</body>
</html>