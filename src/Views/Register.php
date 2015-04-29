
<!DOCTYPE html>
<html>
    <head>
		<title>Registration Form</title>
		
		<link>
    </head>
    <body>
  
            <div id='registerForm'>
            	<h1> Please Register </h1><br />
                <p>
                	<label>Username: </label>
						<input id="name" type="text"/><br /><br />
                	<label>Password: </label>
						<input id="password" type="password"/><br /><br />
                    <label>First Name: </label>
                        <input id="firstname" type="text"/><br /><br />
                    <label>Last Name: </label>
                        <input id="lastname" type="text"/><br /><br />
                    <label>Email: </label>
                        <input id="email" type="email"/><br /><br />
                    <label>Twitter Username: </label>
                        <input id="twitter" type="text"/><br /><br />
                    <input id="submit" type="button" onclick="register()" value="Submit" /><br />
            	</p>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

function register(){

  $(document).ready(function() {
    });

    function formSubmit() {
        var jsonRequestBody = $("registerForm").serialize();
        var responseData = $.post("/newuser", jsonRequestBody)
            .done(function( data ) {
                console.log( "Data Loaded: " + data );
                // Handle login success
                location.href = "/welcome";
            });

        responseData.fail(function() {
            // Handle login failure
            location.href = "/register";
        });

}
        </script>
</script>

    </body>
</html>