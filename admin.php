<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;

// Page Admin
$app->get('/admin', function() {

	User::verifyLogin();
    
	$page = new PageAdmin();

	$page->setTpl("index");
});

// Page Admin Login
$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");
});

// Function Admin Login
$app->post('/admin/login', function(){

	User::login($_POST["deslogin"], $_POST["despassword"]);

	header("Location: /admin");

	exit;
});

// Function Admin Logout
$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;
});

?>