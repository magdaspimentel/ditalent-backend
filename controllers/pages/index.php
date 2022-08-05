<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
    use models\talentos as talentoModel;  



    // página index
    $app->get("/index/", function() {

        $view = new View();

        $empresaModel = new EmpresaModel();

        $talentoModel = new TalentoModel();

        $data = [
            "url" => config::URL,
            "controller" => "home",
            
            // mostrar registos das empresas da base de dados na home 
            "empresa_all" => $empresaModel->showAllEmpresasHome(),

            // mostrar registos dos talentos da base de dados na home 
            "talento_all" => $talentoModel->showAllTalentosHome(),
        ];


        // se login empresa estiver feito
        if(isset($_SESSION['loggedinEmpresa'])) {

            $data = [
                "url" => config::URL,
                "controller" => "home",

                // mostrar registos das empresas da base de dados na home 
                "empresa_all" => $empresaModel->showAllEmpresasHome(),

                // mostrar registos dos talentos da base de dados na home 
                "talento_all" => $talentoModel->showAllTalentosHome(),

                // mostrar header empresa se estiver feito login 
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

        } 


        // se login talento estiver feito
        if(isset($_SESSION['loggedinTalento'])) {

            $data = [
                "url" => config::URL,
                "controller" => "home",

                // mostrar registos das empresas da base de dados na home 
                "empresa_all" => $empresaModel->showAllEmpresasHome(),

                // mostrar registos dos talentos da base de dados na home 
                "talento_all" => $talentoModel->showAllTalentosHome(),

                // mostrar header talento se estiver feito login 
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

        } 

        $view->showView("index", $data);       

    });



    // página index
    $app->get("/", function() {  
        
        $view = new View();

        $empresaModel = new EmpresaModel();

        $talentoModel = new TalentoModel();

        $data = [
            "url" => config::URL,
            "controller" => "home",

            // mostrar registos das empresas da base de dados na home 
            "empresa_all" => $empresaModel->showAllEmpresasHome(),

            // mostrar registos dos talentos da base de dados na home 
            "talento_all" => $talentoModel->showAllTalentosHome(),
        ];


        // se login empresa estiver feito
        if(isset($_SESSION['loggedinEmpresa'])) {

            $data = [
                "url" => config::URL,
                "controller" => "home",

                // mostrar registos das empresas da base de dados na home 
                "empresa_all" => $empresaModel->showAllEmpresasHome(),

                // mostrar registos dos talentos da base de dados na home 
                "talento_all" => $talentoModel->showAllTalentosHome(),

                // mostrar header empresa se estiver feito login 
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

        } 


        // se login talento estiver feito
        if(isset($_SESSION['loggedinTalento'])) {

            $data = [
                "url" => config::URL,
                "controller" => "home",

                // mostrar registos das empresas da base de dados na home 
                "empresa_all" => $empresaModel->showAllEmpresasHome(),

                // mostrar registos dos talentos da base de dados na home 
                "talento_all" => $talentoModel->showAllTalentosHome(),

                // mostrar header talento se estiver feito login 
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

        } 

        $view->showView("index", $data);

    });



    // página index
    $app->get("/home/", function() {

        $view = new View();

        $empresaModel = new EmpresaModel();

        $talentoModel = new TalentoModel();

        // logout empresa e talento
        $logout = $empresaModel->logout();

        $data = [
            "url" => config::URL,
            "controller" => "home",

            // mostrar registos das empresas da base de dados na home 
            "empresa_all" => $empresaModel->showAllEmpresasHome(),

            // mostrar registos dos talentos da base de dados na home 
            "talento_all" => $talentoModel->showAllTalentosHome(),
        ];


        // se login empresa estiver feito
        if(isset($_SESSION['loggedinEmpresa'])) {

            $data = [
                "url" => config::URL,
                "controller" => "home",

                // mostrar registos das empresas da base de dados na home 
                "empresa_all" => $empresaModel->showAllEmpresasHome(),

                // mostrar registos dos talentos da base de dados na home 
                "talento_all" => $talentoModel->showAllTalentosHome(),

                // mostrar header empresa se estiver feito login 
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

        } 


        // se login talento estiver feito
        if(isset($_SESSION['loggedinTalento'])) {

            $data = [
                "url" => config::URL,
                "controller" => "home",

                // mostrar registos das empresas da base de dados na home 
                "empresa_all" => $empresaModel->showAllEmpresasHome(),

                // mostrar registos dos talentos da base de dados na home 
                "talento_all" => $talentoModel->showAllTalentosHome(),

                // mostrar header talento se estiver feito login 
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

        } 

        $view->showView("index", $data);

        // logout empresa e talento
        if($logout) {

            $_SESSION['login_destroy'] = true;

            echo("<script>window.location = '../index';</script>");

        }

    }); 