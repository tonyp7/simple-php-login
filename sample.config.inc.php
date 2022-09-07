<?php

/**
 * This host the configuration file for php-simple-login; most notably authorized users
 */
$config['title'] = 'simple-php-login';

$login['native'] = array( array( 'user'=>'user1', 'password'=>'password1'), array( 'user'=>'user2', 'password'=>'password2') );

$config['google']['active'] = true; //setting it to false will hid the login with google button
$config['google']['users'] = array( 'foo@gmail.com', 'bar@gmail.com' );


$config['github']['active'] = true; //setting it to false will hide the login with github button
$config['github']['users'] = array( 'tonyp7' ); //list of authorized github users
$config['github']['client_id'] = 'ed233b4e654c5be7a0fe'; //replace by your own OAuth app client id
$config['github']['redirect_uri'] = ''; //if empty the pre-configured redirect_uri in the OAuth app will be used 




?>