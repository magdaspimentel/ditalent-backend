<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
 
    

    // página editar perfil empresa
    $app->get("/empresa/editar-perfil", function() {

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
                "controller" => "empresa-editar-perfil",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-editar-perfil", $data);

        }        

    });



    // página editar perfil empresa
    // recebe o que vem no formulário da view empresa-editar-perfil 
    $app->post("/empresa/editar-perfil", function() {        
    
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
        } 

        else {
            if (move_uploaded_file($_FILES["imagem_empresa"]["tmp_name"], $target_file)) {
                // echo "ficheiro com o nome ". basename( $_FILES["imagem_empresa"]["name"]). " foi carregado";
            } 

            else {
                // echo "erro no upload do ficheiro";
            }
        }
        

        $imagemEmpresa = $_FILES['imagem_empresa']['name'];
        $descricaoEmpresa = $_POST["descricao_empresa"];
        $websiteEmpresa = $_POST["website_empresa"];    

        // sessão iniciada com id da empresa 
        $idEmpresa = $_SESSION['empresa_id'];
                
        $result = $empresaModel->updateEmpresaProfile($websiteEmpresa, $descricaoEmpresa, $imagemEmpresa, $idEmpresa);                  

        if($result) {
            // se efetuado com sucesso redirecionar para a página:
            echo("<script>window.location = '../empresa/editar-perfil/sucesso';</script>");
        }

        else {
            echo 'erro';    
        }                
      
    });       



    // página editar perfil empresa sucesso
    $app->get("/empresa/editar-perfil/sucesso", function() {

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
                "controller" => "empresa-editar-perfil",
                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

            $view->showView("empresa-editar-perfil-sucesso", $data);

        }    

    });