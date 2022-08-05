<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel; 
  

    
    // página alterar password empresa
    $app->get("/empresa/alterar-password", function() {
        
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
                "controller" => "empresa-alterar-password",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-alterar-password", $data);

        }   

    });



    // página alterar password empresa
    // recebe o que vem do formulário na view empresa-alterar-password 
    $app->post("/empresa/alterar-password", function() {        
    
        $empresaModel = new EmpresaModel();
       
        // encriptar password 
        $passwordEmpresa = password_hash($_POST['password_empresa'], PASSWORD_DEFAULT);  

        // sessão iniciada com id da empresa 
        $idEmpresa = $_SESSION['empresa_id'];
                
        $result = $empresaModel->updateEmpresaAlterarPassword($passwordEmpresa, $idEmpresa);                  

        if($result) {
            // se efetuado com sucesso redirecionar para a página:
            echo("<script>window.location = '../empresa/alterar-password/sucesso';</script>");
        } 

        else {
            echo 'erro';    
        }                
      
    });  



    // página alterar password empresa sucesso
    $app->get("/empresa/alterar-password/sucesso", function() {

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
                "controller" => "empresa-alterar-password",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-alterar-password-sucesso", $data);

        }    

    });