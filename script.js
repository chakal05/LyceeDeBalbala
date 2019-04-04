$(document).ready(function(){
    check();   
})
    // 

        // login validation

        function isEmail(email){
            var regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
            
            }

        function check(){
       
    
        
        $("form").submit(function(e){
            
            e.preventDefault();
             let errorMessage = "";
             let missingFields ="";
       
      
        if($("#email").val() != "" && isEmail($("#email").val()) === false){
    
            errorMessage += "<p>Votre email n'est pas valide</p>";
    
        } 
        
        if($("#email").val() === ""){
             missingFields += "<br>Il vous manque un email";
         } else if($("#password").val() === ""){
            missingFields += "<br>Il vous manque le mot de passe";
        }
           
        if(missingFields !== ""){
            errorMessage+= " JS Code  Les espaces suivants sont manquants :" + missingFields;
       }
    
       if(errorMessage !== ""){
           $("#errorMessage").html('<div class="alert alert-danger" role="alert">' + errorMessage + '</div>');
       }else{
           
             $("form").submit();
              
           }
    
    })
    
    }