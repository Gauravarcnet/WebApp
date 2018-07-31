<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashe
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
  $query = "INSERT INTO registration (name, email, password,gender)
  VALUES ('$username','$email','$password','male')";
        $result = mysqli_query($con,$query);
        if($result){
          echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{

?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action=""  onsubmit="return validateForm()" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="password" name="Confirmpassword" placeholder="Confirmpassword" required />
<input type="submit" name="submit" value="submit" />
</form>
</div>
<?php } ?>
<script>
function validateForm() {
    var password = document.forms["registration"]["password"].value;
    var Confirmpassword = document.forms["registration"]["Confirmpassword"].value;
    if (Confirmpassword != password) {
        alert("Password DoesNot Match Fill it again");
        return false;
    }
    // $.ajax({
    //            type: "POST",
    //            data: {
    //                username: $('username').val(),
    //            },
    //            url: "registration.php",
    //            success: function(data)
    //            {
    //                if(data === 'USER_EXISTS')
    //                {
    //                    $('#user')
    //                        .css('color', 'red')
    //                        .html("This user already exists!");
    //                }
    //                else if(data === 'USER_AVAILABLE')
    //                {
    //                    $('#user')
    //                        .css('color', 'green')
    //                        .html("User available.");
    //                }
    //            }
    //        })
}
</script>

</body>
</html>
