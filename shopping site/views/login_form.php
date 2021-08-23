<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
        <main class="container">
            <header>
                <a class="logotype" href="../index.php"><h1>Login</h1></a>
            </header>
                <div class="row justify-content-center">
                    <div class="reg-box col-xs-12 col-md-6">
                  
                        <br>
                            <form name="loginform" action="../partials/login.php" method="POST">
                                <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" required> 
                                <div class="invalid-feedback emailError" style="font-size:16px;">Email is required</div> 
                                </div>
                                <div class="form-group">
                                <label for="login_password">Password</label>
                                <input type="password" name="password" class="form-control" id="login_password" required>
                                <div class="invalid-feedback passwordError" style="font-size:16px;">Password is required</div>
                                </div>
                                <div class="button-holder text-center">
                                <input class="login_button" name="login" type="submit" value="Login">
                                <a href="register_form.php" style="float:right;margin-top:10px;">Create new account</a>
                                </div>
                            </form>      
                </div>
            </div>
        </main>
</body>
</html>
