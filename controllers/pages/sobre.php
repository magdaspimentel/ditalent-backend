<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
    use models\talentos as talentoModel;  



    // página sobre
    $app->get("/sobre/", function() {

        $view = new View();

        $talentoModel = new TalentoModel();

        $empresaModel = new EmpresaModel();

        $data = [
            "url" => config::URL,
            "controller" => "sobre",
        ];


        // se login empresa estiver feito
        if(isset($_SESSION['loggedinEmpresa'])) {

            $data = [
                "url" => config::URL,
                "controller" => "sobre",

                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

        } 


        // se login talento estiver feito
        if(isset($_SESSION['loggedinTalento'])) {

            $data = [
                "url" => config::URL,
                "controller" => "sobre",

                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

        } 

        $view->showView("sobre", $data);

    });