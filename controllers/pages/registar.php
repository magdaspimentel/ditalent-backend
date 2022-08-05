<?php

    use config\config;
    use config\view;
 


    // página registar
    $app->get("/registar/", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "registar",
        ];

        $view->showView("registar", $data);

    });