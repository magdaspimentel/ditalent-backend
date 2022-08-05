<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel;  


    // página entrar talento
    $app->get("/entrar/talento/", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "entrar-talento",
        ];

        $view->showView("entrar-talento", $data);
      
    });



    // página entrar talento
    // recebe o que vem do formulário da view entrar-talento
    $app->post("/entrar/talento/", function() {          
     
        $talentoModel = new TalentoModel();


        $data = [
            "url" => config::URL,
        ];

        $emailLogin = $_POST["email_talento"];
        $passwordLogin = $_POST["password_talento"];

        $result = $talentoModel->loginTalento($emailLogin);
      
        if($result && password_verify( $passwordLogin, $result['password_talento'])) {

            $_SESSION['loggedinTalento'] = true;

            // session para não mostrar botões de entrar e registar se o login estiver feito 
            $_SESSION['loggedin'] = true;
            
            $_SESSION["email_talento"] = $emailLogin;
            $_SESSION['login_errado'] = false;
            $_SESSION['talento_id'] = $result['id_talento'];

            echo("<script>window.location='../talento/editar-perfil'</script>");                      

        }                  
      
        else {
            
            $_SESSION['login_errado'] = true;
           
            echo("<script>window.location = '../entrar/talento';</script>");           

        } 

    }); 