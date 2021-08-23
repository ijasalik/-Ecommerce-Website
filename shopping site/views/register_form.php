<!DOCTYPE html>
<html >
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
            <a class="logotype" href="register_form.php"><h1>Register here</h1></a>
        </header>
        <div class="row justify-content-center">
            <div class="reg-box col-xs-12 col-md-6">

                <br>
                <form name="registerform" action="../partials/register.php" method="POST">

                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" required>
                    <div class="invalid-feedback" style="font-size:16px;">Name is required</div>
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" required>  
                    <div class="invalid-feedback emailError" style="font-size:16px;">Email is required</div>
                    </div>
                    <div class="form-group">
                    <label for="register_password">Password</label>
                    <input type="password" name="password" id="register_password" class="form-control" required>
                    <div class="invalid-feedback" style="font-size:16px;">Password is required</div>
                    </div>
                    <br>
                    <div class="button_holder text-center">
                    <input class="login_button" id="submit" type="submit" name="submit" value="Submit">
                    <a href="login_form.php" style="float:right;margin-top:10px;">Already have an account ?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
     
</body>
</html>


