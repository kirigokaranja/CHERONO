<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V15</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="CSS/util.css">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(IMAGES/slide1.png);">
					<span class="login100-form-title-1">
						Sign In
					</span>
            </div>

            <form class="login100-form validate-form">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="username" placeholder="Enter EmailAddress">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="pass" placeholder="Enter Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn" style="margin-left: 20%">
                    <button class="login100-form-btn">
                        Login
                    </button>

                </div>
                <p style="margin-top: 5%; margin-left: 18%">Not a Customer? <a style="color: #d02954" href="signup.php">SIGNUP</a></p>
            </form>
        </div>
    </div>
</div>



</body>
</html>