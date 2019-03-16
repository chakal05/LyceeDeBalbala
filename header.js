$(document).ready(function(){
checkMessages();
setInterval(checkMessages(), 2000);
    $('nav ul li .dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
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