$(document).ready(function(){
    check();    
    checkMessages();
    setInterval(checkMessages(), 2000);
        
     
$('nav ul li .dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });
  


    
    
    /*post message via ajax*/
    $("#send").on("click", function(){
        var message = $.trim($("#message").val()),
            conversation_id = $.trim($("#conversation_id").val()),
            user_from = $.trim($("#user_from").val()),
            user_to = $.trim($("#user_to").val()),
            error = $("#error");
    
        if((message != "") && (conversation_id != "") && (user_from != "") && (user_to != "")){
            error.text("Sending...");
            $.post("post_message_ajax.php",{message:message,conversation_id:conversation_id,user_from:user_from,user_to:user_to}, function(data){
                 error.text(data);
                //clear the message box

                $("#message").val("");
            });
        }
    });

       
    /*post message via ajax*/
    $("#response").on("click", function(){
        var message = $.trim($("#message").val()),
            conversation_id = $.trim($("#conversation_id").val()),
            user_from = $.trim($("#user_from").val()),
            user_to = $.trim($("#user_to").val()),
            error = $("#error");
    
        if((message != "") && (conversation_id != "") && (user_from != "") && (user_to != "")){
            error.text("Sending...");
            $.post("reading_mess.php",{message:message,conversation_id:conversation_id,user_from:user_from,user_to:user_to}, function(data){
                 error.text(" Posted ");
                //clear the message box

                $("#message").val("");
            });
        }
    });
        
        
      
       
    })
    
    
       
        //get message
        
        //get new message every 2 second
       
        function checkMessages() {
            $user = $.trim($("#user_from").val());
          $.get("get_message_ajax.php?user_id="+$user, function(data){
             
            let x = data;
            
            if(x == 0){
                $(".notification #mess").hide();
            } else{
                $(".notification #mess").show().html(x);
            }
       
          })
    
    }

        // login validation

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