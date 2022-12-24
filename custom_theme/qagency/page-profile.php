<?php
/*
    Template Name: PROFILE
 */



    get_header();
?>  
<div class="container">
<?php

    if(!isset($_COOKIE['q_token_key'])) {
      echo "<h1> You are not logged in! <br> Please login <a href='/api-login'>here</a>.";
    } else{

        $access_token =  $_COOKIE['q_token_key'];
   
        $response = callApi('GET', 'https://symfony-skeleton.q-tests.com/api/v2/me', array(), $access_token);
        
        echo "<h1> Welcome: ".$response['first_name']. " ". $response['last_name']. "!";
    }
    ?>


</div>
<?php

    get_footer();
