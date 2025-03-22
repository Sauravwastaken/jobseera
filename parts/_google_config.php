<?php
      require __DIR__ . "/../vendor/autoload.php";

      $client = new Google\Client;
  
      $client->setClientId("694862754349-i46tpb46r7b84akkd00tq88vobl2s425.apps.googleusercontent.com");
      $client->setClientSecret("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");
      $client->setRedirectUri("http://localhost/redirect.php");
?>