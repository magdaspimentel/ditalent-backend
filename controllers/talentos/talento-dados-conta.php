<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel;  
 
    

    // página dados conta talento
    $app->get("/talento/dados-conta", function() {
        
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
                "controller" => "talento-dados-conta",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-dados-conta", $data);

        }   

    });



    // página editar perfil talento
    // recebe o que vem do formulário da view talento-dados-conta
    $app->post("/talento/dados-conta", function() {        
    
        $talentoModel = new TalentoModel();
        
        $nomeTalento = $_POST["nome_talento"];    

        // sessão iniciada com id do talento 
        $idTalento = $_SESSION['talento_id'];
                
        $result = $talentoModel->updateTalentoDadosConta($nomeTalento, $idTalento);                  

        if($result) {
            // se efetuado com sucesso redirecionar para a página:
            echo("<script>window.location = '../talento/dados-conta/sucesso';</script>");
        } 

        else {
            echo 'erro';    
        }                
      
    });  



    // página dados conta talento sucesso
    $app->get("/talento/dados-conta/sucesso", function() {

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
                "controller" => "talento-dados-conta",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-dados-conta-sucesso", $data);

        }     

    });