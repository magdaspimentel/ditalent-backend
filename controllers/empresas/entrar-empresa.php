<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
    


    // página entrar empresa
    $app->get("/entrar/empresa/", function() {            

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "entrar-empresa",
        ];

        $view->showView("entrar-empresa", $data);
      
    });



    // página entrar empresa
    // recebe o que vem do formulário da view entrar-empresa
    $app->post("/entrar/empresa/", function() {          
     
        $empresaModel = new EmpresaModel();


        $data = [
            "url" => config::URL,
        ];

        $emailLogin = $_POST["email_empresa"];
        $passwordLogin = $_POST["password_empresa"];

        $result = $empresaModel->loginEmpresa($emailLogin);
      
        if($result && password_verify( $passwordLogin, $result['password_empresa'])) {

            $_SESSION['loggedinEmpresa'] = true;
            
            // session para não mostrar botões de entrar e registar se o login estiver feito 
            $_SESSION['loggedin'] = true;

            $_SESSION["email_empresa"] = $emailLogin;
            $_SESSION['login_errado'] = false;
            $_SESSION['empresa_id'] = $result['id_empresa'];

            echo("<script>window.location='../empresa/editar-perfil'</script>");                      

        }                  
      
        else {
            
            $_SESSION['login_errado'] = true;
           
            echo("<script>window.location = '../entrar/empresa';</script>");           

        } 

    });   