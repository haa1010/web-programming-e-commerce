<html>
<head>
  <link rel="stylesheet" href="<?php echo PATH_URL_STYLE.'user.css'?>">
</head>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="message"><?php if (!empty($message)) {
                                        echo $message;
                                    } ?></div>
                <div class="login-panel panel panel-default">
                    
                    <div class="panel-body">
                      
                        <div class="form-login">
                        <form method="post" action="/user/login" class="form-signin" role="form">
                            <div class="loginForm">
                            <div style="text-align:center; font-weight:bold;font-size:30px">Welcome to 3H!</div>
                             
                            <div class="form-group">
                            <p class="label">Username</p> 
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                                </div>
                             
                                <div class="form-group">
                                <p class="label">Password</p>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value=""/>
                                </div>
                                <div style="width:412px">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <button class="btn-primary" type="submit">Đăng Nhập</button>
                            </div>
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