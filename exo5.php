<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO5</title>
    <link rel="stylesheet" type="text/css" href="exos.css">

</head>
<body>
     <!-- le conteneur fenêtre -->
  <div class="marquee-rtl">
    <!-- le contenu défilant -->
    <div>Ce programme permet d'extraire  l’ensemble des numéros de téléphones contenu dans le champ.
         Puis  affiche le pourcentage de numéro de chaque opérateur et le pourcentage de numéro invalide  
   </div>
    </div>

        <form  method="post">
        <label> <h2 id=""> Veuillez Entrer les numeros séparés par espace tiret de 6(-) ou point virgule </h2></label>
    <input type="textarea"  class="txt5" name="numbers" value="<?php  if(!empty($_SESSION['bnum'])){foreach($_SESSION['bnum'] as $key){echo $key.' ';}}?>"></input>

    <input id="bt5" type="submit" name="aff" value="AFFICHER"/>

        </form>

        <!--code php-->
   
    <?php
     include("propre_fonction.php");

    if(isset($_POST['aff']))
        {   
            if(empty($_POST['numbers']))
            {
            echo'Veuillez donner les numéros';
            }
            else{

            $nbr=$_POST['numbers'];
            $numb= array();
            $bnumb=array();
            $mnumb=array();
            $Operateur=array();
            $Operateur['Orange']=array();
            $Operateur['Free']=array();
            $Operateur['Expresso']=array();
            $Operateur['ProMobile']=array();
            $cpto=0;
            $cptf=0;
            $cpte=0;
            $cptpm=0;
            $temp="";
            for($i=0;$i<longueur($nbr);$i++)
            {
                $item=$nbr[$i];
                if($item!=" " && $item!=";" && $item!="-"){
                    $temp=$temp.$item;
                }
                else{
                    $numb[]=$temp;
                    $temp="";
                }
            }
                $numb[]=$temp;

                for($i=0;$i<longueur($numb);$i++)
                {
                if(preg_match('#^(77|76|78|70|75)[0-9]{7}$#',$numb[$i])){
                    $bnumb[]=$numb[$i];
                }
                else{
                    $mnumb[]=$numb[$i];  
                }
                } 

                $_SESSION['bnum']=$bnumb;
            

             foreach ($bnumb as $n ){
                if(preg_match('#^(77|78)#',$n)){
                    array_push($Operateur['Orange'],$n);
                    $cpto++;

                }
                elseif(preg_match('#^(76)#',$n)){
                    array_push($Operateur['Free'],$n);
                    $cptf++;
                }
                elseif(preg_match('#^(70)#',$n)){
                    array_push($Operateur['Expresso'],$n);
                    $cpte++;
                }
                else{
                    array_push($Operateur['ProMobile'],$n);
                    $cptpm++;
                }
            }
             $total=longueur($numb);
                        //il entre seulement si les numeros saisis sont valides
                    if(!empty($bnumb)){
                    $Porange=number_format((longueur($Operateur['Orange'])/$total),4);
                    $Pfree=number_format((longueur($Operateur['Free'])/$total),4);
                    $Pexpresso=number_format((longueur($Operateur['Expresso'])/$total),4);
                    $PProMobile=number_format((longueur($Operateur['ProMobile'])/$total),4);

                    if(isset($mnumb))
                    {  echo '<div id="mnum">';
                       foreach($mnumb as $key){echo '<u>'.$key.'</u> &nbsp';}
                       echo '</div>';
                    }

                    echo '<h3 id="numb"> Les Numéros:</h3><div class="reseau">';
                    echo '<table id="tabnum"><th>Orange </th>';
                    
                    foreach($Operateur['Orange'] as $key){echo '<tr><td>'.$key.'</td></tr>';}
                  //echo 'Pourcentage Orange égale '.($*100).'%<br><br>';
                  echo '</table>';
                  echo '<table id="tabnum"><th>Free </th>';

                      foreach($Operateur['Free'] as $key){echo '<tr><td>'.$key.'</td></tr>';}
                      echo '</table>';
                 // echo 'Pourcentage Free égale '.($Pfree*100).'%<br><br>';

                  echo '<table id="tabnum"><th>Expresso </th>';

                      foreach($Operateur['Expresso'] as $key){echo  '<tr><td>'.$key.'</td></tr>';}
                       //echo 'Pourcentage Expresso égale '.($Pexpresso*100).'%<br><br>';
                       echo '</table>';
                       echo '<table id="tabnum"><th>ProMobile </th>';
                    
                       foreach($Operateur['ProMobile'] as $key){echo '<tr><td>'.$key.'</td></tr>';}
                       echo '</table></div><div id="per">';
                    
                             }
                             $pourinv=number_format((longueur($mnumb)/$total),4);
                             echo '<h3  class="perc">Pourcentage :</h3>';
                             echo '<table id="per"><tr><td>Orange</td><td>Free</td><td>Expresso</td><td>ProMobile</td><td>Numero invalide</td></tr>';
                             echo '<tr>';
                             echo '<td>'.($Porange*100).'%</td>';
                             echo '<td>'.($Pfree*100).'%</td>';
                             echo '<td>'.($Pexpresso*100).'%</td>';
                             echo '<td>'.($PProMobile*100).'%</td>';
                             echo '<td>'.($pourinv*100).'%</td></tr></table></div>';
                             //numb invalide
                  
                      
                    }
                }
    ?>


</body>
</html>

