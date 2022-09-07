<?php

define('GITHUB_OAUTH_URL', 'https://github.com/login/oauth/authorize');
define('GITHUB_OAUTH_GET_TOKEN_URL', 'https://github.com/login/oauth/access_token');
define('GITHUB_OAUTH_GET_USER_URL', 'https://api.github.com/user');


function http_get($url, $data, $headers){

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    if(!empty($headers)){
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function http_post($url, $data, $headers){
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    if(!empty($headers)){
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}


function get_user_info($token){
    $headers = array(
        "Accept: application/json",
        "Authorization: Bearer ".$token,
    );
    
    $response = http_get(GITHUB_OAUTH_GET_USER_URL, '', $headers);

    if($response)
        $response = json_decode($response, true);

    return $response;
}


function get_oauth_token($url, $client_id, $client_secret, $code, $redirect_uri){

    $data = array('client_id' => $client_id, 'client_secret' => $client_secret, 'code' => $code);

    if(!empty($redirect_uri)){
        $data['redirect_uri'] = $redirect_uri;
    }

    $response = http_post(GITHUB_OAUTH_GET_TOKEN_URL, $data, array("Accept: application/json"));

    if($response)
        $response = json_decode($response, true);

    return $response;
}

function print_github_button($client_id, $return_uri){

    $_SESSION['github_state'] = bin2hex(random_bytes(16));

    printf('
<a href="%s?client_id=%s%s&allow_signup=false&state=%s" id="github-button" class="w-100 btn btn-lg btn-block btn-social btn-github mt-1">
    <i class="bi bi-github"></i> Sign in with GitHub
</a>', GITHUB_OAUTH_URL, 
        $client_id,
        empty($return_uri)?'':sprintf('&return_uri=%s',$return_uri),
        $_SESSION['github_state']
    );


}


?>