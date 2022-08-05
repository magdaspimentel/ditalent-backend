<?php


	// utilizar o vendor 
	require_once "vendor/autoload.php";

	spl_autoload_register(function ($className) {

		$path = str_replace("\\", "/",$className);

		if(file_exists($path.".php")) {

			require_once $path . ".php";

		}

	});


	session_start();


	// aceitar cookies 
	if(isset($_GET["cookies"])) {
        if($_GET["cookies"] == "accept") {
            $_SESSION["accept_cookies"] = true;
        }
    }


	// utilizar o slim
	use Slim\Slim;

	use config\config;

	$app = new Slim();


	$controllerFolders = glob("controllers/*", GLOB_ONLYDIR);

	foreach ($controllerFolders as $controllerFolder) {

		foreach (glob($controllerFolder."/*.php") as $controller) {

			require_once $controller;

		}

	}


	$app->run();