<?php

if ( ! function_exists( 'qagency_setup' ) ) :

	function qagency_setup() {
		

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'qagency' )

		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'qagency_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'qagency_setup' );

 function callAPI($method, $url, $data, $access_token=false){
	$curl = curl_init();
	switch ($method){
	   case "POST":
		  curl_setopt($curl, CURLOPT_POST, 1);
		  if ($data)
			 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		  break;
	   case "PUT":
		  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		  if ($data)
			 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
		  break;
	   default:
		  if ($data)
			 $url = sprintf("%s?%s", $url, http_build_query($data));
	}
	// OPTIONS:
	curl_setopt($curl, CURLOPT_URL, $url);
	$header = "Content-Type: application/json";
	if($access_token){
		$authorization = "Authorization: Bearer ".$access_token;
		curl_setopt($curl, CURLOPT_HTTPHEADER, array($header , $authorization ));
	} else{
		curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
	}
	
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	$result = curl_exec($curl);
	$result = json_decode($result, true);
	if(!$result){die("Connection Failure");}
	curl_close($curl);
	return $result;
 }


add_action('wp_ajax_api_login_form', 'api_login_form'); // This is for authenticated users
add_action('wp_ajax_nopriv_api_login_form', 'api_login_form'); // This is for unauthenticated users.
 
function api_login_form(){
 
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(!empty($email) || !empty($password) ){


		$data_array = array(
			'email' => $email,
			'password' => $password
		);

		$response = callAPI('POST', 'https://symfony-skeleton.q-tests.com/api/v2/token', json_encode($data_array));
		
		if(isset($response['status']) && $response['status'] == 401){
			echo false;
		} else{
			setcookie('q_token_key',  $response['token_key'], time() + (86400 * 30), "/");
			echo true;
		}

    }
    wp_die();
}

