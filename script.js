$(document).ready(function(){
    check();
    })
    
    
        function check(){
       
        function isEmail(email){
        var regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
        
        }
    
        
        $("form").submit(function(e){
    
             e.preventDefault();
             let errorMessage = "";
             let missingFields ="";
       
      
        if($("#email").val() != "" && isEmail($("#email").val()) === false){
    
            errorMessage += "<p>Votre email n'est pas valide</p>";
    
        } 
        
        if($("#email").val() === ""){
             missingFields += "<br>Il vous manque un email";
         }
        
         if($("#password").val() === ""){
            missingFields += "<br>Il vous manque le mot de passe";
        }
           
        if(missingFields !== ""){
            errorMessage+= " JS Code  Les espaces suivants sont manquants :" + missingFields;
       }
    
       if(errorMessage !== ""){
           $("#errorMessage").html('<div class="alert alert-danger" role="alert">' + errorMessage + '</div>');
       }else{
           
              $("form").unbind("submit").submit();
              
           }
    
    })
    
    }
    