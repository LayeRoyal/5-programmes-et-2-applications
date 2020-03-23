<?php 
 $tabalphanum=[  'numeric'=>  ['0','1','2','3','4','5','6','7','8','9'],
                  'alphabet'=> ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
                                "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
                                "é","è","ê","ô","â","à","ù","î","ç"
                                ]
                ];

// fonction count
function longueur($objet)
{ $i=0;
    
    while(isset($objet[$i]))
    {
        $i++;
    }
    return $i;
    
}


// fonction  numerique
function verifier_numb($nbr)
{   
    $tabnum= $GLOBALS['tabalphanum']['numeric'];

    $test=false;
   for($j=0;$j<longueur($nbr);$j++) 
   {    $item=$nbr[$j];
         $test=false;
       for($k=0;$k<10;$k++)
       {
        if($item==$tabnum[$k])
        {
            $test=true; 
            break;                                                                                                                     
        }
       }
       if($test==false)
       {
       break;
        }
   }
   return $test;
}


// fonction alpha
function verifier_chaine($chaine)
{  
    $tabalpha=$GLOBALS['tabalphanum']['alphabet'];
    $test=false;
   for($j=0;$j<longueur($chaine);$j++) 
   {    $item=$chaine[$j];
        $test=false;
       for($k=0;$k<longueur($tabalpha);$k++)
       { 
        if($item==$tabalpha[$k])
        {
            $test=true;
            break;
        }

       }
       if($test==false)
       {
       break;
        }
   }
   return $test;
}

// fonction alphanumerique

function verifier_alphanum($chaine)
{   $test=false;
    $tabnumalpha=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
                "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
                "é","è","ê","ô","â","à","ù","î","ç",'0','1','2','3','4','5','6','7','8','9'];

   for($j=0;$j<longueur($chaine);$j++) 
   {    $item=$chaine[$j];
        $test=false;
       for($k=0;$k<longueur($tabnumalpha);$k++)
       {
        if($item==$tabnumalpha[$k])
        {
            $test=true;
             break;
        }
       }
       if($test==false)
       {
       break;
        }
   }
   return $test;
}


//fontion strtoupper

function maj($c)
{
    $tabc=[
    'a' => "A",
    'b' => "B",
    'c' => "C",
    'd' => "D",
    'e' => "E",
    'f' => "F",
    'g' => "G",
    'h' => "H",
    'i' => "I",
    'j' => "J",
    'k' => "K",
    'l' => "L",
    'm' => "M",
    'n' => "N",
    'o' => "O",
    'p' => "P",
    'q' => "Q",
    'r' => "R",
    's' => "S",
    't' => "T",
    'u' => "U",
    'v' => "V",
    'w' => "W",
    'x' => "X",
    'y' => "Y",
    'z' => "Z"

    ];
    foreach ($tabc as $key => $value) 
    {
        if($c==$key)
        {
            $c=$value;
            break;
        }
    }
    return $c;
}

// fonction substr

function suplast($chaine)
{
    $suplast="";
    for($i=0;$i<longueur($chaine)-1;$i++)
    {
        $suplast.=$chaine[$i];
    }
    return $suplast;

}


//fonction pagination
 function paginer($tab,$pagi){
    if(isset($tab))
    {
        $nbre_total_nbreP= longueur($tab);
        $nbre_P_par_page=100;
        $nbre_page_avant_pagination_et_apres=2;
        $last_page= ceil($nbre_total_nbreP/$nbre_P_par_page);
 
 
    

    if(isset($_GET[$pagi]) && ctype_digit($_GET[$pagi]))
    {
        $page_num=$_GET[$pagi];           
       
    }
    else
    {
        $page_num=1;
    }

    if($page_num<1)
    {
        $page_num=1;
    }
    elseif($page_num>$last_page)
    {
        $page_num=$last_page;
    }

    //les nbres generés


    echo'<div id="paginer" ><table ><tr>';
    for($i=($page_num-1)*$nbre_P_par_page;$i<$page_num*$nbre_P_par_page;$i++)
    {   
        if($i>=$nbre_total_nbreP)
        {
        break;
        }
        else{
            if(($i!=(($page_num-1)*$nbre_P_par_page)) && ($i%10==0))
            {   if($i%20==0 )
                {
                    echo'</tr><tr >';
                }
                else
                {
                    echo'</tr><tr id="gris">';
                }
               
            }
            echo '<td>'.$tab[$i].'</td>';
          
        }
       
    }

    echo '</tr></table><div id=pagi>';

    $pagination='';
    if($last_page>1)
    {
        if($page_num>1)
        {
            $previous=$page_num-1;
            $pagination.='<a href="index.php?tab=exo1&'.$pagi.'='.$previous.'">Précédent</a>';


         for($i=$page_num-$nbre_page_avant_pagination_et_apres;$i<$page_num;$i++)
             {
              if($i>0)
                 {
                 $pagination.='<a href="index.php?tab=exo1&'.$pagi.'='.$i.'">'.$i.'</a>';
                 }
             }
        }
       
        $pagination.='<span class="activepage">'.$page_num.'</span>';

        for($i=$page_num+1;$i<$last_page;$i++)
        {
            $pagination.='<a href="index.php?tab=exo1&'.$pagi.'='.$i.'">'.$i.'</a>';
            if($i>=$page_num+$nbre_page_avant_pagination_et_apres)
                {
                break;
                }
        }

        if($page_num!=$last_page)
        {
            $next=$page_num+1;
            $pagination.='<a href="index.php?tab=exo1&'.$pagi.'='.$next.'">Suivant</a>';
        }

        
    }


    echo $pagination;
    echo'</div></div>';

        }
    }
    
?>