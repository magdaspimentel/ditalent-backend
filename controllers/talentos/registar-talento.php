<?php

    use config\config;
    use config\view;
    use models\talentos as talentoModel;



    // página registar talento
    $app->get("/registar/talento/", function() {

        $view = new View();

        $talentoModel = new TalentoModel();

        $data = [
            "url" => config::URL,
            "controller" => "registar-talento",

            // mostrar registos das categorias da base de dados 
            "categoria_all" => $talentoModel->showAllCategorias(), 
        ];

        $view->showView("registar-talento", $data);

    });  



    // página registar talento
    // recebe o que vem do formulário da view registar-talento
    $app->post("/registar/talento/", function() {

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
        } else {
            if (move_uploaded_file($_FILES["imagem_talento"]["tmp_name"], $target_file)) {
                // echo "ficheiro com o nome ". basename( $_FILES["imagem_talento"]["name"]). " foi carregado";
            } 

            else {
                // echo "erro no upload do ficheiro";
            }
        }


        $emailTalento = $_POST['email_talento']; 

        $result = $talentoModel->emailDatabaseTalento($emailTalento);

        // se o email introduzido já se encontra na base de dados faz refresh na página e aparece mensagem de erro
        if($result) {
            
            $_SESSION['email_repetido'] = true;     

            echo("<script>window.location = '../registar/talento';</script>");     
            
        }

        // caso contrário faz registo com sucesso 
        else {

            // encriptar password 
            $passwordHash = password_hash($_POST['password_talento'], PASSWORD_DEFAULT);

            $run = $talentoModel->registerTalento(
                $_POST['nome_talento'],  
                $emailTalento, 
                $passwordHash, 
                $_FILES['imagem_talento']['name'], 
                $_POST['ocupacao_talento'],
                $_POST['fk_id_categoria'], 
                $_POST['cidade_talento'], 
                $_POST['portfolio_talento'],
                $_POST['resumo_talento'],
                $_POST['competencia_talento'], 
                $_POST['experiencia_talento'],  
                $_POST['formacao_talento']
            );        

            if($run) {
                // se o registo foi efetuado com sucesso redirecionar para a página:
                echo("<script>window.location = 'talento/sucesso';</script>");
            }

            else {
                echo 'erro';    
            }

        }

    });  



    // página registar talento sucesso
    $app->get("/registar/talento/sucesso/", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "registar-talento-sucesso",
        ];

        $view->showView("registar-talento-sucesso", $data);

    });