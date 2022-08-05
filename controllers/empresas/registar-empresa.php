<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;



    // página registar empresa
    $app->get("/registar/empresa/", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "registar-empresa",
        ];

        $view->showView("registar-empresa", $data);

    });  



    // página registar empresa
    // recebe o que vem do formulário da view registar-empresa
    $app->post("/registar/empresa/", function() {

        $empresaModel = new EmpresaModel();

        // upload imagem
        $target_dir = "assets/images/uploads/empresas/";
        $target_file = $target_dir . basename($_FILES["imagem_empresa"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagem_empresa"]["tmp_name"]);
            if($check !== false) {
                // echo "é uma imagem - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 

            else {
                // echo "não é uma imagem";
                $uploadOk = 0;
            }
        }

        if ($_FILES["imagem_empresa"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["imagem_empresa"]["tmp_name"], $target_file)) {
                // echo "ficheiro com o nome ". basename( $_FILES["imagem_empresa"]["name"]). " foi carregado";
            } 

            else {
                // echo "erro no upload do ficheiro";
            }
        }


        $emailEmpresa = $_POST['email_empresa']; 

        $result = $empresaModel->emailDatabaseEmpresa($emailEmpresa);

        // se o email introduzido já se encontra na base de dados faz refresh na página e aparece mensagem de erro
        if($result) {
            
            $_SESSION['email_repetido'] = true;     

            echo("<script>window.location = '../registar/empresa';</script>");     
            
        }

        // caso contrário faz registo com sucesso 
        else {

            // encriptar password 
            $passwordHash = password_hash($_POST['password_empresa'], PASSWORD_DEFAULT);

            $run = $empresaModel->registerEmpresa(
                $_POST['nome_empresa'], 
                $emailEmpresa, 
                $passwordHash, 
                $_POST['website_empresa'], 
                $_POST['descricao_empresa'], 
                $_FILES['imagem_empresa']['name']
            );        

            if($run) {
                // se o registo foi efetuado com sucesso redirecionar para a página:
                echo("<script>window.location = 'empresa/sucesso';</script>");
            }

            else {
                echo 'erro';    
            }

        }
        

    });  



    // página registar empresa sucesso  
    $app->get("/registar/empresa/sucesso/", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "empresa",
        ];

        $view->showView("registar-empresa-sucesso", $data);

    });