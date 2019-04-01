$(document).ready(function(){
        //get new message every 3 second
    NewMess();
    //Is creating to many connection to the port; You'll have to increase the number of port  
  setTimeout(NewMess(),3000);
   
})



    function NewMess(){
        $user = $.trim($("#user_from").val());

        $.ajax({
         url: "get_message_ajax.php?user_id="+$user,
         type: 'get',
         success: function(data){
          // Perform operation on return value
          $(".badge").html(data);
         },
         complete:function(data){
          setTimeout(NewMess(),3000);
         }
        });
       }
       
   