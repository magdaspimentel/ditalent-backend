<?php

    use config\config;
    use config\view;
    use models\empresas as empresaModel;  
    use models\talentos as talentoModel; 
    use PHPMailer\PHPMailer\PHPMailer;

 

    // página contacto
	$app->get("/contacto/", function() {

        $view = new View();

        $talentoModel = new TalentoModel();

        $empresaModel = new EmpresaModel();

        $data = [
            "url" => config::URL,
            "controller" => "contacto",
        ];


        // se login empresa estiver feito
        if(isset($_SESSION['loggedinEmpresa'])) {

            $data = [
                "url" => config::URL,
                "controller" => "contacto",

                "empresa_info" => $empresaModel->showEmpresaById($_SESSION['empresa_id']),
            ];

        } 


        // se login talento estiver feito
        if(isset($_SESSION['loggedinTalento'])) {

            $data = [
                "url" => config::URL,
                "controller" => "contacto",

                "talento_info" => $talentoModel->showTalentoById($_SESSION['talento_id']),
            ];

        } 

        $view->showView("contacto", $data);       

    });




    // página contacto
    // recebe o que vem do formulário da view contacto
    $app->post("/contacto/", function() {

        $contactName = $_POST["contact_name"];
        $contactEmail = $_POST["contact_email"];
        $contactSubject = $_POST["contact_subject"];
        $contactMessage = $_POST["contact_message"];

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;

        // dados da conta de envio de email  
        $mail->Username = '';
        $mail->Password = '';

        $mail->setFrom($contactEmail, $contactName);

        // destinatário
        $mail->addAddress('', 'Ditalent');

        $mail->isHTML(true); 

        // assunto
        $mail->Subject = "Contacto";

        // mensagem
        $mail->Body = "Foi efetuado um novo pedido de contacto com os seguintes dados: <br>Nome: $contactName<br> Email: $contactEmail<br> Assunto: $contactSubject<br> Mensagem: $contactMessage";                                               
 
        if($mail->send() ) {
            echo("<script>window.location = 'contacto/sucesso';</script>");
        } 

        else {
            echo("<script>window.location = 'contacto';</script>");
        }        

    });



    // página contacto sucesso 
	$app->get("/contacto/sucesso", function() {

        $view = new View();

        $data = [
            "url" => config::URL,
            "controller" => "contacto",
        ];

        $view->showView("contacto-sucesso", $data);
        
    });
