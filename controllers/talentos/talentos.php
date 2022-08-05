<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel;  
    use models\empresas as empresaModel;  



    // página talentos
    $app->get("/talentos/", function() {  

        $view = new View();

        $talentoModel = new TalentoModel();

        $empresaModel = new EmpresaModel();
        
        $data = [
            "url" => config::URL,
            "controller" => "talentos",

            // mostrar registos dos talentos da base de dados na página talentos
            "talento_all" => $talentoModel->showAllTalentos(),

            // mostrar registos das categorias da base de dados 
            "categoria_all" => $talentoModel->showAllCategorias(),
        ];

        $view->showView("talentos", $data);

    });



    // página que mostra cada talento individualmente por id   
    $app->get("/talentos/:idTalento", function($idTalento) {  
    
        $view = new View();

        $talentoModel = new TalentoModel();

        $empresaModel = new EmpresaModel();

        $data = [
            "url" => config::URL,
            "controller" => "talentos",

            // mostrar registos do talento individualmente na página talento 
            "talento_info" => $talentoModel->showTalentoById($idTalento),

            // mostrar registos das categorias da base de dados 
            "categoria_all" => $talentoModel->showAllCategorias(), 
        ];  
        
        $view->showView("talento", $data);

    });  