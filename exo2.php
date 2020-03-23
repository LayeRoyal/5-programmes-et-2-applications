<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo2</title>
    <link rel="stylesheet" type="text/css" href="exos.css">
</head>
<body>
     <!-- le conteneur fenêtre -->
<div class="marquee-rtl">
    <!-- le contenu défilant -->
    <div>Choisir une langue puis s'affiche les mois sous forme de tableau . </div>
</div>
    <form class="formm"  method="post">
        <select id="select" name="choix" >
        <option <?php if(isset($_POST['choix'])&& $_POST['choix']=="SELECTIONNER"){echo 'selected="selected"';}  ?>>SELECTIONNER</option>
        <option  <?php if(isset($_POST['choix'])&& $_POST['choix']=="Fr"){echo 'selected="selected"';}  ?>>Fr</option>
        <option  <?php if(isset($_POST['choix'])&& $_POST['choix']=="En"){echo 'selected="selected"';}  ?>>En<o/ption>
        </select>
    <button id="lbut"  name="but">AFFICHER</button>
    </form>

    <div class="cal">
    <?php
        
        if(isset($_POST['but']))

        {
            $choix=$_POST['choix'];

                //fonction afficher
                function aff_tableau($p){

                    $cal=array(
                        '1'=> ["Janvier","January"],
                        '2'=> ["Fevrier","February"],
                        '3'=> ["Mars","March"],
                        '4'=> ["Avril","April"],
                        '5'=> ["Mai","May"],
                        '6'=> ["Juin","June"],
                        '7'=> ["Juillet","July"],
                        '8'=> ["Aout","August"],
                        '9'=> ["Septembre","September"],
                        '10'=> ["Octobre","October"],
                        '11'=> ["Novembre","November"],
                        '12'=> ["Decembre","December"]
                            );
                        define("m",12);
    
                    echo '<tr style="background-color:rgba(221, 220, 220, 0.829);">'; 
                    for($i=1;$i<=m;$i++){
                      echo'<td>'.$i.'</td><td>'.$cal[$i][$p].'</td>';
                      if($i%3==0 && $i!=m){
                          if($i==3){
                          echo '</tr><tr style="background-color:rgb(179, 178, 178);">';}
                                            }
                        if($i==6){
                          echo '</tr><tr style="background-color:rgba(221, 220, 220, 0.829);">';
                                }
                        if($i==9){ 
                          echo '</tr><tr style="background-color:rgb(179, 178, 178);">';
                                 }
                                        }
                    
                    echo'</tr>';    
                             }
    
                echo'<table>';
                   
                if($choix=="Fr")
                { 
                    aff_tableau(0);
                }
                                        
                elseif($choix=="En")
                {
                    aff_tableau(1);
                }
                else
                {
                    echo'<span id="selec" >Veuillez choisir une langue</span>';
                }
                                       
                 echo'</table>'  ; 
                 
        }

    ?>
   </div>
</body>
</html>