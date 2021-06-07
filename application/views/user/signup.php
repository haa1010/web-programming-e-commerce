<html>

<head>
    <link rel="stylesheet" href="<?php echo PATH_URL_STYLE . 'user.css' ?>">
</head>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <div class="form-login">
                            <form method="post" action="/user/signup" class="form-signup" role="form">
                                <div class="loginForm">
                                    <div class="form-group">
                                        <p class="font-bold">Username</p>
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus require>
                                    </div>
                                    <div class="form-group">
                                        <p class="font-bold">Password</p>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" require>
                                    </div>
                                    <div class="form-group">
                                        <p class="font-bold">Confirm password</p>
                                        <input class="form-control" placeholder="Confirm Password" name="confirm-password" type="password" value="" require>
                                    </div>

                                    <div class="message"><?php if (!empty($message)) {
                                                            echo $message;
                                                        } ?></div>
                                    <button class="btn-submit" type="submit">Sign Up</button>
                                    <div class="direct"><span style="color:#656767">Already have an account?</span><a href="?url=user/login&api=1" class=" color-green"> Login</a></div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
<script>
    document.querySelector(".form-signup").addEventListener("submit", function(e) {
        let isValid = false;
        let message = "";
        let params = document.querySelectorAll(".form-control");
        if (params[1].value == params[2].value && params[1].value)
            isValid = true;
        else {
            message = "Incompatible password!";
        }
        if (!isValid) {
            e.preventDefault()
            document.querySelector(".message").textContent = message;
        }
    });
</script>
</div>