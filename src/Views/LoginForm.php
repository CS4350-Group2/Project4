<!DOCTYPE html>
<html>

<head>
        <meta charset="UTF-8">
        <title>Example Login Form</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
<div id="main">
    <!-- bootstrapped form -->
    <form class="form-inline" id="loginForm">
        <div class="form-group">
            <label for="exampleInputName2">Username: </label>
            <input type="text" class="form-control" id="username" placeholder="username">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Password: </label>
            <input type="password" id="password" class="form-control" placeholder="password">
        </div>
        <input id="submit" type="button" value="Submit" />

    </form>

    <a href="/register" id="registerlink">New User? Register Here</a>
</div>
</body>
<script type="text/javascript">

        $(document).ready(function()
        {
            $("#submit").click(function ()
            {
                var postData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "/api",
                    data: postData,
                    cache: false,
                    statusCode:
                    {
                        200: function(profile)
                        {
                            var profileDisplay = "<div><p>"
                                + "Username: " + profile["username"] + "<br />"
                                + "First Name: " + profile["firstname"] + "<br />"
                                + "Last Name: " + profile["lastname"] + "<br />"
                                + "Email: " + profile["email"] + "<br />"
                                + "Twitter ID: " + profile["twitter"] + "<br />"
                                + "Registration Date: " + profile["regdate"] + '<br />' +
                                "<div><p>";

                            $("#main").html(profileDisplay);
                        },
                        401: function()
                        {

                            location.href = "/register";
                        }
                    }
                });
            });
        });
</script>

</html>