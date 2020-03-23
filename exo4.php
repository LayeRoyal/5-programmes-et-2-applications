<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO4</title>
    <link rel="stylesheet" type="text/css" href="exos.css">
</head>
<body>
  <!-- le conteneur fenêtre -->
  <div class="marquee-rtl">
    <!-- le contenu défilant -->
    <div>Ce programme enlève tous les espaces inutiles puis réaffiche les phrases corrigées dans un autre textArea.
   </div>
    </div>
    <div class="cadre2">

    <form method="post" >
    <h1 class="phr">PHRASE:</h1> <textarea id="ch" type="text" name="phrases" ><?php  if(!empty($_POST['phrases'])){echo $_POST['phrases']; }?></textarea>
    <input id="btt" type="submit" value="AFFICHER" name="aff">
    </form>
    
    </div>

    <!--CODE PHP-->
   
    <?php

    include("propre_fonction.php");
        
      if(isset($_POST['aff'])){
        if(empty($_POST['phrases']) || verifier_numb($_POST['phrases']))
        {
           if(empty($_POST['phrases']) ) 
                {
                echo '<p id="err"> Veuiller remplir le champs</p>';
                  }
         else   {echo '<p id="err"> Veuillez saisir une chaine  </p>';}
        }
     
        else{
        
        $chaine=$_POST['phrases'];
        $temp="";
        $tab= array();
        $tabm=array();
        for($i=0;$i<longueur($chaine);$i++){
            //premiere lettre   
            if($i==0){
                $temp=maj($chaine[0]);
                        }
             else{ //1 à n     
            $item = $chaine[$i];
            // uppercase apres espce

            if($chaine[$i-2]=="." && $chaine[$i-1]==" ")
            {
             $item=maj($item);
           }

            //apres . un espace puis uppercase 
                if($chaine[$i-1]=="." || $item=="'" || $item==","){
                     if($chaine[$i-1]=="." )
                     {                       
                        $item=maj($item);
                    
                    }
                 
                    //espace avant apostrophe ou virgule à enlever
                    else{ //'
                    if($chaine[$i-1]==" ")
                    {
                        $temp=suplast($temp);
                    }
                      
                         }
                        } 
        
            

                 if($item!="."){
                    $temp=$temp.$item;
                 //enlever 1 ou plusieur espace apres apstrophe

                 if($item==" " && $chaine[$i-1]==" "){  $temp=suplast($temp);}
                 if($item==" " && $chaine[$i-1]=="'"){ $temp=suplast($temp);}
                
       

                    }
            
                    else{ // item = . enlever espace avant un point
                if($chaine[$i-1]==" "){ $temp=suplast($temp);}
                $tab[]=$temp;
                $temp="";
                        }    
                
                }
                }
                if(!empty($temp)){
                $tab[]=$temp;
                }

                echo '<div class="crg"><h1 class="phr"> CORRECTION:</h1>';
                echo '<textarea class="corrige" readonly>'; 
                for($i=0;$i<longueur($tab);$i++){
                echo $tab[$i].".";}
                echo '</textarea></div>';  
                }    
     
    }
    
           
?>    
</body>
</html> 