<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel; 
  

    
    // página alterar password talento
    $app->get("/talento/alterar-password", function() {
        
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
                "controller" => "talento-alterar-password",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-alterar-password", $data);

        }   

    });



    // página alterar password talento
    // recebe o que vem do formulário da view talento-alterar-password
    $app->post("/talento/alterar-password", function() {        
    
        $talentoModel = new TalentoModel();
       
        // encriptar password 
        $passwordTalento = password_hash($_POST['password_talento'], PASSWORD_DEFAULT);  

        // sessão iniciada com id do talento 
        $idTalento = $_SESSION['talento_id'];
                
        $result = $talentoModel->updateTalentoAlterarPassword($passwordTalento, $idTalento);                  

        if($result) {
            // se efetuado com sucesso redirecionar para a página:
            echo("<script>window.location = '../talento/alterar-password/sucesso';</script>");
        } 

        else {
            echo 'erro';    
        }                
      
    });  



    // página alterar password talento sucesso
    $app->get("/talento/alterar-password/sucesso", function() {

        // se o login não estiver feito reencaminhar para a home para não se ter acesso a esta página
        if(!isset($_SESSION['loggedinTalento'])) {

             echo("<script>window.location = '../../home';</script>"); 

        }


        // se estiver feito login
        else {
        
            $view = new View();

            $talentoModel = new TalentoModel();
           
            $data = [
                "url" => config::URL,
                "controller" => "talento-alterar-password",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-alterar-password-sucesso", $data);

        }    

    });