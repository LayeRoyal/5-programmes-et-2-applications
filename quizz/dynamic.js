                //nombre de reponse
var nbr=document.getElementById("nbrrep");
var txt=document.getElementById("text");
var rep= document.getElementById("rep");
var input=document.createElement("input");
var text= document.createElement("TEXTAREA");
const label=document.createElement("label");

var choice= document.getElementById("choix");
choice.addEventListener("change",changefunction);
function changefunction() {
    if( (choice.value=="ChoixMultiple") || (choice.value=="ChoixSimple") )
    {
       
     nbr.append(label);
     label.innerHTML="Nbre de réponse: ";
     input.type="number";
     input.id="nbre";
     input.name="nbre";
     input.placeholder="Ex: 3";
     nbr.append(input);
     txt.style.display="none";
     nbr.style.display="flex";
     rep.style.display="";
   


        //generer inputs
     var nbrreponse=document.getElementById("nbre");
    
     nbrreponse.addEventListener("keyup", champ);
     
     function champ() {
     
         var val=document.getElementById("nbre").value  ;

         if(val=="")
         {
             rep.innerHTML = "";            
         
         }
         else
         {   rep.innerHTML="";

            val=parseInt(this.value);
     
          for(let i=1; i<= val;i++){
            let label=document.createElement("label");
            let input = document.createElement("input");
            let  cb= document.createElement("input");
            let  br = document.createElement("br");
             label.id="lab";
             label.innerHTML="Rep "+i+" :";
             input.id="ipt";
             input.setAttribute("required","");
             input.name="ipt"+i;
             cb.className="ckbox";

             if(choice.value=="ChoixMultiple")
             {
                cb.type="checkbox";
                cb.name="ckbox"+i;               

             }
             else
             {               
                cb.type="radio";
                cb.name="ckbox";
               
             }
            
             rep.appendChild(label);
             rep.appendChild(input);
             rep.appendChild(cb);
             rep.appendChild(br);
             

             }
         }
      }

    }
    else if(choice.value=="ChoixText")
    {   
        txt.style.display="block";

        nbr.style.display="none";
        rep.style.display="none";
        label.innerHTML="Réponse";
        txt.append(label);
        txt.append(text);
        text.name="ctext";
        text.setAttribute("required","");
    }
    else{
        txt.style.display="none";
        nbr.style.display="none";
        rep.style.display="none";
    }
 }

               
               
    
    
            
            
          