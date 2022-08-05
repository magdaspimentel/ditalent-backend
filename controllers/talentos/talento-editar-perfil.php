<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel;  
 
    

    // página editar perfil talento
    $app->get("/talento/editar-perfil", function() {

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
                "controller" => "talento-editar-perfil",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-editar-perfil", $data);

        }        

    });



    // página editar perfil talento
    // recebe o que vem do formulário da view talento-editar-perfil
    $app->post("/talento/editar-perfil", function() {        
    
        $talentoModel = new TalentoModel();

        // upload imagem
        $target_dir = "assets/images/uploads/talentos/";
        $target_file = $target_dir . basename($_FILES["imagem_talento"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagem_talento"]["tmp_name"]);
            if($check !== false) {
                // echo "é uma imagem - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 

            else {
                // echo "não é uma imagem";
                $uploadOk = 0;
            }
        }

        if ($_FILES["imagem_talento"]["size"] > 500000) {
            echo "ficheiro demasiado pesado. só suporta até";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "só aceita os formatos jpg, png, jpeg e gif";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            // echo "ficheiro não carregado";            
        } 

        else {
            if (move_uploaded_file($_FILES["imagem_talento"]["tmp_name"], $target_file)) {
                // echo "ficheiro com o nome ". basename( $_FILES["imagem_talento"]["name"]). " foi carregado";
            } 

            else {
                // echo "erro no upload do ficheiro";
            }
        }
        
        $imagemTalento = $_FILES['imagem_talento']['name'];
        $ocupacaoTalento = $_POST["ocupacao_talento"]; 
        $cidadeTalento = $_POST["cidade_talento"]; 
        $portfolioTalento = $_POST["portfolio_talento"]; 
        $resumoTalento = $_POST["resumo_talento"]; 
        $competenciaTalento = $_POST["competencia_talento"];  
        $experienciaTalento = $_POST["experiencia_talento"];  
        $formacaoTalento = $_POST["formacao_talento"];   

        // sessão iniciada com id do talento
        $idTalento = $_SESSION['talento_id'];
                
        $result = $talentoModel->updateTalentoProfile($ocupacaoTalento, $cidadeTalento, $portfolioTalento, $resumoTalento, $competenciaTalento, $experienciaTalento, $formacaoTalento, $imagemTalento, $idTalento);                  

        if($result) {
            // se efetuado com sucesso redirecionar para a página:
            echo("<script>window.location = '../talento/editar-perfil/sucesso';</script>");
        }

        else {
            echo 'erro';    
        }                
      
    });       



    // página editar perfil talento sucesso
    $app->get("/talento/editar-perfil/sucesso", function() {

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
                "controller" => "talento-editar-perfil",
                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

            $view->showView("talento-editar-perfil-sucesso", $data);

        }    

    });