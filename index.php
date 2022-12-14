<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('config.inc.php');
require_once('login.inc.php');

//process logins: native 
if(isset($_POST['username']) && isset($_POST['password'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    foreach ($login['native'] as $v){
        if ( $v['user'] == $username && $v['password'] == $password ){
            $_SESSION['active'] = true;
            $_SESSION['method'] = 'native';
            $_SESSION['user'] = $username;
        }
    }
}
else if(isset($_SESSION['github_state']) && isset($_GET['code']) && isset($_GET['state']) && $_SESSION['github_state'] == $_GET['state']){
    //process Github login

    $response = get_oauth_token(GITHUB_OAUTH_GET_TOKEN_URL, $config['github']['client_id'], $config['github']['client_secret'], $_GET['code'], $config['github']['redirect_uri']);

    if($response && isset($response['access_token'])){

        $token = $response['access_token'];

        var_dump($response);

        if($token){
            $user =  get_user_info($token );

            if(isset($user['login']) && in_array($user['login'], $config['github']['users'], true)){
                //yasss
            }
        }
    }

}


if(!isset($_SESSION['active']) || $_SESSION['active'] == false){
	include('login.php');
    exit;
}
else{
	include('protected.php');
}


?>