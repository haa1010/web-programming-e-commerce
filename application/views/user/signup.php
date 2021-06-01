<div>
    <div class="panel-heading">
        <h3 class="panel-title">Sign Up</h3>
    </div>
    <div id="message"><?php if (!empty($message)) {
                            echo $message;
                        } ?></div>
    <div class="panel-body">
        <form method="post" action="/user/signup" class="form-signup" role="form">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Confirm Password" name="confirm-password" type="password" value="">
                </div>
                <button id="button-submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
            </fieldset>
        </form>
    </div>
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
                document.querySelector("#message").textContent = message;
            }
        });
    </script>
</div>