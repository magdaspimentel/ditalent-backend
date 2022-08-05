<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel; 
    use models\talentos as talentoModel;   



    // página empresas
    $app->get("/empresas/", function() {  

        $view = new View();

        $empresaModel = new EmpresaModel();

        $talentoModel = new TalentoModel();

        $data = [
            "url" => config::URL,
            "controller" => "empresas",

            // mostrar registos das empresas da base de dados na página empresas
            "empresa_all" => $empresaModel->showAllEmpresas(),
        ];    
       
        $view->showView("empresas", $data);

    });



    // página que mostra cada empresa individualmente por id 
    $app->get("/empresas/:idEmpresa", function($idEmpresa) { 
     
        $view = new View();

        $empresaModel = new EmpresaModel();

        $talentoModel = new TalentoModel();

        $info = $empresaModel->showEmpresaById($idEmpresa);

        $data = [
            "url" => config::URL,
            "controller" => "empresas",

            // mostrar registos da empresa individualmente na página empresa 
            "empresa_info" => $empresaModel->showEmpresaById($idEmpresa),
        ];       
        
        $view->showView("empresa", $data);

    });  