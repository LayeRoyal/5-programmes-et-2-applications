<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO3</title>
    <link rel="stylesheet" type="text/css" href="exos.css">
</head>
<body>

  <!-- le conteneur fenêtre -->
  <div class="marquee-rtl">
    <!-- le contenu défilant -->
    <div>Ce programme affiche les mots du tableau puis détermine et affiche le nombre de mot contenant la lettre « M ».
         Chaque mot ne pourra contenir que 20 caractères et constitués de caractères alphabetiques. 
         </div>
</div>
    <div class="cadre1">

    <form method="post" class="form">
     NBRE DE MOT: <input class="nbr" type="text" name="nbrmot" value="<?php if(isset($_POST['nbrmot'])){echo $_POST['nbrmot'];}?>" >
    <button class="bt"   name="ADD">ADD</button>
    </form>
    
    </div>

    <!--CODE PHP-->
    <div class="txt3">
    <?php
      include("propre_fonction.php");


      // GENERER LES INPUTS
      if(isset($_POST['ADD']))
      {
      if(empty($_POST['nbrmot'])){
        echo '<p id="rectif"> Veuillez donner le nombre de mot: </p>';
                                 }
        elseif(!ctype_digit($_POST['nbrmot']))
        {
            echo '<p id="rectif"> Veuillez donner un nombre de SVP: </p>';
        }
        else
        {
            $nbrmot=(int)$_POST['nbrmot'];
           $_SESSION['nbr']=$nbrmot;
        }  
        if(isset($nbrmot) )
        {   echo '<form id="iptmot" method="post">';
           for($i=1;$i<=$nbrmot;$i++)
           {
               echo '<div class="ipt3" ><label>Mot : '.$i.'</label> <input name="ipt'.$i.'" type="text"/></div>';
           }
           echo '<button class="bt" id="bt3" name="Aff" >Envoyer</button></form>';
        }
       
        }


        // VALIDER LES MOTS 
        if( isset($_POST['Aff']))
        {    $tabgeneral=[];
            $nbrmot=$_SESSION['nbr'];
            echo '<form id="iptmot" method="post">';
            for($i=1;$i<=$nbrmot;$i++)
            {   
              
              $tabgeneral[]=$_POST['ipt'.$i];
              echo '<div class="ipt3" ><label>Mot : '.$i.'</label> <input name="ipt'. $i.'" value="';
             if(isset($_POST['ipt'.$i]))
                {

                    if( verifier_chaine($_POST['ipt'.$i]))
                    {
                        echo $_POST['ipt'.$i];
                    }
                    echo'" type="text"/></div>';


                }
         
           
           }
           echo '<button class="bt" id="bt3" name="Aff" >Envoyer</button></form>';


           // testons si les champs sont remplis et sont des alphabet

           $test_vide=true;
           $test_chaine=true;
           $non_string=[];
           for($k=0;$k<longueur($tabgeneral);$k++)
           {
               if(empty($tabgeneral[$k]))
               {
                   $test_vide=false;
               }
               if(!verifier_chaine($tabgeneral[$k]))
               {
                    $test_chaine=false;
                    $non_string[]=$tabgeneral[$k];
               }
           }


           if($test_vide==false || $test_chaine==false)
           {
               if($test_vide==false)
               {
                   echo 'Veuillez remplir tous les champs SVP!<br/>';
               }
               else
               {    echo 'Mot(s) non constitué(s) de caracteres alphabetique(s)<br/>';
                   for ($n=0; $n < longueur($non_string); $n++) 
                   { 
                      echo $non_string[$n].'<br/>';
                   }
               }
               
           }

           else
           {

            
          //Stockage des MOTS
           $tabm=[];
           $tabError=[];
           for($i=0;$i<longueur($tabgeneral);$i++)
            {   //test de la longueur du mot
                if(longueur($tabgeneral[$i])>20)
                {
                    $tabError[]=$tabgeneral[$i];
                }
                else
                {
                     //test s'il y'a m

                    $cpt=0;
                    for($j=0;$j<longueur($tabgeneral[$i]);$j++)
                    {
                        if($tabgeneral[$i][$j]=="m" || $tabgeneral[$i][$j]=="M")
                        {
                            $cpt++;                 
                        }
                        
                    }
                    
                    //Mot avec m dans tabm[]
                    if($cpt>=1)
                    {                
                        $tabm[]=$tabgeneral[$i];   
                    }         
                }
            }     
            
            // les mauvais mots affichés
            if(!empty($tabError))
            {
                echo 'Ce(s) mot(s) depasse(nt) 20 caracteres <br/>';
                for ($i=0; $i < longueur($tabError); $i++) 
                { 
                    echo $tabError[$i].'<br/>';
                }
            }
            else
            {
                //les bons mots affichés
                echo'<div id="mot"><div id="tabmot"><table ><th >Les mots saisis sont:</th>';
                for ($i=0; $i<longueur($tabgeneral); $i++)
                {  if($i%2!=0 )
                    {
                        echo '<tr><td>'.$tabgeneral[$i].'</td></tr>';
                    }
                    else
                    {
                       echo '<tr id="gris"><td>'.$tabgeneral[$i].'</td></tr>';
                    }
                                    
                }
                echo'</table></div>';

                 //les mots contenant M affichés
                 if(!empty($tabm))
                 {
                    echo'<div id="tabmot"><table ><th>Mots contenants M/m </th>';
                    for ($l=0; $l<longueur($tabm); $l++)
                    {   if($l%2!=0 )
                        {
                            echo '<tr><td>'.$tabm[$l].'</td></tr>';
                        }
                        else
                        {
                           echo '<tr id="gris"><td>'.$tabm[$l].'</td></tr>';
                        }
                    }
                    echo'</table></div></div>';
                 }
                
                
            }


           }



   
        }


     
?> 
</div>   
</body>
</html>