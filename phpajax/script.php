<?php
// include 'db_conn.php'; 
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

<script>
$(document).ready(function() {
  $("#myform").submit(function(e) {
    event.preventDefault(); // Prevent the default form submission

    // Serialize the form data
    var formData = new FormData(this);

    // Send an AJAX request 
    $.ajax({
      url: "register.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        // Handle the response 
        alert(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
});
</script>
