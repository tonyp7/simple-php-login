<?php

define('GITHUB_OAUTH_URL', 'https://github.com/login/oauth/authorize');

function print_github_button($client_id, $return_uri){

    printf('
<a href="%s?client_id=%s%s&allow_signup=false" id="github-button" class="w-100 btn btn-lg btn-block btn-social btn-github mt-1">
    <i class="bi bi-github"></i> Sign in with GitHub
</a>', GITHUB_OAUTH_URL, 
        $client_id,
        empty($return_uri)?'':sprintf('&return_uri=%s',$return_uri)
    );


}


?>