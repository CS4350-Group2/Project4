
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
                	<input id="submit" type="button" onclick="registerSubmission" value="Submit" /><br />
            	</p>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
		function registerSubmission() {
        $.post('/register/', $("#registerForm").serialize()).done(function (data) {
        
          alert(data);
        });
				// AJAX POST submission
					$.ajax({
						type: "POST",
						url: "/",
						data: data,
						cache: false,
                        dataType:'JSON',
                        statusCode: 
                        {
                            200: function()
                            {
                                alert('logged in succesfully');
                                location.href = "/profile"
                            },
                            401: function() 
                            {
                                alert('not authorized');
                                
                            }
                            404: function() 
                            {
      							alert( "page not found" );
    						}

                        };       
                                        
            

				}
			});
		});
</script>

    </body>
</html>