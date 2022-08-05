<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
 
    

    // página dados conta empresa
    $app->get("/empresa/dados-conta", function() {
        
        // se o login não estiver feito reencaminhar para a home para não se ter acesso a esta página
        if(!isset($_SESSION['loggedinEmpresa'])) {

             echo("<script>window.location = '../home';</script>"); 

        }

        // se estiver feito login
        else {

             $view = new View();

            $empresaModel = new EmpresaModel();

            $data = [
                "url" => config::URL,
                "controller" => "empresa-dados-conta",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-dados-conta", $data);

        }   

    });



    // página dados conta empresa
    // recebe o que vem no formulário da view empresa-dados-conta 
    $app->post("/empresa/dados-conta", function() {        
    
        $empresaModel = new EmpresaModel();
        
        $nomeEmpresa = $_POST["nome_empresa"];
        $emailEmpresa = $_POST["email_empresa"];    

        // sessão iniciada com id da empresa 
        $idEmpresa = $_SESSION['empresa_id'];
                
        $result = $empresaModel->updateEmpresaDadosConta($nomeEmpresa, $emailEmpresa, $idEmpresa);                  

        if($result) {
            // se efetuado com sucesso redirecionar para a página:
            echo("<script>window.location = '../empresa/dados-conta/sucesso';</script>");
        } 

        else {
            echo 'erro';    
        }                
      
    });      



    // página dados conta empresa sucesso
    $app->get("/empresa/dados-conta/sucesso", function() {

        // se o login não estiver feito reencaminhar para a home para não se ter acesso a esta página
        if(!isset($_SESSION['loggedinEmpresa'])) {

             echo("<script>window.location = '../../home';</script>"); 

        }


        // se estiver feito login
        else {
        
            $view = new View();

            $empresaModel = new EmpresaModel();
           
            $data = [
                "url" => config::URL,
                "controller" => "empresa-dados-conta",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-dados-conta-sucesso", $data);

        }    

    });