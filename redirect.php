<?php
    
  include_once('parts/_google_config.php');

  if(!isset($_GET['code'])) {
    echo "Login Failed";
  }

  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

  $token->setAccessToken($token['access_token']);

  $oauth = new Google\Service\0auth2($client);
  $user_info = $oauth->userinfo->get();

  var_dump($user_info->name,$user_info->givenName,$user_info->email);
?>