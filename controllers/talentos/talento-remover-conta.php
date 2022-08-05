<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel;  
    use models\empresas as empresaModel;  
  


    // página remover conta   
    $app->get("/talento/remover-conta", function() {

        // se o login não estiver feito reencaminhar para a home para não se ter acesso a esta página
        if(!isset($_SESSION['loggedinTalento'])) {

             echo("<script>window.location = '../home';</script>"); 

        }

        // se estiver feito login
        else {

            $view = new View();

            $talentoModel = new TalentoModel();

            $data = [
                "url" => config::URL,
                "controller" => "talento-remover-conta",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-remover-conta", $data);

        }  

    });



    // página remover conta   
    // recebe o que vem do formulário da view talento-remover-conta
    $app->post("/talento/remover-conta/", function() {

        $talentoModel = new TalentoModel();

        $empresaModel = new EmpresaModel();

        $data = [
            "url" => config::URL,
        ];

        $emailTalento = $_POST["email_talento"];
        $passwordTalento = $_POST["password_talento"];

        // sessão iniciada com id do talento
        $idTalento = $_SESSION['talento_id'];

        $result = $talentoModel->loginTalento($emailTalento);
      
        if($result && password_verify( $passwordTalento, $result['password_talento'])) {

           $talentoModel->deleteTalento($idTalento);

           // faz logout
           $empresaModel->logout();

           // reencaminha para a home 
           echo("<script>window.location='../home'</script>");                      

        } 

        else {
            
            $_SESSION['deleteFail'] = true;
           
            echo("<script>window.location='../talento/remover-conta'</script>");          

        } 


    });