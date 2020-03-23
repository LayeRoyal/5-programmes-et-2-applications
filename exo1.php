<?php
session_start();
set_time_limit(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO1</title>
    <link rel="stylesheet" type="text/css" href="exos.css">
</head>
<body id="exo1">

 <!-- le conteneur fenêtre -->
<div class="marquee-rtl">
    <!-- le contenu défilant -->
    <div>Ecrire une valeur supérieure à 10 000 ensuite le programme affiche 2 tableaux inferieur et superieur à la moyenne
         des nombres premiers entre 1 et la valeur saisie sous forme de pagination </div>
</div>

<form class="form1" method="post" >
    Nombre: <input class="nbr" type="text" name="nbr" value="<?php  if(isset($_SESSION['saisi'])){echo $_SESSION['saisi'];}?>">
    <input class="bt" type="submit" value="AFFICHER" name="aff">
</form>
        <!--Code PHP-->
<div class="txt1">
    <?php
   
    if(isset($_POST['aff']))
    {  
        $_SESSION['saisi']=$_POST['nbr'];
        $nbr=$_POST['nbr'];
        if(!ctype_digit( $nbr))
        {echo 'Veuillez donner un nombre';
        }
        elseif($nbr<=10000)
        {
            echo 'Veuillez entrer un nombre superieur ou égale à 10000';
        }
        else{
            $som=0;
            $Tab=array();
            $Ti=array();
            $Tf=array();
            $cpt=0;
            for($i=2;$i<=$nbr;$i++){
                for($j=1;$j<=$i;$j++){
                    if($i%$j==0)
                    {
                        $cpt++;
                    }
                } 
                    if($cpt==2){
                    $Tab[]=$i;
                            }
                            $cpt=0;
                                  }

                   for($k=0;$k<longueur($Tab);$k++)
                   {
                     $som+=$Tab[$k];
                   }
                     $moy=($som/longueur($Tab));
                               
            for($l=0;$l<longueur($Tab);$l++){
                if($Tab[$l]<$moy)
                {
                    $Ti[]=$Tab[$l];
                }
                else{ $Tf[]=$Tab[$l];}
               
            }
        $T1=array(
        'inferieur'=>$Ti,
        'superieur'=>$Tf
        );
                        
         $_SESSION['inférieur']=$T1['inferieur'];
         $_SESSION['supérieur']=$T1['superieur'];

        }
    
       
    }


    include("propre_fonction.php") ;

    // affichage des paginations
  
   
    if(isset($_SESSION['inférieur']) && (isset($_SESSION['supérieur'])))
    {   echo '<div id="pagi1" ><div id="h11"><h1 id="titlepagi">Le Tableau à clé inférieure</h1></div>';
       echo paginer($_SESSION['inférieur'],'page').'</div>';
       echo'<div id="pagi2" ><div id="h11"><h1 id="titlepagi">Le Tableau à clé Supérieure </h3></div>';
       echo paginer($_SESSION['supérieur'],'c').'</div>';
    }
   

     
    
   

    ?>
</div>

</body>
</html>