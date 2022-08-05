<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
  


    // página remover conta   
    $app->get("/empresa/remover-conta", function() {

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
                "controller" => "empresa-remover-conta",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-remover-conta", $data);

        }  

    });



    // página remover conta   
    // recebe o que vem do formulário da view empresa-remover-conta 
    $app->post("/empresa/remover-conta/", function() {

        $empresaModel = new EmpresaModel();

        $data = [
            "url" => config::URL,
        ];

        $emailEmpresa = $_POST["email_empresa"];
        $passwordEmpresa = $_POST["password_empresa"];

        // sessão iniciada com id da empresa 
        $idEmpresa = $_SESSION['empresa_id'];

        $result = $empresaModel->loginEmpresa($emailEmpresa);
      
        if($result && password_verify( $passwordEmpresa, $result['password_empresa'])) {

           $empresaModel->deleteEmpresa($idEmpresa);

           // fazer logout 
           $empresaModel->logout();

           // reencaminha para a home
           echo("<script>window.location='../home'</script>");                      

        } 

        else {
            
            $_SESSION['deleteFail'] = true;
           
            echo("<script>window.location='../empresa/remover-conta'</script>");          

        } 


    });