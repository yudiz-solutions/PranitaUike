<?php
include 'db_conn.php'; 
?>
<script src="https://ajax.ggogleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<script type = "text/javascript">
function submitData(){
    $(document).ready(function(){
      var data = {
        first_name: $('#first_name').val(),
        last_name: $('#last_name').val(),
        username: $('#username').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        confirm_password: $('#confirm_password').val(),
        dob: $('#dob').val(),
        hobby: $('#hobby').val(),
        gender: $('#gender').val(),
        country: $('#country').val(),
        message: $('#message').val(),
        profile_image: $('#profile_image').val(),
        action: $('#action').val(),
      };

      $.ajax({
         url: 'function.php',
         type: 'post',
         data: data,
         success:function(response){
            alert(response);
            if(response == "login successful"){
                window.location.reload();
            }
         }
      });
    });
}

</script>