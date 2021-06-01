<?php
class UserController extends BaseController
{
    private function genToken($username)
    {
        $issuedAt   = new DateTimeImmutable();
        $expire     = $issuedAt->modify('+7 days')->getTimestamp();      // Add 60 seconds
        // $serverName = "your.domain.name";
        $header = json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]);
        $payload =  json_encode([
            'iat'  => $issuedAt->getTimestamp(),         // Issued at: time when the token was generated
            'nbf'  => $issuedAt->getTimestamp(),         // Not before
            'exp'  => $expire,                           // Expire
            'username' => $username,
        ]);

        //encode 
        $base64UrlHeader = base64UrlEncode($header);
        $base64UrlPayload = base64UrlEncode($payload);
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, SECRET, true);
        $base64UrlSignature = base64UrlEncode($signature);

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }
    private function validate_token($jwt)
    {
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signatureProvided = $tokenParts[2];

        // Check expired


        // Check secret
        $base64UrlHeader = base64UrlEncode($header);
        $base64UrlPayload = base64UrlEncode($payload);
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, SECRET, true);
        $base64UrlSignature = base64UrlEncode($signature);

        $signatureValid = ($base64UrlSignature === $signatureProvided);

        $data = json_decode($payload, true);
        $now = new DateTimeImmutable();
        $exp = intval($data['exp']);

        $tokenExpired = $exp - $now->getTimestamp();

        if ($signatureValid && ($tokenExpired > 0))
            return $data['username'];
        return null;
    }
    public function login()
    {
        if (isset($_COOKIE['token'])) {
            $value = $this->validate_token($_COOKIE['token']);
            if ($value != NULL && !empty($_SESSION['username']))
                $_SESSION['username'] = $value;
        }
        if (!empty($_SESSION['username'])) {
            redirect("home", "index");
        }
        if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
            $result = $this->User->login($_REQUEST['username'], $_REQUEST['password']);
            if (count($result) == 1) {
                $_SESSION['username'] = $result['User']['username'];
                $_SESSION['avatar']  = $result['User']['avatar'];
                if (isset($_REQUEST['remember'])) {
                    setcookie("token", $this->genToken($_SESSION['username']));
                }
                redirect("home", "index");
            } else
                $this->set("message", "Invalid username or password");
        } else {
        }
    }


    public function logout()
    {
        $_SESSION['username'] = "";
        $_SESSION['avatar'] = "";
        setcookie("token", "", time() - 3600);
        header("Refresh:0");
    }

    public function signup()
    {
        if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $user = $this->User->getOne($username);
            if (count($user) > 0) {
                $this->set("message", "Username already exist!");
                return;
            } else {
                $result = $this->User->createOne($username, hash_password($password));
                if ($result == 0)
                    $this->set("message", $this->User->getError());
                redirect("user", "login");
            }
        }
    }
}
