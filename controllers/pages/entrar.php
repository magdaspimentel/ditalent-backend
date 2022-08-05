<?php

    use config\config;
    use config\view;
 


    // página entrar
    $app->get("/entrar/", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "entrar",
        ];

        $view->showView("entrar", $data);

    });